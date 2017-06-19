<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class atasan extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'atasan','controller_name' => 'Atasan','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	 function index(){
		redirect('atasan/pengajuan_harga_approve');
	}
	function pengajuan_harga_approve(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='pengajuan_harga_approve';

        $id_atasan = $this->session->userdata('admin')['id'];
        if ($this->session->userdata('admin')['user_group'] == 1) {
            $pengajuan = select_all_order($this->tbl_pengajuan_harga,'id','DESC');
        }else{
            $pengajuan = select_where_order($this->tbl_pengajuan_harga,'id_atasan',$id_atasan,'id','DESC');
        }
        
        if(count($pengajuan) > 0) {
            foreach ($pengajuan as $pengajuan_harga) {
                $pengajuan_harga->nominal = indonesian_currency($pengajuan_harga->nominal);
                $pengajuan_harga->customer = select_where($this->tbl_customer,'id',$pengajuan_harga->id_customer)->row()->name;
                $pengajuan_harga->date_created = indonesian_date($pengajuan_harga->date_created);
            }
        }
        $data['data'] = $pengajuan;

        $data['page'] = $this->load->view('atasan/pengajuan_harga_approve',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function pengajuan_harga_approve_detail($id) {
      	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='pengajuan_harga_approve';

        $data['pengajuan'] = select_where($this->tbl_pengajuan_harga, 'id', $id)->row();
        $data['pengajuan']->date_created = date('d M Y H:i:s', strtotime($data['pengajuan']->date_created));
        $data['pengajuan']->nominal_cur = indonesian_currency($data['pengajuan']->nominal);
        $data['pengajuan']->approved_nominal =$data['pengajuan']->nominal;
        $admin = select_where($this->tbl_user, 'id', $data['pengajuan']->id_creator)->row();
        $data['pengajuan']->posted_by = $admin->first_name;
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
        $data['customer']= select_where($this->tbl_customer, 'id',$data['pengajuan']->id_customer)->row();
    
        $data['page'] = $this->load->view('atasan/pengajuan_harga_approve_detail',$data,true);
		$this->load->view('layout_backend',$data);
    }

    function pengajuan_harga_approve_status(){
    	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='pengajuan_harga_approve';

        $status = $this->input->post('status');
        $id = $this->input->post('id');
        $approved_nominal = str_replace(',', '', $this->input->post('approved_nominal'));
       

        $update= array(
            "date_modified"=>date('Y-m-d H:i:s', now()),
            "id_modifier"=> $this->session->userdata('admin')['id'],
            "approved_nominal"=>$approved_nominal,
            "status"=>$status
            );
        $pengajuan= select_where($this->tbl_pengajuan_harga,'id',$id)->row();
        
        $do_update = update($this->tbl_pengajuan_harga, $update, 'id', $id);
        if($do_update){
            $this->session->set_flashdata('status','ok');
            $this->session->set_flashdata('msg','Update success');
            $unit= select_where($this->tbl_unit, 'id', $id)->row();
            $user= select_where($this->tbl_user, 'id', $pengajuan->id_creator)->row();
            //encode user password
            $pass1=str_replace("=",'samad',$user->password);
            $pass2=str_replace("/",'garming',$pass1);
            $pass=str_replace("+",'plus',$pass2);

            $data['customer'] = select_where($this->tbl_customer, 'id', $pengajuan->id_customer)->row()->name;
            $data['price'] = indonesian_currency($pengajuan->nominal);
            $data['approved_nominal'] = indonesian_currency($pengajuan->approved_nominal);
            $data['link']=base_url()."sales/pengajuan_harga_detail/".$id."?authlogin=true&username=".$user->username."&pass=".$pass."&id=".$id;
            $data['username']=$user->first_name;
            //$html = $this->load->view('email/pengajuan_harga_action',$data,TRUE);
            //send email
            //$this->send_email($user->email, 'Approval Pengajuan Harga', $html);

            redirect('atasan/pengajuan_harga_approve');
        }else{
            $this->session->set_flashdata('status','error');
            $this->session->set_flashdata('msg','Update Failed');
            redirect('atasan/pengajuan_harga_approve');
        }
    }

	
	



	
}



