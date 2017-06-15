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
	
	function payment_type(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='payment_type';
		$data['list']=select_all($this->tbl_payment_type);
		$data['page'] = $this->load->view('finance/list_payment',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function payment_type_form($id=null){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='payment_type';
		if ($id) {
            $data['data'] = select_where($this->tbl_payment_type, 'id', $id)->row();
        }
        else{
            $data['data'] = null;
        }
		$data['page'] = $this->load->view('finance/list_payment_form',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function payment_type_update(){
		$data = $this->controller_attr;
		$data['function']='payment_type';
		$id=$this->input->post('id');
		$table_field = $this->db->list_fields($this->tbl_payment_type);
		$area=select_where($this->tbl_payment_type,'id',$id)->row();
		$update = array();
        foreach ($table_field as $field) {
            $update[$field] = $this->input->post($field);
        }
     
        $update['date_modified']= date("Y-m-d H:i:s");
        $update['id_modifier']=$this->session->userdata['admin']['id'];
        $query=update($this->tbl_payment_type,$update,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been updated');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not updated');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function payment_type_add(){
		$data = $this->controller_attr;
		$data['function']='payment_type';
		$table_field = $this->db->list_fields($this->tbl_payment_type);
		$insert = array();
        foreach ($table_field as $field) {
            $insert[$field] = $this->input->post($field);
        }
        $insert['date_created']= date("Y-m-d H:i:s");
        $insert['id_creator']=$this->session->userdata['admin']['id'];
        $query=insert_all($this->tbl_payment_type,$insert);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been added');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not added');
		}
		redirect($data['controller']."/".$data['function']);
	}

	function payment_type_delete($id){
		$data = $this->controller_attr;
		$function='payment_type';
		$query=delete($this->tbl_payment_type,'id',$id);
		if($query){
			$this->session->set_flashdata('notif','success');
			$this->session->set_flashdata('msg','Your data have been deleted');
		}else{
			$this->session->set_flashdata('notif','error');
			$this->session->set_flashdata('msg','Your data not deleted');
		}
	}



	//MODULE PAYMENT_SCHEMA
 function payment_scheme() {
		$data = $this->controller_attr;
		$data['function']='payment_scheme';
		$data['list'] = select_all($this->tbl_payment_scheme);
		$data['page'] = $this->load->view('finance/payment_scheme', $data, true);
		$this->load->view('layout_backend',$data);
	}


	public function payment_scheme_form($id=null) {
		$data = $this->controller_attr;
		$data['function']='payment_scheme';

		//$this->check_userakses($data['function_id'], ACT_CREATE);
		$data['detail'] = getAll($this->tbl_payment_scheme_detail, array('payment_scheme_id'=>'where/'.$id));
		$data['kontrak_type'] = getAll($this->tbl_kontrak_type)->result();
		if ($id) {
			$data['data'] = select_where($this->tbl_payment_scheme, 'id', $id)->row();
			$data['payment_type'] = getAll($this->tbl_payment_type);
		}
		else {
			$data['data'] = null;
			$data['payment_type'] = getAll($this->tbl_payment_type);
		}

		$data['page'] = $this->load->view('finance/payment_scheme_form', $data, true);
		$this->load->view('layout_backend',$data);
	}

	function payment_scheme_add() {
		// print_r($_POST);die();
		$data = $this->controller_attr;
		$data['function']='payment_scheme';
		$images = $this->input->post('images');
		$table_field = $this->db->list_fields($this->tbl_payment_scheme);
		$insert = array();
		foreach ($table_field as $field) {
			$insert[$field] = $this->input->post($field);
		}
		$insert['date_created'] = date('Y-m-d H:i:s', now());
		$insert['date_modified'] = date('Y-m-d H:i:s', now());
		$insert['id_creator'] = $this->session->userdata['admin']['id'];
		$insert['id_modifier'] = $this->session->userdata['admin']['id'];
		//filter persentase
		$persentase = $this->input->post('persentase');
		$total_persentase = 0;
		foreach ($persentase as $d) {
			$total_persentase = $total_persentase + $d;
		}
		if ($total_persentase > 100) {
			$this->returnJson(array('status' => 'error', 'msg' => 'Persentase tidak dapat melebihi 100%!'));
		}
		if ($insert['title'] && $insert['kontrak_type'] && $insert['bunga'] ) {
			// print_r($insert);die();
			$do_insert = insert_all($this->tbl_payment_scheme, $insert);
			$payment_scheme_id = $this->db->insert_id();
			if ($do_insert) {
				$title = $this->input->post('title_detail');
				$payment_type_id = $this->input->post('payment_type_id');
				$tenor = $this->input->post('tenor');
				$interval = $this->input->post('interval');
				$persentase = $this->input->post('persentase');
				for ($i=0; $i < sizeof($title) ; $i++) {

					$detail = array(
						'payment_scheme_id' => $payment_scheme_id,
						'title' => $title[$i],
						'payment_type_id' => $payment_type_id[$i],
						'tenor' => $tenor[$i],
						'interval' => $interval[$i],
						'persentase' => $persentase[$i],
					);

					$this->db->insert($this->tbl_payment_scheme_detail, $detail);
				}

				//$this->returnJson(array('status' => 'ok', 'msg' => 'Input data success', 'redirect' => base_url(). $data['controller'] . '/' . $data['function']));
				$this->session->set_flashdata('notif','success');
				$this->session->set_flashdata('msg','Your data have been added');
				redirect($data['controller']."/".$data['function']);
			}
			else
				$this->returnJson(array('status' => 'error', 'msg' => 'Failed when saving data'));
		}
		else


			$this->returnJson(array('status' => 'error', 'msg' => 'Please complete the form'));
	}

	function payment_scheme_edit() {
		// print_c($_POST);
		$data = $this->controller_attr;
		$data['function']='payment_scheme';
		$images = $this->input->post('images');
		$table_field = $this->db->list_fields($this->tbl_payment_scheme);
		$update = array();
		foreach ($table_field as $field) {
			$update[$field] = $this->input->post($field);
		}
		unset($update['date_created']);

		$insert['date_modified'] = date('Y-m-d H:i:s', now());
		$insert['id_modifier'] = $this->session->userdata['admin']['id'];
		//filter persentase
		$persentase = $this->input->post('persentase');
		$total_persentase = 0;
		foreach ($persentase as $d) {
			$total_persentase = $total_persentase + $d;
		}
		if ($total_persentase > 100) {
			$this->returnJson(array('status' => 'error', 'msg' => 'Persentase tidak dapat melebihi 100%!'));
		}
		if ($update['title'] && $update['bunga']) {
			$do_update = update($this->tbl_payment_scheme, $update, 'id', $update['id']);
			if ($do_update){
				$this->db->where('payment_scheme_id', $update['id'])->delete($this->tbl_payment_scheme_detail);
				$title = $this->input->post('title_detail');//print_die($title);
				$payment_type_id = $this->input->post('payment_type_id');
				$tenor = $this->input->post('tenor');
				$interval = $this->input->post('interval');
				$persentase = $this->input->post('persentase');
				for ($i=0; $i < sizeof($title) ; $i++) {

					$detail = array(
						'payment_scheme_id' => $update['id'],
						'title' => $title[$i],
						'payment_type_id' => $payment_type_id[$i],
						'tenor' => $tenor[$i],
						'interval' => $interval[$i],
						'persentase' => $persentase[$i],
					);

					$this->db->insert($this->tbl_payment_scheme_detail, $detail);
					// print_c(lq());
				}

				$this->session->set_flashdata('notif','success');
				$this->session->set_flashdata('msg','Your data have been added');
				redirect($data['controller']."/".$data['function']);

			}else{
				$this->returnJson(array('status' => 'error', 'msg' => 'Failed when updating data'));
			}
		}
		else
			$this->returnJson(array('status' => 'error', 'msg' => 'Please complete the form'));
	}

	function payment_scheme_delete($id) {
		$data = $this->controller_attr;
		$data['function']='payment_scheme';
		$do_delete = delete($this->tbl_payment_scheme, 'id', $id);

		//$this->delete_folder('area/' . $id);
		 if($do_delete){
				$this->session->set_flashdata('notif','success');
				$this->session->set_flashdata('msg','Your data have been deleted');
			}else{
				$this->session->set_flashdata('notif','error');
				$this->session->set_flashdata('msg','Your data not deleted');
			}
		redirect($data['controller']."/".$data['function']);
			//$this->returnJson(array('status' => 'error', 'msg' => 'Delete Failed'));
	}

	// FUNCTION FOR JS
	function add_row($id){
		$data['id'] = $id;
		$data['payment_type'] = getAll($this->tbl_payment_type);

		$this->load->view('finance/payment_scheme_detail_row', $data);

	}



	//MODULE CHANGE PAYMENT SCHEME
	public function change_payment_scheme() {
		$data = $this->controller_attr;
		$this->check_access();
		$data['kontrak'] =getAll($this->tbl_kontrak)->result();
		$data['page'] = $this->load->view('finance/change_payment_scheme', $data, true);
		$this->load->view('layout_backend',$data);
	}

	function change_payment_scheme_add() {

		$data = $this->controller_attr;

		$this->check_access();
		$data['function']='change_payment_scheme';
		$booking_fee = str_replace(',', '', $this->input->post('booking_fee'));
		$price = str_replace(',', '', $this->input->post('price'));
		// print_die($price);
		if ($booking_fee > $price) {
			$this->returnJson(array('status' => 'error', 'msg' => 'Booking fee tidak dapat melebihi Price!'));
		}

		$table_field = $this->db->list_fields($this->tbl_kontrak);
		$insert = array();
		foreach ($table_field as $field) {
			$insert[$field] = $this->input->post($field);
		}
		unset($insert['date_created']);
		$insert['date_modified'] = date('Y-m-d H:i:s', now());
		$insert['id_modifier'] = $this->session->userdata['admin']['id'];
		$insert['price'] = $price;
		$id = $this->input->post('id');
		//$is_signed = $this->input->post('is_signed');
		$is_signed = 1;
		$insert['is_signed'] = $is_signed;
		$insert['sisa_hutang'] = str_replace(',', '', $this->input->post('sisa_hutang'));
		print_r($insert);
		if ($insert['sales_id'] && $insert['customer_id'] && $insert['payment_scheme_id'] && $insert['no_kontrak']) {
			$do_insert = insert_all($this->tbl_kontrak, $insert);
			$kontrak_id = $this->db->insert_id();
			// $this->db->where('id', $this->input->post('kontrak_id'))->update($this->tbl_kontrak, array('is_delete'=>1));
			if($is_signed == 0){
				// $kontrak_id = $id;

				// INSERT TO TABLE KONTRAK_PAYMENT_SCHEDULE

				$kontrak_payment_schedule_id = $this->sales->insert_kontrak_payment_schedule($kontrak_id);

				//UPDATE DATE_END DITABLE KONTRAK, AMBIL DARI JATUH TEMPO PALING TERAKHIR DI PAYMENT SCHEDULE
				$this->sales->update_kontrak_date_end($kontrak_id);

				//CHECK BONUS SALES
				// $this->check_bonus_sales($kontrak_id);

				// INSERT TO TABLE KONTRAK PAYMENT RECORD
				/*$data_kontrak_payment_record = array(
                    'kontrak_payment_schedule_id' => $kontrak_payment_schedule_id,
                    'rekening_id' => $this->input->post('rekening_id'),
                    'nominal'=> str_replace(',', '', $this->input->post('booking_fee')),
                    'payment_type'=> 1,
                 );
                $this->db->insert($this->tbl_kontrak_payment_record, $data_kontrak_payment_record);
                $kontrak_payment_record_id = $this->db->insert_id();
                $pemasukan_record_data = array('rekening_id' => $this->input->post('rekening_id'),
                                                'kontrak_payment_record_id'=>$kontrak_payment_record_id,
                                                'nominal'=> str_replace(',', '', $this->input->post('booking_fee')),
                                                'date_created' => date('Y-m-d H:i:s', now()),
                                                'date_modified' => date('Y-m-d H:i:s', now()),
                                                'id_created' => $this->session_admin['admin_id'],
                                                'id_modified' => $this->session_admin['admin_id'],
                                                );
                $this->db->insert($this->tbl_pemasukan_record, $pemasukan_record_data);*/
			}
			if ($do_insert){
				$this->db->where('id',$kontrak_id)->update($this->tbl_kontrak, array('is_signed'=>1));
				$this->session->set_flashdata('notif','success');
				$this->session->set_flashdata('msg','Your data have been update');
				redirect($data['controller']."/".$data['function']);
			//	$this->returnJson(array('status' => 'ok', 'msg' => 'Update success', 'redirect' => 'sales/' . $data['function']));
			}
			else
			{

				$this->session->set_flashdata('notif','error');
				$this->session->set_flashdata('msg','Failed when updating data');
			}
		}
		else
			$this->session->set_flashdata('notif','error');
		$this->session->set_flashdata('msg','Please complete the form');
	}

	function get_kontrak_detail($id){
		$data = $this->controller_attr;
		$data['kontrak_unit'] = getAll($this->tbl_kontrak_unit, array('kontrak_id'=>'where/'.$id))->result();
		$data['payment_scheme'] = getAll($this->tbl_payment_scheme);
		$data['record_id'] = $record_id = $this->input->post('kontrak_record_id');
		if ($record_id) {
			$kontrak_payment_schedule_id = $this->model_cashier->load_kontrak($record_id)->kontrak_payment_schedule_id;
			$data['kontrak_payment_schedule'] = $this->model_basic->select_where($this->tbl_kontrak_payment_schedule, 'id', $kontrak_payment_schedule_id)->row();
		}

		$data['data'] = GetAll($this->tbl_kontrak, array('id'=>'where/'.$id))->row();
		$data['ps'] = GetAll($this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$id, 'status'=>'where/0'));
		$this->load->view('finance/kontrak_detail',$data);
	}
}



