<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Cashier extends DC_controller {

	function __construct() {
		parent::__construct();
		$this->check_login();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'cashier','controller_name' => 'Cashier','method'=>ucwords($method),'menu'=>$this->get_menu());
		 $this->load->model('Model_cashier', 'cashier');
          $this->load->model('Model_sales', 'sales');
	}
	
	 function index(){
		redirect('chasier/kontrak');
	}
	
	function kontrak(){
		$this->check_access();
		$data = $this->controller_attr;
		$data['function']='kontrak';
		$data['list'] = getAll($this->tbl_kontrak, array('is_delete'=>'where/0'))->result();
        foreach ($data['list'] as $data_row) {
            $customer = isset(select_where($this->tbl_customer, 'id', $data_row->customer_id)->row()->name);
            $data_row->customer = select_where($this->tbl_customer, 'id', $data_row->customer_id)->row()->name;
            $data_row->sales = select_where($this->tbl_user, 'id', $data_row->sales_id)->row()->username;
            $data_row->payment_scheme = select_where($this->tbl_payment_scheme, 'id', $data_row->payment_scheme_id)->row()->title;
        }
		$data['page'] = $this->load->view('cashier/list_kontrak',$data,true);
		$this->load->view('layout_backend',$data);
	}

	function payment(){
    	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='payment';
        $data['list'] = $this->cashier->payment_index();
        foreach ($data['list'] as $key) {
            $key->date_created = indonesian_date($key->date_created);
            if ($key->is_delete == 0) {
                $key->status = "Paid";
            }else{
                $key->status = "Cancelled";
            }
        }
        $data['page'] = $this->load->view('cashier/list_payment', $data, true);
        $this->load->view('layout_backend', $data);
    }
	function payment_form(){
    	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='payment';
        $data['kontrak'] = select_where($this->tbl_kontrak,'is_delete',0)->result();
        $data['rekening'] = select_all($this->tbl_rekening, 'id');
        $data['ps'] = select_all($this->tbl_kontrak_payment_schedule, 'id');
        $id = $this->input->post('id');
        if ($id) {
            $data['data'] = select_where($this->tbl_pemasukan_record, 'id', $id)->row();
            $data['kontrak_id'] = $this->cashier->load_kontrak($id)->kontrak_id;
            $data['kontrak_payment_schedule_id'] = $this->cashier->load_kontrak($id)->kontrak_payment_schedule_id;
        }
        else{
            $data['data'] = null;
        }
        $data['page'] = $this->load->view('cashier/payment_form', $data, true);
        $this->load->view('layout_backend', $data);
    }

     // FOR JS
    function get_kontrak_detail($id){
    	$this->check_access();
		$data = $this->controller_attr;
		$data['function']='payment';
        $data['kontrak_unit'] = getAll($this->tbl_kontrak_unit, array('kontrak_id'=>'where/'.$id))->result();
        $data['record_id'] = $record_id = $this->input->post('kontrak_record_id');
        if ($record_id) {
            $kontrak_payment_schedule_id = $this->model_cashier->load_kontrak($record_id)->kontrak_payment_schedule_id;
            $data['kontrak_payment_schedule'] = select_where($this->tbl_kontrak_payment_schedule, 'id', $kontrak_payment_schedule_id)->row();
        }

        $data['data'] = GetAll($this->tbl_kontrak, array('id'=>'where/'.$id))->row();
        $data['ps'] = GetAll($this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$id, 'status'=>'where/0'));
        $this->load->view('cashier/kontrak_detail', $data);
    }

    function get_payment_schedule_nominal($id){
        $nominal1 = getValue('nominal', $this->tbl_kontrak_payment_schedule, array('id'=>'where/'.$id));
        $nominal2 = getValue('nominal_paid', $this->tbl_kontrak_payment_schedule, array('id'=>'where/'.$id));
        $nominal = $nominal1-$nominal2;

        echo number_format($nominal, 0);
    }
	function payment_add(){
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='payment';
        $kontrak_id = $this->input->post('kontrak_id');
        $kontrak_payment_schedule_id = $this->input->post('kontrak_payment_schedule_id');
        $nominal = str_replace(',', '', $this->input->post('nominal'));
        // filter
        if ($kontrak_id == 0 || $this->input->post('kontrak_payment_schedule_id') == 0 || $this->input->post('rekening_id') == 0 || $nominal == 0) {
                $this->session->set_flashdata('notif','error');
                $this->session->set_flashdata('msg','please compleate your input');
                redirect($data['controller']."/".$data['function']."_form");
        }
        // INSERT TO TABLE KONTRAK_PAYMENT_RECORD
        $payment_type = getValue('payment_type', $this->tbl_kontrak_payment_schedule, array('id'=>'where/'.$kontrak_payment_schedule_id));

        // CHECK UNIT AVAILABILITY
        // if ($payment_type == 1) { // hanya ketika booking fee
        //     $kontrak_unit = select_where($this->tbl_kontrak_unit, 'kontrak_id', $kontrak_id);
        //     if ($kontrak_unit->num_rows() > 0) {
        //         foreach ($kontrak_unit->result() as $ku) {
        //             $unit_status = select_where($this->tbl_unit, 'id', $ku->unit_id)->row()->status;
        //             if ($unit_status == 1) {
        //                 $this->returnJson(array('status' => 'error', 'msg' => 'Payment Failed. Please check unit availability in current form!'));
        //             }
        //         }
        //     }
        // }
        
        $data_kontrak_payment_record = array(
                'kontrak_payment_schedule_id'=>$kontrak_payment_schedule_id,
        		'rekening_id' => $this->input->post('rekening_id'),
        		'nominal'=>$nominal,
        		'payment_type' => $payment_type,
        		'date_created' => date('Y-m-d H:i:s', now()),
                'date_modified' => date('Y-m-d H:i:s', now()),
                'id_creator' => $this->session->userdata['admin']['id'],
                'id_modifier' => $this->session->userdata['admin']['id'],
        	);

        $this->db->insert($this->tbl_kontrak_payment_record, $data_kontrak_payment_record);
        $kontrak_payment_record_id = $this->db->insert_id();

        // INSERT TO TABLE PEMASUKAN RECORD
        do {
            $no_invoice = $this->generate_no_invoice(9);
        } while ($this->is_in_table($no_invoice));

        $data_pemasukan_record = array(
                'no_invoice'=>$no_invoice,
        		'rekening_id'=> $this->input->post('rekening_id'),
        		'kontrak_payment_record_id' => $kontrak_payment_record_id,
        		'nominal'=>$nominal,
        		'date_created' => date('Y-m-d H:i:s', now()),
                'date_modified' => date('Y-m-d H:i:s', now()),
                'id_creator' => $this->session->userdata['admin']['id'],
                'id_modifier' => $this->session->userdata['admin']['id'],
        );
        $this->db->insert($this->tbl_pemasukan_record, $data_pemasukan_record);
        $pemasukan_record_id = $this->db->insert_id();

        //UPDATE INVOICE
       update($this->tbl_kontrak_payment_record, array('no_invoice' => $no_invoice), 'id', $kontrak_payment_record_id);
        
        // UPDATE KONTRAK_PAYMENT_SCHEDULE
        $nominal_paid_1 = getValue('nominal_paid', $this->tbl_kontrak_payment_schedule, array('id'=>'where/'.$kontrak_payment_schedule_id));
        $nominal_paid_2 = $nominal_paid_1 + $nominal;
        $nominal_schedule = getValue('nominal', $this->tbl_kontrak_payment_schedule, array('id'=>'where/'.$kontrak_payment_schedule_id));
        $status = ($nominal_paid_2>=$nominal_schedule) ? 1 : 0;
        $kontrak_payment_schedule_data = array(
                                        'nominal_paid' => $nominal_paid_2,
        								'status'=>$status,
                                        'date_payment' => date('Y-m-d H:i:s', now()),
        								'date_created' => date('Y-m-d H:i:s', now()),
						                'date_modified' => date('Y-m-d H:i:s', now()),
						                'id_creator' => $this->session->userdata['admin']['id'],
						                'id_modifier' => $this->session->userdata['admin']['id'],
        								);
        // UPDATE UNIT STATUS & CUSTOMER STATUS
        if ($payment_type == 1) { // hanya ketika booking fee
           
            $kontrak_unit = select_where($this->tbl_kontrak_unit, 'kontrak_id', $kontrak_id);
            if ($kontrak_unit->num_rows() > 0) {
                foreach ($kontrak_unit->result() as $ku) {
                    $update = array('status' => 1);
                    update($this->tbl_unit, $update, 'id', $ku->unit_id);
                }
            }
            $customer_id = select_where($this->tbl_kontrak, 'id', $kontrak_id)->row()->customer_id;
            // $update = array('status' => 1);
            // update($this->tbl_customer, $update, 'id', $customer_id);
        }

        if ($this->db->where('id', $kontrak_payment_schedule_id)->update($this->tbl_kontrak_payment_schedule, $kontrak_payment_schedule_data)){
            //update sisa hutang
            $kontrak = select_where($this->tbl_kontrak, 'id', $kontrak_id)->row();
            $update = array('sisa_hutang' =>  $kontrak->sisa_hutang - $nominal_paid_2);
            update($this->tbl_kontrak, $update, 'id', $kontrak->id);

            //check bonus sales
            $this->check_bonus_sales($kontrak_id,$payment_type);
             $this->session->set_flashdata('notif','Success');
                $this->session->set_flashdata('msg','Your input have been saved');
                redirect($data['controller']."/".$data['function']);
        }
        else
                $this->session->set_flashdata('notif','error');
                $this->session->set_flashdata('msg','your input not saved');
                redirect($data['controller']."/".$data['function']."_form");
    }

    function payment_delete() {
         $this->check_access();
        $data = $this->controller_attr;
        $data['function']='payment';
       $id = $this->input->post('id');
        //$do_delete = delete($this->tbl_customer, 'id', $id);
        //fetch all detail
        $pemasukan_record = select_where($this->tbl_pemasukan_record, 'id', $id)->row();
        $kontrak_payment_record = select_where($this->tbl_kontrak_payment_record, 'id', $pemasukan_record->kontrak_payment_record_id)->row();
        $kontrak_payment_schedule = select_where($this->tbl_kontrak_payment_schedule, 'id', $kontrak_payment_record->kontrak_payment_schedule_id)->row();
        //change payment status
        $update = array('is_delete' => 1);
        update($this->tbl_pemasukan_record, $update, 'id', $id);
        update($this->tbl_kontrak_payment_record, $update, 'id', $kontrak_payment_record->id);
        
        if (($kontrak_payment_schedule->nominal_paid - $kontrak_payment_record->nominal) == 0) {
            $update = array(
                        'nominal_paid' => 0,
                        'status' => 0,
                        'id_modifier' => $this->session->userdata['admin']['id'],
                        'date_modified' => date('Y-m-d H:i:s', now()),
                    );
        }else{
            $update = array(
                        'nominal_paid' => $kontrak_payment_schedule->nominal_paid - $kontrak_payment_record->nominal,
                        'id_modifier' => $this->session->userdata['admin']['id'],
                        'date_modified' => date('Y-m-d H:i:s', now()),
                    );
        }
        $do_delete =update($this->tbl_kontrak_payment_schedule, $update, 'id', $kontrak_payment_schedule->id);

        //update sisa hutang
        $kontrak = select_where($this->tbl_kontrak, 'id', $kontrak_payment_schedule->kontrak_id)->row();
        $update = array('sisa_hutang' =>  $kontrak->sisa_hutang + $kontrak_payment_record->nominal);
        update($this->tbl_kontrak, $update, 'id', $kontrak->id);

        if ($do_delete) {
           $this->session->set_flashdata('notif','Success');
                $this->session->set_flashdata('msg','your data have been saved');
                redirect($data['controller']."/".$data['function']);
        }
        else
             $this->session->set_flashdata('notif','error');
                $this->session->set_flashdata('msg','your data not saved');
                redirect($data['controller']."/".$data['function']);
    }

    function payment_pdf($id){
        $this->load->model('model_cashier');
        $this->load->library('mpdf60/mpdf');
        // $data['payment'] = select_where($this->tbl_pemasukan_record, 'id', $id)->row();
        $data['payment'] =$this->model_cashier->load_kontrak($id);//print_die($data['payment']);
        $data['kontrak'] = $kontrak = $this->model_cashier->load_kontrak($id);//print_die($data['kontrak'] );
        $data['customer']=select_where($this->tbl_customer, 'id',$data['kontrak']->customer_id)->row();//lastq();
        $data['kontrak_unit'] = getAll($this->tbl_kontrak_unit, array('kontrak_id'=>'where/'.$data['kontrak']->id))->result();
        $kontrak_payment_scheme=select_where($this->tbl_payment_scheme, 'id',$data['kontrak']->payment_scheme_id)->row();
        $data['kontrak_payment_scheme']=$kontrak_payment_scheme->title;
        $kontrak_type_id = getValue('kontrak_type', $this->tbl_payment_scheme, array('id'=>'where/'.$kontrak_payment_scheme->id));
        $data['kontrak_type']=getValue('name', $this->tbl_kontrak_type, array('id'=>'where/'.$kontrak_type_id));
        //print_die($data['payment_schedule']->result());
        $html = $this->load->view('cashier/payment_pdf', $data, true); 
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
    $this->mpdf->Output('Invoice'.'.pdf', 'I');
    }

	function generate_no_invoice($length) {
      $random = '';
      for ($i = 0; $i < $length; $i++) {
        $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
      }
      return $random;
    }

    function is_in_table($no_invoice){
        $no_invoice_num = getAll($this->tbl_pemasukan_record, array('no_invoice'=>'where/'.$no_invoice))->num_rows();
        if($no_invoice_num>0)return true;
         else return false;
    }

    function check_bonus_sales($kontrak_id, $payment_type) {
        $kontrak = select_where($this->tbl_kontrak, 'id', $kontrak_id)->row();
        $sales_percentage =select_where($this->tbl_user, 'id', $kontrak->sales_id)->row()->sales_percentage;
        $bonus_sales = $kontrak->price * ($sales_percentage/100);
        //closing fee bonus
        if ($payment_type == 1) {
            $insert = array('user_id' => $kontrak->sales_id,
                            'kontrak_id' => $kontrak_id,
                            'kontrak_customer_id' => $kontrak->customer_id,
                            'commision_type' => 1,
                            'percentage' => 0,
                            'nominal' => 1000000,
                            'status' => 0,
                            'id_creator' =>$this->session->userdata['admin']['id'],
                            'date_created' => date('Y-m-d H:i:s', now())
                        );
            insert_all($this->tbl_payment_commision_history, $insert);
        }
        //e.o. closing fee bonus

        //bonus pembayaran bertahap/cicilan
        if ($kontrak->kontrak_type_id == 1) {
            $sum_cicilan = $this->cashier->sum_cicilan($kontrak_id);
            $where = array('user_id' => $kontrak->sales_id, 'kontrak_id' => $kontrak_id, 'commision_type' => 2);
            $bonus_status = select_where_array($this->tbl_payment_commision_history, $where);
            if ($sum_cicilan >= ($kontrak->price * 30/100) && $bonus_status->num_rows == 0) {
                $insert = array('user_id' => $kontrak->sales_id,
                    'kontrak_id' => $kontrak_id,
                    'kontrak_customer_id' => $kontrak->customer_id,
                    'commision_type' => 2,
                    'percentage' => 0,
                    'nominal' => $bonus_sales * 50/100,
                    'status' => 0,
                    'id_creator' => $this->session->userdata['admin']['id'],
                    'date_created' => date('Y-m-d H:i:s', now())
                );
                insert_all($this->tbl_payment_commision_history, $insert);
            }else if ($sum_cicilan >= $kontrak->price) {
                $insert = array('user_id' => $kontrak->sales_id,
                            'kontrak_id' => $kontrak_id,
                            'kontrak_customer_id' => $kontrak->customer_id,
                            'commision_type' => 2,
                            'percentage' => 0,
                            'nominal' => $bonus_sales * 50/100,
                            'status' => 0,
                            'id_creator' => $this->session->userdata['admin']['id'],
                            'date_created' => date('Y-m-d H:i:s', now())
                        );
                insert_all($this->tbl_payment_commision_history, $insert);
            }

        }
    }
    public function kontrak_detail($id) {
       $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak';
        $data['kontrak'] = select_where($this->tbl_kontrak, 'id', $id)->row();
        $data['kontrak']->date_created = date('d M Y H:i:s', strtotime($data['kontrak']->date_created));
        $data['kontrak']->sisa_hutang = indonesian_currency($data['kontrak']->sisa_hutang);
        $admin = getValue('first_name', $this->tbl_user, array('id'=>'where/'.$data['kontrak']->id_creator));
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
            $key->nominal = indonesian_currency($key->nominal);
            $key->nominal_paid = indonesian_currency($key->nominal_paid);
            $key->date_created = indonesian_date($key->date_created);
            $key->jatuh_tempo = indonesian_date($key->jatuh_tempo);

        }
        $data['payment_record'] = $this->sales->payment_record_detail($id);
        foreach ($data['payment_record'] as $key) {
            $key->nominal = indonesian_currency($key->nominal);
            $key->date_created = indonesian_date($key->date_created);
            if ($key->is_delete == 0) {
                $key->status = "Paid";
            }else{
                $key->status = "Cancelled";
            }
        }
        $data['last_num_rows'] = $this->sales->last_payment_record_detail($id)->num_rows();
        $data['last'] = $this->sales->last_payment_record_detail($id)->row();
        $data['page'] = $this->load->view('cashier/kontrak_payment_detail',$data,true);
        $this->load->view('layout_backend',$data);
    }

    function lunas_contract() {
         $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak';

        $id = $this->input->post('id');
        $kontrak = select_where($this->tbl_kontrak, 'id', $id)->row();

        $data_kontrak_payment_record = array(
                'kontrak_payment_schedule_id'=>0,
                'rekening_id' => 1,
                'nominal'=>$kontrak->sisa_hutang,
                'payment_type' => 99,
                'date_created' => date('Y-m-d H:i:s', now()),
                'date_modified' => date('Y-m-d H:i:s', now()),
                'id_created' => $this->session_admin['admin_id'],
                'id_modified' => $this->session_admin['admin_id'],
            );

        $this->db->insert($this->tbl_kontrak_payment_record, $data_kontrak_payment_record);
        $kontrak_payment_record_id = $this->db->insert_id();

        // INSERT TO TABLE PEMASUKAN RECORD
        do {
            $no_invoice = $this->generate_no_invoice(9);
        } while ($this->is_in_table($no_invoice));

        $data_pemasukan_record = array(
                'no_invoice'=>$no_invoice,
                'rekening_id'=> 1,
                'kontrak_payment_record_id' => $kontrak_payment_record_id,
                'nominal'=>$kontrak->sisa_hutang,
                'date_created' => date('Y-m-d H:i:s', now()),
                'date_modified' => date('Y-m-d H:i:s', now()),
                'id_created' => $this->session_admin['admin_id'],
                'id_modified' => $this->session_admin['admin_id'],
        );
        $this->db->insert($this->tbl_pemasukan_record, $data_pemasukan_record);
        $pemasukan_record_id = $this->db->insert_id();

        //UPDATE INVOICE
        update($this->tbl_kontrak_payment_record, array('no_invoice' => $no_invoice), 'id', $kontrak_payment_record_id);

        //UPDATE SCHEDULE
        $schedule = select_where_array($this->tbl_kontrak_payment_schedule, array('status' => 0, 'kontrak_id' => $id));
        if ($schedule->num_rows() > 0) {
            foreach ($schedule->result() as $d) {
                $update = array(
                                        'nominal_paid' => 0,
                                        'status'=>1,
                                        'date_payment' => date('Y-m-d H:i:s', now()),
                                        'date_created' => date('Y-m-d H:i:s', now()),
                                        'date_modified' => date('Y-m-d H:i:s', now()),
                                        'id_created' => $this->session_admin['admin_id'],
                                        'id_modified' => $this->session_admin['admin_id'],
                                        );
                $update = update($this->tbl_kontrak_payment_schedule, $update, 'id', $d->id);
            }
        }
                
        //UPDATE KONTRAK        
        $update = array('sisa_hutang' => 0);
        $do_update = update($this->tbl_kontrak,$update,'id',$id);

        if ($do_update) {
            $this->session->set_flashdata('notif','Success');
                $this->session->set_flashdata('msg','your data have been saved');
                redirect($data['controller']."/".$data['function']);
        }
        else
            $this->session->set_flashdata('notif','error');
                $this->session->set_flashdata('msg','your input not saved');
                redirect($data['controller']."/".$data['function']."_form");
    }
    function kontrak_batal($id){
        $this->check_access();
        $data = $this->controller_attr;
        $data['function']='kontrak';
        $kontrak=select_where($this->tbl_kontrak,'id',$id)->row();
        $kontrak_unit=select_where($this->tbl_kontrak_unit,'kontrak_id',$id)->row();
        $data_kontrak=array(
            'status'=>1,
            );
        update($this->tbl_kontrak,$data_kontrak,'id',$id);
        $data_unit=array('status' => '', );
        $do_update=update($this->tbl_unit,$data_unit,'id',$kontrak_unit->unit_id);
        if ($do_update) {
            $this->session->set_flashdata('notif','Success');
                $this->session->set_flashdata('msg','your data have been saved');
                redirect($data['controller']."/".$data['function']);
        }
        else
            $this->session->set_flashdata('notif','error');
                $this->session->set_flashdata('msg','your input not saved');
                redirect($data['controller']."/".$data['function']);
    }
   
}

