<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Chasier extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'Chasier','controller_name' => 'Chasier','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	 function index(){
		redirect('chasier/kontrak');
	}
	
	function kontrak(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='kontrak';
		$data['list']=select_all($this->tbl_kontrak);
		$data['page'] = $this->load->view('chasier/list_kontrak',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function kontrak_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='kontrak';
		if ($id) {
            $data['data'] = select_where($this->tbl_kontrak, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('chasier/kontrak_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function kontrak_update(){
		$data = $this->controller_attr;
		$data['function']='kontrak';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_kontrak);
		$static=select_where($this->tbl_kontrak,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_kontrak,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function kontrak_add(){
		$data = $this->controller_attr;
		$data['function']='kontrak';
		$table_field = $this->db->list_fields($this->tbl_kontrak);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$insert['images']=='';
        }else{
        	 $insert['images']=$_FILES['images']['name'];
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_kontrak,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function kontrak_delete($id){
		$data = $this->controller_attr;
		$function='kontrak';
		$query=delete($this->tbl_kontrak,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}

}

