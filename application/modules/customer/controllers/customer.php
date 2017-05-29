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
        	$insert['photo']=='';
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
    function list_customer_image_add(){
        $data = $this->controller_attr;
        $data += $this->get_function('List Customer','list_customer_image');
        //$menu = $this->get_menu_id($data['function']);$this->userakses($menu->id, 2);
        $img_name_crop = uniqid().'-rg.jpg';
        $data_insert = array(
            'customer_id' => $this->input->post('customer-id'),
            'filename' => $img_name_crop,
            'caption' => $this->input->post('customer-caption')
            );
        if($this->input->post('image')) {
            $origw = $this->input->post('origwidth');
            $origh = $this->input->post('origheight');
            $fakew = $this->input->post('fakewidth');
            $fakeh = $this->input->post('fakeheight');
            $x = $this->input->post('x') * $origw / $fakew;
            $y = $this->input->post('y') * $origh / $fakeh;
            # ambil width crop
            $targ_w = $this->input->post('w') * $origw / $fakew;
            # ambil heigth crop
            $targ_h = $this->input->post('h') * $origh / $fakeh;
            # rasio gambar crop
            $jpeg_quality = 100;
            if(!is_dir(FCPATH . "assets/uploads/customer/".$this->input->post('customer-id')))
                mkdir(FCPATH . "assets/uploads/customer/".$this->input->post('customer-id'));
            if(basename($this->input->post('image')) && $this->input->post('image') != null){
                $src = $this->input->post('image');
            }
            # inisial handle copy gambar
            $ext = pathinfo($src, PATHINFO_EXTENSION);

            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG')
                $img_r = imagecreatefromjpeg($src);
            if($ext == 'png' || $ext == 'PNG')
                $img_r = imagecreatefrompng($src);
            if($ext == 'gif' || $ext == 'GIF')
                $img_r = imagecreatefromgif($src);

            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
            # simpan hasil croping pada folder lain
            $path_img_crop = realpath(FCPATH . "assets/uploads/customer/".$this->input->post('customer-id'));
            # nama gambar yg di crop
            # proses copy
            imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$targ_w,$targ_h);
            # buat gambar
            imagejpeg($dst_r,$path_img_crop .'/'. $img_name_crop,$jpeg_quality);
            $this->makeThumbnails($path_img_crop.'/', $img_name_crop, 300, 453);
            $this->delete_temp('temp_folder');
            $insert = $this->model_basic->insert_all($this->tbl_customer_image,$data_insert);
            if($insert)
                $this->returnJson(array('status' => 'ok','message' => 'Insert Success','redirect' => $data['controller'].'/'.$data['function'].'/'.$this->input->post('customer-id')));
            else
                $this->returnJson(array('status'=>'error','message'=>'Insert Failed'));
        }
        else
            $this->returnJson(array('status' => 'error','message' => 'Please Complete The Form'));
    }

    function list_customer_image_get(){
        $id = $this->input->post('id');
        $data = $this->controller_attr;
        $data += $this->get_function('List Customer','list_customer_image');
        $data_get = $this->model_basic->select_where($this->customer_image,'id',$id)->row();
        if($data_get){
            $this->returnJson(array('status'=>'ok','data'=>$data_get));
        }
        else{
            $this->returnJson(array('status'=>'error','message'=>'Data Not Found'));
        }
    }

    function list_customer_image_edit(){
        $data = $this->controller_attr;
        $data += $this->get_function('List Customer','list_customer_image');
        //$menu = $this->get_menu_id($data['function']);$this->userakses($menu->id, 3);
        $id = $this->input->post('id');
        $img_name_crop = uniqid().'-rg.jpg';
        $foto = $this->input->post('image');
        $old_foto = $this->input->post('old_image');
        $data_update = array(
            'customer_id' => $this->input->post('customer-id'),
            'caption' => $this->input->post('customer-caption')
            );
        if($foto && (basename($foto) != $old_foto))
            $data_update['filename'] = $img_name_crop;
        else if($this->input->post('x') || $this->input->post('y') || $this->input->post('w') || $this->input->post('h'))
            $data_update['filename'] = $img_name_crop;

        if(!$this->model_basic->update($this->tbl_customer_image,$data_update,'id',$id))
        {
            $this->returnJson(array('status' => 'error', 'message' => 'Update Failed'));
        }
        else
        {
            if(($foto && (basename($foto) != $old_foto)) || ($this->input->post('x') || $this->input->post('y') || $this->input->post('w') || $this->input->post('h')))
            {
                $origw = $this->input->post('origwidth');
                $origh = $this->input->post('origheight');
                $fakew = $this->input->post('fakewidth');
                $fakeh = $this->input->post('fakeheight');
                $x = $this->input->post('x') * $origw / $fakew;
                $y = $this->input->post('y') * $origh / $fakeh;
                # ambil width crop
                $targ_w = $this->input->post('w') * $origw / $fakew;
                # abmil heigth crop
                $targ_h = $this->input->post('h') * $origh / $fakeh;
                # rasio gambar crop
                $jpeg_quality = 90;
                if(!is_dir(FCPATH . "assets/uploads/customer/".$this->input->post('customer-id')))
                    mkdir(FCPATH . "assets/uploads/customer/".$this->input->post('customer-id'));
                if(basename($foto) && $foto != null){
                    $src = $this->input->post('image');
                }
                else if($this->input->post('x')||$this->input->post('y')||$this->input->post('w')||$this->input->post('h'))
                    $src = "assets/uploads/customer/".$this->input->post('customer-id').'/'.$old_foto;
                # inisial handle copy gambar
                $ext = pathinfo($src, PATHINFO_EXTENSION);

                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG')
                    $img_r = imagecreatefromjpeg($src);
                if($ext == 'png' || $ext == 'PNG')
                    $img_r = imagecreatefrompng($src);
                if($ext == 'gif' || $ext == 'GIF')
                    $img_r = imagecreatefromgif($src);

                $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
                # simpan hasil croping pada folder lain
                $path_img_crop = realpath(FCPATH . "assets/uploads/customer/".$this->input->post('customer-id'));
                # nama gambar yg di crop
                # proses copy
                imagecopyresampled($dst_r,$img_r,0,0,$x,$y,$targ_w,$targ_h,$targ_w,$targ_h);
                # buat gambar
                imagejpeg($dst_r,$path_img_crop .'/'. $img_name_crop,$jpeg_quality);
                $this->makeThumbnails($path_img_crop.'/', $img_name_crop, 300, 454);
                @unlink(FCPATH."assets/uploads/customer/".$this->input->post('customer-id').'/'.$old_foto);
                $this->delete_temp('temp_folder');
            }
            $this->returnJson(array('status' => 'ok', 'message' => 'Update Success','redirect' => $this->controller_attr['controller'].'/'.$data['function'].'/'.$this->input->post('customer-id')));
        }
    }

    function list_customer_image_delete($id){
        $data = $this->controller_attr;
        $data += $this->get_function('customer Image','list_customer_image');
        //$menu = $this->get_menu_id($data['function']);$this->userakses($menu->id, 4);
        $customer_image_data = $this->model_basic->select_where($this->tbl_customer_image,'id',$id)->row();
        $delete = $this->model_basic->delete($this->tbl_customer_image,'id',$id);
        @unlink(FCPATH."assets/uploads/customer/".$customer_image_data->customer_id.'/'.$customer_image_data->filename);
        if($delete)
            redirect($data['controller'].'/'.$data['function'].'/'.$customer_image_data->customer_id);
        else
            redirect($data['controller'].'/'.$data['function'].'/'.$customer_image_data->customer_id);
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


    function unit_album_add(){
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

    
 }
