	<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class customer extends DC_controller {

    public function __construct() {
  	parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'customer','controller_name' => 'Customer','method'=>ucwords($method),'menu'=>$this->get_menu());
    }

    public function index() {
redirect('customer/list_customer');
		}
    //customer
    function list_customer() {	
    	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='list_customer';
		$data['function_form']='list_customer_form';
        $data['list'] = select_all($this->tbl_customer);
        $data['page'] = $this->load->view('customer/list_customer', $data, true);
       		$this->load->view('layout_backend',$data);
          }

    function list_customer_form($id=null) {
        $this->check_access();
		$data = $this->controller_attr;
		$data['function']='list_customer';
		// $data['function_add']='list_customer_add';
		// $data['function_edit']='list_customer_edit';

		if ($id) {
            $data['data'] = select_where($this->tbl_customer, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('customer/customer_form',$data,true);
		$this->load->view('layout_backend',$data);
    }

    function list_customer_add() {
        $data = $this->controller_attr;
		$data['function'] = 'list_customer';
		$table_field = $this->db->list_fields($this->tbl_customer);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        
        if(empty($_FILES['photo']['name'])){
        	$insert['photo']='';
        }else{
        	 $insert['photo']=$_FILES['photo']['name'];
        }

        $insert['date_created'] = date('Y-m-d H:i:s', now());
        $insert['date_modified'] = date('Y-m-d H:i:s', now());
        $insert['id_creator'] = $this->session->userdata['admin']['id'];
        $insert['id_modifier'] = $this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_customer,$insert);


		if($query){


				if(!empty($_FILES['photo']['name'])){
			if (!file_exists('assets/uploads/customer/photo/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/customer/photo/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/customer/photo/'.$this->db->insert_id();
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['file_name'] = $_FILES['photo']['name'];
             $this->upload->initialize($config);
             if($this->upload->do_upload('photo')){
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

		redirect($data['controller']."/".$data['function']);
	
    }

    function list_customer_edit() {
       
  
		$data = $this->controller_attr;
		$data['function']='list_customer';
		$id=$this->input->post('id');
	
		$table_field = $this->db->list_fields($this->tbl_customer);
		$static = select_where($this->tbl_customer,'id',$id)->row();
		
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['photo']['name'])){
        	$update['photo']= $static->photo;
        }else{
        	 $update['photo']=$_FILES['photo']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_customer,$update,'id',$id);
		if($query){
			if(!empty($_FILES['photo']['name'])){
			unlink('assets/uploads/customer/photo/'.$id.'/'.$static->photo);
			if (!file_exists('assets/uploads/customer/photo/'.$id)) {
    				mkdir('assets/uploads/customer/photo/'.$id, 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/customer/photo/'.$id;
             $config['allowed_types'] = 'jpg|jpeg|png|gif';
             $config['file_name'] = $_FILES['photo']['name'];
             $this->upload->initialize($config);
             if($this->upload->do_upload('images')){
                    $uploadData = $this->upload->data();
                }else{
                    echo"error upload";
                    die();
              }
          }
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);


    }

    function list_customer_album($id=null){
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='list_customer_image';
        $data['list_customer'] = select_where($this->tbl_customer,'id',$id)->row();
        $data['list'] = select_where($this->tbl_customer_album,'customer_id',$id)->result();
        $data['page'] = $this->load->view('customer/list_customer_album', $data, true);
        $this->load->view('layout_backend',$data);


    }

    function list_customer_album_form($id=null){
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='list_customer_album';
        if ($id) {
            $data['data'] = select_where($this->tbl_customer_album, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
        $data['page'] = $this->load->view('customer/customer_album_form',$data,true);
        $this->load->view('layout_backend',$data);
    }

    function list_customer_album_delete($id,$idcustomer){
        $data = $this->controller_attr;
        $data['function']='list_customer_album';
        $function='area';
        $query=delete($this->tbl_customer_album,'id',$id);
        if($query){
            $this->session->set_flashdata('notif','success');
            $this->session->set_flashdata('msg','Your data have been deleted');
        }else{
            $this->session->set_flashdata('notif','error');
            $this->session->set_flashdata('msg','Your data not deleted');
        }

        redirect($data['controller']."/".$data['function']."/".$idcustomer);


    }
    function list_customer_album_add(){
        $data = $this->controller_attr;
        $data['function']='list_customer_album';
        $table_field = $this->db->list_fields($this->tbl_customer_album);
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
        $query=insert_all($this->tbl_customer_album,$insert);
        if($query){
            if(!empty($_FILES['filename']['name'])){
                if (!file_exists('assets/uploads/customer/album/'.$this->db->insert_id())) {
                    mkdir('assets/uploads/customer/album/'.$this->db->insert_id(), 0777, true);
                }
                $config['upload_path'] = 'assets/uploads/customer/album/'.$this->db->insert_id();
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
      redirect($data['controller']."/".$data['function']."/".$insert['customer_id']);
    }

    function list_customer_delete($id=null) {
      $data = $this->controller_attr;
		$function='list_customer';
		$query=delete($this->tbl_customer,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
		    }


    public function customer_detail($id) {
        $data = $this->controller_attr;
        $data['customer']=select_where($this->tbl_customer, 'id',$id)->row();
        $data['page'] = $this->load->view('customer/customer_detail', $data, true);
        $this->load->view('layout_backend',$data);
    }

    
 }
