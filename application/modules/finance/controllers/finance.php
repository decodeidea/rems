<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class finance extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'finance','controller_name' => 'Finance','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	 function index(){
		redirect('finance/list_rekening');
	}
	function list_rekening(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='list_rekening';
		$list=select_all($this->tbl_rekening);
		$data['list']=$list;
		$data['page'] = $this->load->view('finance/list_rekening',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function list_rekening_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='list_rekening';
		
		if ($id) {
            $data['data'] = select_where($this->tbl_rekening, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('finance/list_rekening_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function list_rekening_update(){
		$data = $this->controller_attr;
		$data['function']='list_rekening';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_rekening);
		$unit=select_where($this->tbl_rekening,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
    
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_rekening,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function list_rekening_add(){
		$data = $this->controller_attr;
		$data['function']='list_rekening';
		$table_field = $this->db->list_fields($this->tbl_rekening);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_rekening,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function list_rekening_delete($id){
		$data = $this->controller_attr;
		$function='list_rekening';
		$query=delete($this->tbl_rekening,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}
	
	function contract_type(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='contract_type';
		$data['list']=select_all($this->tbl_contract_type);
		$data['page'] = $this->load->view('finance/list_contract',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function contract_type_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='contract_type';
		if ($id) {
            $data['data'] = select_where($this->tbl_contract_type, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('finance/list_contract_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function contract_type_update(){
		$data = $this->controller_attr;
		$data['function']='contract_type';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_contract_type);
		$area=select_where($this->tbl_contract_type,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
     
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_contract_type,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function contract_type_add(){
		$data = $this->controller_attr;
		$data['function']='contract_type';
		$table_field = $this->db->list_fields($this->tbl_contract_type);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_contract_type,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function contract_type_delete($id){
		$data = $this->controller_attr;
		$function='contract_type';
		$query=delete($this->tbl_contract_type,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}
	function area_album($id){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='area_album';
		$data['list']=select_all($this->tbl_area_album);
		$data['page'] = $this->load->view('unit/list_area_album',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function area_album_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='area_album';
		if ($id) {
            $data['data'] = select_where($this->tbl_area_album, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('unit/area_album_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function area_album_add(){
		$data = $this->controller_attr;
		$data['function']='area_album';
		$table_field = $this->db->list_fields($this->tbl_area_album);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        if(empty($_FILES['filename']['name'])){
        	$insert['filename']=='';
        }else{
        	 $insert['filename']=$_FILES['filename']['name'];
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_area_album,$insert);
		if($query){
			if(!empty($_FILES['filename']['name'])){
			if (!file_exists('assets/uploads/area/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/area/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/area/'.$this->db->insert_id();
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['file_name'] = $_FILES['filename']['name'];
             $this->upload->initialize($config);
             if($this->upload->do_upload('filename')){
                    $uploadData = $this->upload->data();
                }else{
                    echo"error upload";
                    die();
              }
          }
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']."/".$insert['area_id']);
	}

	function area_album_delete($id){
		$data = $this->controller_attr;
		$function='area';
		$query=delete($this->tbl_area,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}
	function unit_type(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='unit_type';
		$data['list']=select_all($this->tbl_unit_type);
		$data['page'] = $this->load->view('unit/list_unit_type',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function unit_type_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='unit_type';
		if ($id) {
            $data['data'] = select_where($this->tbl_unit_type, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('unit/unit_type_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function unit_type_update(){
		$data = $this->controller_attr;
		$data['function']='unit_type';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_unit_type);
		$unit_type=select_where($this->tbl_unit_type,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_unit_type,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function unit_type_add(){
		$data = $this->controller_attr;
		$data['function']='unit_type';
		$table_field = $this->db->list_fields($this->tbl_unit_type);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_unit_type,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function unit_type_delete($id){
		$data = $this->controller_attr;
		$function='area';
		$query=delete($this->tbl_unit_type,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}
}

