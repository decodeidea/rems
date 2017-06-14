<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class unit extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'unit','controller_name' => 'Unit','method'=>ucwords($method),'menu'=>$this->get_menu());
	}
	
	 function index(){
		redirect('unit/list_unit');
	}
	function list_unit(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='list_unit';
		$list=select_all($this->tbl_unit);
		foreach ($list as $key) {
			$area=select_where($this->tbl_area,'id',$key->area_id)->row();
			$key->area=$area->name;

			$unit_type=select_where($this->tbl_unit_type,'id',$key->unit_type)->row();
			$key->area=$unit_type->name;
		}
		$data['list']=$list;
		$data['page'] = $this->load->view('unit/list_unit',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function list_unit_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='list_unit';
		if ($id) {
            $data['data'] = select_where($this->tbl_unit, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
        $data['area']=select_all($this->tbl_area);
        $data['unit_type']=select_all($this->tbl_unit_type);
		$data['page'] = $this->load->view('unit/list_unit_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function list_unit_update(){
		$data = $this->controller_attr;
		$data['function']='list_unit';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_unit);
		$unit=select_where($this->tbl_unit,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
    
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_unit,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function list_unit_add(){
		$data = $this->controller_attr;
		$data['function']='list_unit';
		$table_field = $this->db->list_fields($this->tbl_unit);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_unit,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function list_unit_delete($id){
		$data = $this->controller_attr;
		$function='list_unit';
		$query=delete($this->tbl_unit,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}
	function unit_album($id){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='unit_album';
		$data['list']=select_all($this->tbl_unit_album);
		$data['page'] = $this->load->view('unit/list_unit_album',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function unit_album_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='area_album';
		if ($id) {
            $data['data'] = select_where($this->tbl_unit_album, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('unit/unit_album_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function unit_album_add(){
		$data = $this->controller_attr;
		$data['function']='area_album';
		$table_field = $this->db->list_fields($this->tbl_unit_album);
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
        $query=insert_all($this->tbl_unit_album,$insert);
		if($query){
			if(!empty($_FILES['filename']['name'])){
			if (!file_exists('assets/uploads/unit/'.$this->db->insert_id())) {
    				mkdir('assets/uploads/unit/'.$this->db->insert_id(), 0777, true);
			 }
        	 $config['upload_path'] = 'assets/uploads/unit/'.$this->db->insert_id();
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

	function unit_album_delete($id){
		$data = $this->controller_attr;
		$function='area';
		$query=delete($this->tbl_unit_album,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}
	function area(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='area';
		$data['list']=select_all($this->tbl_area);
		$data['page'] = $this->load->view('unit/list_area',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function area_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='area';
		if ($id) {
            $data['data'] = select_where($this->tbl_area, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('unit/area_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function area_update(){
		$data = $this->controller_attr;
		$data['function']='area';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_area);
		$area=select_where($this->tbl_area,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
        if(empty($_FILES['images']['name'])){
        	$update['images']=$area->images;
        }else{
        	 $update['images']=$_FILES['images']['name'];
        }
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_area,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function area_add(){
		$data = $this->controller_attr;
		$data['function']='area';
		$table_field = $this->db->list_fields($this->tbl_area);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_area,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function area_delete($id){
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
		
		$data['page'] = $this->load->view('unit/list_denah_area',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function form_denah_submit() {
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='Pengajuan harga';
       

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

	function list_block($id){
      	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='list_block';
        $where=array(
            'area_id'=>$id,
            //'is_delete'=>0,
            );
        $data['area']=select_where($this->tbl_area,'id',$id)->row();
        $data['unit']=select_where_array_group($this->tbl_unit,$where,'block')->result();

        
       	$data['page'] = $this->load->view('unit/list_block',$data,true); //print_r($data['content']);
       	$this->load->view('layout_backend',$data);
    }

    function area1_blockA(){

        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='Denah';
        
        $data['a1']=select_where($this->tbl_unit,'id',1)->row();

       
        $this->load->view('unit/area1/blockA',$data);
    }
}

