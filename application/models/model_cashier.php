<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_cashier extends CI_model {
	
	public function __construct() {
		parent::__construct();
	}
	
	function payment_index()
	{
		$this->db->select('a.id as id, d.no_kontrak, c.title as payment_title, a.nominal, a.date_created, a.is_delete')
				 ->from($this->tbl_pemasukan_record.' as a')
                 ->join($this->tbl_kontrak_payment_record.' as b', 'a.kontrak_payment_record_id = b.id')
                 ->join($this->tbl_kontrak_payment_schedule.' as c', 'b.kontrak_payment_schedule_id = c.id')
                 ->join($this->tbl_kontrak.' as d' , 'c.kontrak_id = d.id')
                 ->join($this->tbl_payment_type.' as e', 'c.payment_type = e.id');
        $this->db->order_by('a.id', 'desc');
		$q = $this->db->get()->result();
        return $q;
	}

	function load_kontrak($id)
	{
		$this->db->select('a.nominal,a.no_invoice, a.date_created, d.id AS kontrak_id, d.no_kontrak, c.id AS kontrak_payment_schedule_id, d.customer_id, b.id as kontrak_payment_record_id, c.title as payment_type')
				 ->from($this->tbl_pemasukan_record.' as a')
                 ->join($this->tbl_kontrak_payment_record.' as b', 'a.kontrak_payment_record_id = b.id')
                 ->join($this->tbl_kontrak_payment_schedule.' as c', 'b.kontrak_payment_schedule_id = c.id')
                 ->join($this->tbl_kontrak.' as d' , 'c.kontrak_id = d.id')
                 ->join($this->tbl_payment_type.' as e', 'c.payment_type = e.id');
        $this->db->where('a.id', $id);
        $q = $this->db->get()->row();
        return $q;
	}

	function sum_cicilan($kontrak_id) {
		$this->db->select_sum('nominal_paid');
		$this->db->from($this->tbl_kontrak_payment_schedule);
		$this->db->where('kontrak_id', $kontrak_id);

		return $this->db->get()->row()->nominal_paid;
	}
}