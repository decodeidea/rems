<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class sales extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'sales','controller_name' => 'Sales','method'=>ucwords($method),'menu'=>$this->get_menu());
		$this->load->model('model_unit', 'unit');
	}
	
	 function index(){
		redirect('unit/list_unit');
	}
	
	function form_denah_submit() {
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='pengajuan_harga';
      

        if ($this->input->post('unit_id')) {

            $this->session->set_userdata('checked_unit', $this->input->post('unit_id'));

            if (isset($_POST['kontrak_button'])) {
                //create kontrak action
                $this->kontrak_add_unit();
            } else if (isset($_POST['pengajuan_button'])) {
                //create pengajuan action
                
                $this->pengajuan_harga_form();
            } 

        }else{
            redirect('unit/denah','refresh');
        }
        
    }


    function pengajuan_harga() {
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='pengajuan_harga';
       
        $id_sales = $this->session->userdata['admin']['id'];
        if ($this->session->userdata('admin')['user_group'] == 1) {
            $pengajuan = select_all_order($this->tbl_pengajuan_harga,'id','DESC');
        }else{
            $pengajuan = select_where_order($this->tbl_pengajuan_harga,'id_created',$id_sales,'id','DESC');
        }
        

        if($pengajuan->num_rows() > 0) {
            foreach ($pengajuan->result() as $pengajuan_harga) {
                $unit=select_where($this->tbl_unit, 'id', $pengajuan_harga->id_unit)->row();
                $pengajuan_harga->indonesian_date($pengajuan_harga->date_created);
            }
        }
        
        $data['data'] = $pengajuan;

        $data['page'] = $this->load->view('sales/pengajuan_harga',$data,true);
		$this->load->view('layout_backend',$data);
       
    }

    function pengajuan_harga_form() {
    	//echo "masuks";exit;
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='pengajuan_harga';
       
        
        $id = $this->input->post('id');
        $data['unit']= $this->unit->unit_tbl()->result();
        $data['atasan']= select_where($this->tbl_user,'user_group','5')->result();
        $data['checked_unit'] = $this->session->userdata('checked_unit');
        
        if ($id) {
            $data['data'] = select_where($this->tbl_pengajuan_harga, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
        
        $data['page'] = $this->load->view('sales/pengajuan_harga_form',$data,true);
		$this->load->view('layout_backend',$data);
       
    }

    function pengajuan_harga_add() {

        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='pengajuan_harga';
        
        $customer=$this->model_basic->select_emailtlp($this->input->post('email'),$this->input->post('tlp'));

        $data_customer=array(
                "name"=>$this->input->post("nama"),
                "email"=>$this->input->post("email"),
                "phone"=>$this->input->post("tlp"),
                "address"=>$this->input->post("alamat"),
                "nama_kantor"=>$this->input->post("instansi"),
                );
        if($customer->num_rows() > 0){
           $id_customer = $customer->row()->id;
           $this->db->where('id', $id_customer);
           $this->db->update('dc_customer', $data_customer); 
        }else{
            $this->db->insert('dc_customer', $data_customer);
            $id_customer = $this->db->insert_id();
        }
        $nominal=str_replace(',', '', $this->input->post('nominal'));
        $table_field = $this->db->list_fields($this->tbl_pengajuan_harga);
        $insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['status'] = 0;
        $insert['id_unit'] = 0;
        $insert['approved_nominal'] = 0;
        $insert['nominal'] = $nominal;
        $insert['id_customer'] = $id_customer;
        $insert['date_created'] = date('Y-m-d H:i:s', now());
        $insert['date_modified'] = date('Y-m-d H:i:s', now());
        $insert['id_creator'] = $this->session->userdata['admin']['id'];
        $insert['id_modifier'] = $this->session->userdata['admin']['id'];
        if ($insert['nama'] && $insert['nominal']) {

            $do_insert = $this->db->insert($this->tbl_pengajuan_harga,$insert);
           
            $id_insert = $this->db->insert_id();
            if ($do_insert) {
                $unit = $this->session->userdata('checked_unit');
                //print_ $unit;exit;
                foreach ($unit as $key) {
                    $insert_unit = array(
                                    'pengajuan_harga_id' => $id_insert,
                                    'unit_id' => $key,
                                    'date_created' => date('Y-m-d H:i:s', now()),
                                    'id_creator' =>  $this->session->userdata['admin']['id'],
                            );

                    $query=insert_all($this->tbl_pengajuan_harga_unit, $insert_unit);
                }
                //remove checked unit session
                $this->session->unset_userdata('checked_unit');

                $user=select_where($this->tbl_user, 'id', $this->input->post('id_atasan'))->row();
                $pass1=str_replace("=",'samad',$user->password);
                $pass2=str_replace("/",'garming',$pass1);
                $pass=str_replace("+",'plus',$pass2);

                $data['customer'] =select_where($this->tbl_customer, 'id', $id_customer)->row()->name;
                $data['price'] = $nominal;
                $data['link']=base_url()."atasan/pengajuan_harga_approve?authlogin=true&username=".$user->username."&pass=".$pass."&id=".$id_insert;
                $data['username']=$user->first_name;
                $html = $this->load->view('sales/email/pengajuan_harga',$data,TRUE);
                //send email
                //$this->send_email($user->email, 'Approval Pengajuan Harga', $html);

                $this->session->set_flashdata('notif','success');
				$this->session->set_flashdata('msg','Your data have been added');
				redirect($data['controller']."/".$data['function']);
            }
            else
                $this->session->set_flashdata('notif','error');
				$this->session->set_flashdata('msg','Your data not added');
        }
        else
            $this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your complete your form');


    }


	
}

