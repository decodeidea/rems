<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_sales extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	function kontrak_detail($id)
	{
		$this->db->select('a.*, b.rekening_id')
				 ->from($this->tbl_kontrak.' as a');
		$q = $this->db->get();
	}

	function insert_kontrak_payment_schedule($kontrak_id, $bunga)
	{
		 // $data_payment_schedule_booking = array(
   //              'kontrak_id'=>$kontrak_id,
   //              'payment_type'=>1,
   //              'title'=> "Booking Fee",
   //              'jatuh_tempo' => $this->input->post('date_end'),
   //              'nominal' => str_replace(',', '', $this->input->post('booking_fee')),
   //              'date_payment' => date('Y-m-d H:i:s', now()),
   //              'status' => 1,
   //              'date_created' => date('Y-m-d H:i:s', now()),
   //              'date_modified' => date('Y-m-d H:i:s', now()),
   //              'id_created' => $this->session_admin['admin_id'],
   //              'id_modified' => $this->session_admin['admin_id'],

   //          );
   //      $this->db->insert($this->tbl_kontrak_payment_schedule, $data_payment_schedule_booking);
   //      $data_payment_schedule_booking = $this->db->insert_id();

        $payment_scheme_id = getValue('payment_scheme_id', $this->tbl_kontrak, array('id'=>'where/'.$kontrak_id));
        // $dp = getValue('down_payment', $this->tbl_payment_scheme, array('id'=>'where/'.$payment_scheme_id));
        // $cicilan = getValue('cicilan', $this->tbl_payment_scheme, array('id'=>'where/'.$payment_scheme_id));

        //insert booking fee
        $booking_fee = str_replace(',', '', $this->input->post('booking_fee'));
        $nominal = $booking_fee;
        $jatuh_tempo = date('Y-m-d H:i:s', now());
        $data = array(
            'kontrak_id'=>$kontrak_id,
            'payment_type'=> 1,
            'title'=> "Booking Fee",
            'jatuh_tempo' => $jatuh_tempo,
            'nominal' => $nominal,
            'status' => 0,
            'date_created' => date('Y-m-d H:i:s', now()),
            'id_creator' => $this->session->userdata['admin']['id'],
        );  
        $this->db->insert($this->tbl_kontrak_payment_schedule, $data);

        //insert scheme
        $payment_scheme_detail = getAll($this->tbl_payment_scheme_detail, array('payment_scheme_id'=>'where/'.$payment_scheme_id, 'tenor'=>'order/desc'));
        // $jatuh_tempo = $this->input->post('date_end');
        $jatuh_tempo = date('Y-m-d H:i:s', now());
        // $price = str_replace(',', '', $this->input->post('price'));
        $price = str_replace(',', '', $this->input->post('sisa_hutang'));
        foreach ($payment_scheme_detail->result() as $r) {
            for ($i=1; $i <= $r->tenor; $i++) { 
               $nominal = ($price * ($r->persentase/100))/$r->tenor;
               $jatuh_tempo = date('Y-m-d', strtotime($jatuh_tempo . "+$r->interval days"));
               $data = array(
                    'kontrak_id'=>$kontrak_id,
                    'payment_type'=>$r->payment_type_id,
                    'title'=> $r->title.' - '.$i,
                    'jatuh_tempo' => $jatuh_tempo,
                    'nominal' => $nominal + $bunga,
                    'status' => 0,
                    'date_created' => date('Y-m-d H:i:s', now()),
                    'id_creator' => $this->session->userdata['admin']['id'],
                );
               $this->db->insert($this->tbl_kontrak_payment_schedule, $data);
            }
        }

        // if($dp>0){
        // 	for($i=1;$i<=$dp;$i++){
        // 		$data_payment_schedule_dp = array(
        //         'kontrak_id'=>$kontrak_id,
        //         'payment_type'=>2,
        //         'title'=> "DP Ke ".$i,
        //         'jatuh_tempo' => $this->input->post('date_end'),
        //         'nominal' => 0,
        //         'date_payment' => date('Y-m-d H:i:s', now()),
        //         'status' => 0,
        //         'date_created' => date('Y-m-d H:i:s', now()),
        //         'date_modified' => date('Y-m-d H:i:s', now()),
        //         'id_created' => $this->session_admin['admin_id'],
        //         'id_modified' => $this->session_admin['admin_id'],

        //     );
        // 		$this->db->insert($this->tbl_kontrak_payment_schedule, $data_payment_schedule_dp);
        // 	}
        // }

        // if($cicilan>0){
        // 	for($i=1;$i<=$cicilan;$i++){
        // 		$data_payment_schedule_cicilan = array(
        //         'kontrak_id'=>$kontrak_id,
        //         'payment_type'=>2,
        //         'title'=> "Cicilan Ke ".$i,
        //         'jatuh_tempo' => $this->input->post('date_end'),
        //         'nominal' => 0,
        //         'date_payment' => date('Y-m-d H:i:s', now()),
        //         'status' => 0,
        //         'date_created' => date('Y-m-d H:i:s', now()),
        //         'date_modified' => date('Y-m-d H:i:s', now()),
        //         'id_created' => $this->session_admin['admin_id'],
        //         'id_modified' => $this->session_admin['admin_id'],
        //     );

        //         $this->db->insert($this->tbl_kontrak_payment_schedule, $data_payment_schedule_cicilan);
        // 	}
        // }
        /*$data2 = array(
                  'nominal_paid'=>$booking_fee,
                  'status'=>0,
                  'date_payment'=>date('Y-m-d H:i:s', now()),
                  );
        $this->db->where('kontrak_id', $kontrak_id)->where('payment_type', 1)->update($this->tbl_kontrak_payment_schedule, $data2);*/
        //$this->db->where('kontrak_id', $kontrak_id)->where('payment_type', 1)->update($this->tbl_kontrak_payment_schedule, array('nominal'=>$booking_fee));
        $f = array(
                'kontrak_id' => $kontrak_id,
                'payment_type' => 1
            );
        $id_payment_schedule_booking = getValue('id', $this->tbl_kontrak_payment_schedule, $f);
        return $id_payment_schedule_booking;
	}

  function payment_record_detail($kontrak_id)
  {
    $this->db->select('a.id as id,a.rekening_id, d.no_kontrak, c.title as payment_title, a.nominal, a.date_created,a.is_delete')
         ->from($this->tbl_pemasukan_record.' as a')
                 ->join($this->tbl_kontrak_payment_record.' as b', 'a.kontrak_payment_record_id = b.id')
                 ->join($this->tbl_kontrak_payment_schedule.' as c', 'b.kontrak_payment_schedule_id = c.id')
                 ->join($this->tbl_kontrak.' as d' , 'c.kontrak_id = d.id')
                 ->join($this->tbl_payment_type.' as e', 'c.payment_type = e.id')
                 ->where('d.id', $kontrak_id);

    $q = $this->db->get()->result();
        return $q;
  }

  function last_payment_record_detail($kontrak_id)
  {
    $this->db->select('a.id as id,a.rekening_id, d.no_kontrak, e.title as payment_type, a.nominal, a.date_created')
         ->from($this->tbl_pemasukan_record.' as a')
                 ->join($this->tbl_kontrak_payment_record.' as b', 'a.kontrak_payment_record_id = b.id')
                 ->join($this->tbl_kontrak_payment_schedule.' as c', 'b.kontrak_payment_schedule_id = c.id')
                 ->join($this->tbl_kontrak.' as d' , 'c.kontrak_id = d.id')
                 ->join($this->tbl_payment_type.' as e', 'c.payment_type = e.id')
                 ->where('d.id', $kontrak_id)
                 ->order_by('a.id', 'desc');

    $q = $this->db->get();
        return $q;
  }

  function select_unit($id){
    $this->db->select('a.number as number, a.price, b.name as area')
         ->from($this->tbl_unit.' as a')
         ->join($this->tbl_area.' as b', 'a.area_id=b.id')
         ->where('a.id',$id);
    $query= $this->db->get();
    return $query;
  }

  function update_kontrak_date_end($kontrak_id){
    $jatuh_tempo_terakhir = getValue('jatuh_tempo', $this->tbl_kontrak_payment_schedule, array('kontrak_id'=>'where/'.$kontrak_id, 'id'=>'order/desc'));
    $this->db->where('id', $kontrak_id)->update($this->tbl_kontrak, array('date_end'=>$jatuh_tempo_terakhir));
    return true;
  }
  function unit_tbl(){

    $this->db->select('a.*, b.name as name_area')
         ->from($this->tbl_unit.' as a')
         ->join($this->tbl_area.' as b', 'a.area_id=b.id')
         ->where('a.status','0');
    $query= $this->db->get();
    return $query;

  }

  //payment model
  function payment_index($id)
  {
    $this->db->select('a.id as id, d.no_kontrak, c.title as payment_title, a.nominal, a.date_created, a.is_delete')
         ->from($this->tbl_pemasukan_record.' as a')
                 ->join($this->tbl_kontrak_payment_record.' as b', 'a.kontrak_payment_record_id = b.id')
                 ->join($this->tbl_kontrak_payment_schedule.' as c', 'b.kontrak_payment_schedule_id = c.id')
                 ->join($this->tbl_kontrak.' as d' , 'c.kontrak_id = d.id')
                 ->join($this->tbl_payment_type.' as e', 'c.payment_type = e.id');
    if ($this->session_admin['id_usergroup'] != 1) {
        $this->db->where('d.sales_id', $id);
    }
      $this->db->order_by('a.id', 'desc');
      $q = $this->db->get()->result();
      return $q;
  }
}