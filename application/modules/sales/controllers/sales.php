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
        $this->load->model('model_sales', 'sales');
	}
	
	 function index(){
		redirect('unit/list_unit');
	}

	function denah(){

		$this->check_access();
		$data = $this->controller_attr;

		$data['function']='denah';
		$area=select_all($this->tbl_area);
		//print_r($area);exit;
		foreach ($area as $key) {
			$area_image=select_where($this->tbl_area_album,'area_id',$key->id);
            if($area_image->num_rows()>0){
	            $area_image= $area_image->row();
	            $key->image=$area_image->filename;
	            $key->caption=$area_image->caption;
            }else{
	            $key->image=''; 
	            $key->caption='';
            }
		}
		$data['area'] = $area;
		
		$data['page'] = $this->load->view('sales/list_denah_area',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function list_denah($id){
      	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='List Denah';
        $where=array(
            'area_id'=>$id,
            //'is_delete'=>0,
            );
        $data['area']=select_where($this->tbl_area,'id',$id)->row();
        $data['unit']=select_where_array_group($this->tbl_unit,$where,'block')->result();

        $data['a1']=select_where($this->tbl_unit,'id',1)->row();

        //print_r($data['a1']);
        
       	$data['page'] = $this->load->view('sales/list_denah',$data,true); //print_r($data['content']);
       	$this->load->view('layout_backend',$data);
    }
	
	function form_denah_submit() {

        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='Pengajuan Harga';
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
    	//echo "masuk";exit;
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='pengajuan_harga';
       
        $id_sales = $this->session->userdata['admin']['id'];
        if ($this->session->userdata('admin')['user_group'] == 1) {
            $pengajuan = select_all_order($this->tbl_pengajuan_harga,'id','DESC');
        }else{
            $pengajuan = select_where_order($this->tbl_pengajuan_harga,'id_created',$id_sales,'id','DESC');
        }
        
        //print_r($pengajuan);exit;

        if(count($pengajuan) > 0) {
            foreach ($pengajuan as $pengajuan_harga) {
                $unit=select_where($this->tbl_unit, 'id', $pengajuan_harga->id_unit)->row();
                //$pengajuan_harga->indonesian_date($pengajuan_harga->date_created);
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

        //print_r($data['checked_unit']);exit;
        
        if ($id) {
            $data['data'] = select_where($this->tbl_pengajuan_harga, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
        
        $data['page'] = $this->load->view('sales/pengajuan_harga_form',$data,true);
		$this->load->view('layout_backend',$data);
       
    }

    function pengajuan_harga_detail($id) {
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='pengajuan_harga_detail';
        
        $data['pengajuan'] = select_where($this->tbl_pengajuan_harga, 'id', $id)->row();
        $data['pengajuan']->date_created = date('d M Y H:i:s', strtotime($data['pengajuan']->date_created));
        $data['pengajuan']->nominal = indonesian_currency($data['pengajuan']->nominal);
        $admin = select_where($this->tbl_user, 'id', $data['pengajuan']->id_creator)->row();
        $data['pengajuan']->posted_by = $admin->first_name.$admin->last_name;
         if($data['pengajuan']->id_modifier != 0)
            {
                $data['update'] = new stdClass();
                $data['update']->name = select_where($this->tbl_user, 'id', $data['pengajuan']->id_modifier)->row()->first_name;
                $data['update']->date_modified = date('d M Y H:i:s', strtotime($data['pengajuan']->date_modified));
            }
       
        $data['pengajuan_unit']=select_where($this->tbl_pengajuan_harga_unit, 'pengajuan_harga_id',$id)->result();
        $total_price = 0;
        foreach ($data['pengajuan_unit'] as $key) {
            $unit = select_where($this->tbl_unit, 'id',$key->unit_id)->row();
            $total_price = $total_price + $unit->price;
        }
        $data['total_price'] = indonesian_currency($total_price);
        $data['customer']=select_where($this->tbl_customer, 'id',$data['pengajuan']->id_customer)->row();
       
       	$data['page'] = $this->load->view('sales/pengajuan_harga_detail',$data,true);
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

    function kontrak_add_unit(){
       $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak_add_unit';

        
        $select= select_all_order_row($this->tbl_kontrak,'id','DESC');
        $kontrak_id=$select->id+1;
        $unit_id = $this->input->post('unit_id');

        for ($i=0; $i <sizeof($unit_id) ; $i++) { 
            $unit = array(
                    'kontrak_id'=>$kontrak_id,
                    'unit_id'   => $unit_id[$i]
                );
            $this->db->insert($this->tbl_kontrak_unit, $unit);
        }
        redirect('sales/kontrak_form/'.$kontrak_id, 'refresh');
    }

	public function kontrak_form($id = null, $flag=null) {
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak_form';
        $data['unit'] =select_all($this->tbl_unit, 'id');
        $data['all_user'] = select_where($this->tbl_user,'user_group',6)->result();
        $data['customer'] = select_all($this->tbl_customer);
        $data['payment_scheme'] = select_all($this->tbl_payment_scheme, 'id');
        $data['kontrak_type'] = select_all($this->tbl_kontrak_type, 'id');
        $data['rekening'] = select_all($this->tbl_rekening, 'id');
        // 
        $data['flag'] = $flag;
        if($id == null) $id = $this->input->post('id');
        if($flag!=null){
            $num_rows = getAll($this->tbl_kontrak)->num_rows();
            $last_id = ($num_rows>0) ? $this->db->select('id')->order_by('id',"desc")->limit(1)->get($this->tbl_kontrak)->row()->id : 1;
            $data['id'] = $last_id+1;
            $data['data'] = null;
            $data['booking_fee'] = null;
            $data['data_pengajuan'] = select_where($this->tbl_pengajuan_harga, 'id', $id)->row();
            $data['id_unit_pengajuan'] = getValue('id_unit', $this->tbl_pengajuan_harga, array('id'=>'where/'.$data['data_pengajuan']->id));
            $data['customer_pengajuan'] = getValue('id_customer', $this->tbl_pengajuan_harga, array('id'=>'where/'.$data['data_pengajuan']->id));
            $data['nominal_pengajuan'] = getValue('approved_nominal', $this->tbl_pengajuan_harga, array('id'=>'where/'.$data['data_pengajuan']->id));
            $data['pengajuan_unit'] = select_where($this->tbl_pengajuan_harga_unit, 'pengajuan_harga_id', $data['data_pengajuan']->id)->result();
        }elseif ($id!=null && $flag==null) {
            $data['id'] = $id;
            $data['data'] = select_where($this->tbl_kontrak, 'id', $id)->row();
            $data['booking_fee'] = getValue('nominal', $this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$id, 'payment_type'=>'where/1'));
            $data['kontrak_unit'] = getAll($this->tbl_kontrak_unit, array('kontrak_id'=>'where/'.$id))->result();
        }
        else{
            $data['data'] = null;
            $data['booking_fee'] = null;
        }
        $data['page'] = $this->load->view('sales/kontrak_form', $data, true);
        $this->load->view('layout_backend', $data);
    }

    function get_kontrak_type($id){
        $type_id = getValue('kontrak_type', $this->tbl_payment_scheme, array('id'=>'where/'.$id));
        $bunga = getValue('bunga', $this->tbl_payment_scheme, array('id'=>'where/'.$id));
        $type = getAll($this->tbl_kontrak_type, array('id'=>'where/'.$type_id))->row();
        $data = array('name' => $type->name, 
                      'id'  => $type->id,
                      'bunga'  => $bunga,
                    );
        echo json_encode($data);
    }

     function kontrak_form_add() {
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak_add';

        $price = str_replace(',', '', $this->input->post('price'));
        $bunga = $this->input->post('bunga');
        $bunga = $price * ($bunga/100);
        $booking_fee = str_replace(',', '', $this->input->post('booking_fee'));        
        if ($booking_fee > $price) {
            $this->session->set_flashdata('notif','success');
            $this->session->set_flashdata('msg','booking fee tidak bisa melebihi price');
            redirect($data['controller']."/kontrak_form/".$this->input->post('id'));
        }
        $table_field = $this->db->list_fields($this->tbl_kontrak);
        $insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created'] = date('Y-m-d H:i:s', now());
        $insert['date_modified'] = date('Y-m-d H:i:s', now());
        $insert['id_creator'] = $this->session->userdata['admin']['id'];
        $insert['id_modifier'] = $this->session->userdata['admin']['id'];
        $insert['price'] = $price;
        $insert['sisa_hutang'] = str_replace(',', '', $this->input->post('sisa_hutang'));
        if ($insert['sales_id'] && $insert['customer_id'] && $insert['payment_scheme_id'] && $insert['no_kontrak']) {
            $do_insert = insert_all($this->tbl_kontrak, $insert);
            $kontrak_id = $this->db->insert_id();
            $kontrak_payment_schedule_id = $this->sales->insert_kontrak_payment_schedule($kontrak_id, $bunga);
            // $this->sales->update_kontrak_date_end($kontrak_id);
            // $this->check_bonus_sales($kontrak_id);
            if ($do_insert) {
                foreach ($this->input->post('unit_id') as $key) {
                    $insert = array('kontrak_id' => $kontrak_id, 'unit_id' => $key, 'date_created' => date('Y-m-d H:i:s', now()), 'id_creator' => $this->session->userdata['admin']['id']);
                    insert_all($this->tbl_kontrak_unit, $insert);

                }
               $this->session->set_flashdata('notif','success');
            $this->session->set_flashdata('msg','Input Data Succsess');
            redirect($data['controller']."/kontrak_form/".$this->input->post('id'));
            }
            else
                 $this->session->set_flashdata('notif','success');
            $this->session->set_flashdata('msg','error, not saved');
            redirect($data['controller']."/kontrak_form/".$this->input->post('id'));
        }
        else
             $this->session->set_flashdata('notif','success');
            $this->session->set_flashdata('msg','Please fill compleate the text');
            redirect($data['controller']."/kontrak_form/".$this->input->post('id'));
    }

    function kontrak(){
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak';
        $id_sales = $this->session->userdata['admin']['id'];

        if ($this->session->userdata['admin']['user_group'] == 1) {
            $data['list'] = select_all_order($this->tbl_kontrak,'id','DESC');
        }else{
            $data['list'] = select_where_order($this->tbl_kontrak,'sales_id',$id_sales,'id','DESC')->result();
        }

        foreach ($data['list'] as $data_row) {
            $customer = isset(select_where($this->tbl_customer, 'id', $data_row->customer_id)->row()->name);
            $data_row->customer = select_where($this->tbl_customer, 'id', $data_row->customer_id)->row()->name;
            $data_row->sales = select_where($this->tbl_user, 'id', $data_row->sales_id)->row()->username;
            $data_row->payment_scheme = select_where($this->tbl_payment_scheme, 'id', $data_row->payment_scheme_id)->row()->title;
        }
        $data['page'] = $this->load->view('sales/list_kontrak',$data,true);
        $this->load->view('layout_backend',$data);
    }

    function kontrak_pdf($id){
        $this->load->library('mpdf60/mpdf');
        $data['kontrak'] = select_where($this->tbl_kontrak, 'id', $id)->row();
        $data['customer']=select_where($this->tbl_customer, 'id',$data['kontrak']->customer_id)->row();
        $data['kontrak_unit'] = getAll($this->tbl_kontrak_unit, array('kontrak_id'=>'where/'.$id))->result();
        $data['payment_schedule'] = getAll($this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$id))->result();
        $data['booking_fee'] = getAll($this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$id, 'payment_type'=>'where/1'))->row();
        $kontrak_payment_scheme=select_where($this->tbl_payment_scheme, 'id',$data['kontrak']->payment_scheme_id)->row();
        $data['kontrak_payment_scheme']=$kontrak_payment_scheme->title;
        $kontrak_type_id = getValue('kontrak_type', $this->tbl_payment_scheme, array('id'=>'where/'.$kontrak_payment_scheme->id));
        $data['kontrak_type']=getValue('name', $this->tbl_kontrak_type, array('id'=>'where/'.$kontrak_type_id));
        $data['payment_schedule'] = getAll($this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$id, 'payment_type'=>'where/2'));
        //print_die($data['payment_schedule']->result());
        $html = $this->load->view('sales/kontrak_pdf', $data, true); 
        $this->mpdf = new mPDF();
        $this->mpdf->AddPage('p', // L - landscape, P - portrait
            '', '', '', '',
            5, // margin_left
            5, // margin right
            5, // margin top
            0, // margin bottom
            0, // margin header
            5); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output('SPU'.'.pdf', 'I');
    }

    public function kontrak_detail($id) {
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak';
        $data['kontrak'] = select_where($this->tbl_kontrak, 'id', $id)->row();
        $data['kontrak']->date_created = date('d M Y H:i:s', strtotime($data['kontrak']->date_created));
        $data['kontrak']->sisa_hutang = idr($data['kontrak']->sisa_hutang);
        $admin = getValue('username', $this->tbl_user, array('id'=>'where/'.$data['kontrak']->id_creator));
        $data['kontrak']->posted_by = $admin;
         if($data['kontrak']->id_modifier != 0)
            {
                $data['update'] = new stdClass();
                $data['update']->name = select_where($this->tbl_user, 'id', $data['kontrak']->id_modifier)->row()->username;
                $data['update']->date_modified = date('d M Y H:i:s', strtotime($data['kontrak']->date_modified));
            }
       
        $data['kontrak_unit'] = getAll($this->tbl_kontrak_unit, array('kontrak_id'=>'where/'.$id))->result();
        $kontrak_payment_scheme=select_where($this->tbl_payment_scheme, 'id',$data['kontrak']->payment_scheme_id)->row();
        $data['kontrak_payment_scheme']=$kontrak_payment_scheme->title;
        $kontrak_type_id = getValue('kontrak_type', $this->tbl_payment_scheme, array('id'=>'where/'.$kontrak_payment_scheme->id));
        $data['kontrak_type']=getValue('name', $this->tbl_kontrak_type, array('id'=>'where/'.$kontrak_type_id));
        $data['customer']=select_where($this->tbl_customer, 'id',$data['kontrak']->customer_id)->row();
        $data['payment_schedule'] = getAll($this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$id))->result();
        foreach ($data['payment_schedule'] as $key) {
            $key->nominal = $this->indonesian_currency($key->nominal);
            $key->nominal_paid = $this->indonesian_currency($key->nominal_paid);
            $key->date_created = $this->indonesian_date($key->date_created);
            $key->jatuh_tempo = $this->indonesian_date($key->jatuh_tempo);

        }
        $data['payment_record'] = $this->sales->payment_record_detail($id);
        foreach ($data['payment_record'] as $key) {
            $key->nominal = $this->indonesian_currency($key->nominal);
            $key->date_created = $this->indonesian_date($key->date_created);
            if ($key->is_delete == 0) {
                $key->status = "Paid";
            }else{
                $key->status = "Cancelled";
            }
        }
        $data['last_num_rows'] = $this->sales->last_payment_record_detail($id)->num_rows();
        $data['last'] = $this->sales->last_payment_record_detail($id)->row();
        $data['page'] = $this->load->view('sales/kontrak_detail', $data, true);
        $this->load->view('layout_backend', $data);
    }
}

