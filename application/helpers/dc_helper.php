<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_client_ip_server() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
	}

	function get_bln($date){
		$bln=substr($date, 5,2);
		$tgl=substr($date, 8,2);
		$thn=substr($date, 0,4);
		$monthNum = $bln;
 		$monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
 		$date=$monthName." ".$tgl.", ".$thn;
 		return $date;
	}

	function get_date($date){
		$yrdata= strtotime($date);
    	return date('D, d M Y ', $yrdata);
	}
	function get_name_admin($id){
		$CI =& get_instance();
   		$CI->load->database(); 
		$query=$CI->db->query("select * from ".$this->tbl_user." where id='".$id."'")->row();
		$name=$query->username;
		return $name;
	}
	function idr($angka){
		$angka ="IDR. ".number_format($angka,2,',','.');
		$duitnya=str_replace(",00", "", $angka);
		return $duitnya;
	
	}
	function persen($data1,$data2){
		$data=$data2*100/$data1;
		return $data;
	}

	function get_days_left($day){
		$date1 = new DateTime(substr($day,0,10)); 
  		$date2 = new DateTime(date('Y-m-d')); 
  		$diff = $date2->diff($date1)->format("%a"); 
  		$days = intval($diff);  
  		return $days;
	}

	function url($val){
		$a=str_replace(' ','-', $val);
		$b=str_replace(',','', $a);
		$c=str_replace('.','', $b);
		return $c;

	}
	function get_count($table){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		return $ci->db->get()->num_rows();
	}
	function select_all($table){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$data = $ci->db->get();
		return $data->result();
	}
	function select_where($table,$column,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
		$data = $ci->db->get();
		return $data;
	}

	function select_where_array_group($table,$where,$group_by){
        $ci=& get_instance();
		$ci->load->database('default',TRUE);       
        $ci->db->select('*');
        $ci->db->from($table);
        $ci->db->where($where);
        $ci->db->group_by($group_by);
        $ci->db->order_by($group_by,'DESC');
        $data = $ci->db->get();
        return $data;
    }

	function select_where_order($table,$column,$where,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
                $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get();
		return $data;
	}
	function select_all_order_row($table,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
                $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get();
		return $data->row();
	}
    function select_where_limit_order($table,$column,$where,$limit,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->where($column,$where);
                $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get($table,$limit);
		return $data;
	}

	function select_where_array_limit_order($table,$array,$limit,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->where($array);
        $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get($table,$limit);
		return $data;
	}

	function select_where_offset_limit_order($table,$column,$where,$offset,$limit,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->where($column,$where);
        $ci->db->order_by($order_by, $order_type);
		$ci->db->limit($offset, $limit);
		$data = $ci->db->get($table);
		return $data;
	}
	function select_where_array($table,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($where);
		$data = $ci->db->get();
		return $data;
	}
	function select_where_array_order($table,$where,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($where);
		$ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get();
		return $data;
	}

	function insert_all($table,$data) {
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		if(!$ci->db->insert($table,$data))
			return FALSE;
		$data["id"] = $ci->db->insert_id();
		return (object)$data;
	}
	function insert_all_batch($table,$data) {
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		if(!$ci->db->insert_batch($table,$data))
			return FALSE;
		$data["id"] = $ci->db->insert_id();
		return (object)$data;
	}
	function update($table,$data,$column,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->where($column,$where);
		return $ci->db->update($table,$data); 
	}
	function update_one($table,$column,$where,$target,$action){
		$ci->db->set($target, $target.$action, FALSE);
		$ci->db->where($column, $where);
		return $ci->db->update($table);
	}
	function delete($table,$column,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->where($column,$where);
		return $ci->db->delete($table);
	}
	function delete_where_array($table,$where){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->where($where);
		return $ci->db->delete($table);
	}
    function select_all_limit($table, $limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$data = $ci->db->get($table, $limit);
		return $data;
	}
        function select_all_limit_order($table, $limit, $order_by, $order){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
                $ci->db->order_by($order_by, $order);
		$data = $ci->db->get($table, $limit);
		return $data;
	}

    function select_all_order($table, $order_by, $order){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
        $ci->db->order_by($order_by, $order);
		$data = $ci->db->get();
		return $data->result();
	}
	function get_paging($table,$limit,$from,$order,$type) {
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->limit($limit,$from);
		$ci->db->order_by($order,$type);
		return $ci->db->get()->result();
	}
        
        function get_paging_where($table,$column,$where,$limit,$from,$order,$type) {
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->limit($limit,$from);
                $ci->db->where($column,$where);
		$ci->db->order_by($order,$type);
		return $ci->db->get()->result();
	}
        
        function select_all_limit_random($table, $limit){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
                $ci->db->order_by('id', 'RANDOM');
                $ci->db->limit($limit);
		$ci->db->from($table);
		$data = $ci->db->get();
		return $data->result();
	}
        
        function select_where_double_order($table,$column,$where,$column2,$where2,$order_by,$order_type){
		$ci=& get_instance();
		$ci->load->database('default',TRUE);
		$ci->db->select('*');
		$ci->db->from($table);
		$ci->db->where($column,$where);
                $ci->db->where($column2,$where2);
                $ci->db->order_by($order_by, $order_type);
		$data = $ci->db->get();
		return $data;
	}

if (!function_exists('GetAll')){
	function GetAll($tbl,$filter=array(),$filter_where_in=array())
	{
		$CI =& get_instance();
		foreach($filter as $key=> $value)
		{
			// Multiple Like
			if(is_array($value))
			{
				$key = str_replace(" =","",$key);
				$like="";
				$v=0;
				foreach($value as $r=> $s)
				{
					$v++;
					$exp = explode("/",$s);
					if(isset($exp[1]))
					{
						if($exp[0] == "like")
						{
							if($key == "tanggal" || $key == "tahun")
							{
								$key = "tanggal";
								if(strlen($exp[1]) == 4)
								{
									if($v == 1) $like .= $key." LIKE '%".$exp[1]."-%' ";
									else $like .= " OR ".$key." LIKE '%".$exp[1]."-%' ";
								}
								else
								{
									if($v == 1) $like .= $key." LIKE '%-".$exp[1]."-%' ";
									else $like .= " OR ".$key." LIKE '%-".$exp[1]."-%' ";
								}
							}
							else
							{
								if($v == 1) $like .= $key." LIKE '%".$exp[1]."%' ";
								else $like .= " OR ".$key." LIKE '%".$exp[1]."%' ";
							}
						}
					}
				}
				if($like) $CI->db->where("id > 0 AND ($like)");
				$exp[0]=$exp[1]="";
			}
			else $exp = explode("/",$value);

			if(isset($exp[1]))
			{
				if($exp[0] == "where") $CI->db->where($key, $exp[1]);
				else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
				else if($exp[0] == "or_like") $CI->db->or_like($key, $exp[1]);
				else if($exp[0] == "like_after") $CI->db->like($key, $exp[1], 'after');
				else if($exp[0] == "like_before") $CI->db->like($key, $exp[1], 'before');
				else if($exp[0] == "not_like") $CI->db->not_like($key, $exp[1]);
				else if($exp[0] == "not_like_after") $CI->db->not_like($key, $exp[1], 'after');
				else if($exp[0] == "not_like_before") $CI->db->not_like($key, $exp[1], 'before');
				else if($exp[0] == "wherebetween"){
					$xx=explode(',',$exp[1]);
					$CI->db->where($key.' >=',$xx[0]);
					$CI->db->where($key.' <=',$xx[1]);
				}
				else if($exp[0] == "order")
				{
					$key = str_replace("=","",$key);
					$CI->db->order_by($key, $exp[1]);
				}
				else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
			}
			else if($exp[0] == "where") $CI->db->where($key);

			if($exp[0] == "group") $CI->db->group_by($key);
		}

		foreach($filter_where_in as $key=> $value)
		{
			if(preg_match("/!=/", $key)) $CI->db->where_not_in(str_replace("!=","",$key), $value);
			else $CI->db->where_in($key, $value);
		}

		$q = $CI->db->get($tbl);
		//die($CI->db->last_query());

		return $q;
	}

	if (!function_exists('GetValue')){
		function GetValue($field,$table,$filter=array(),$order=NULL)
		{
			$CI =& get_instance();
			$CI->db->select($field);
			foreach($filter as $key=> $value)
			{
				$exp = explode("/",$value);
				if(isset($exp[1]))
				{
					if($exp[0] == "where") $CI->db->where($key, $exp[1]);
					else if($exp[0] == "like") $CI->db->like($key, $exp[1]);
					else if($exp[0] == "order") $CI->db->order_by($key, $exp[1]);
					else if($key == "limit") $CI->db->limit($exp[1], $exp[0]);
				}
				
				if($exp[0] == "group") $CI->db->group_by($key);
			}
			
			if($order) $CI->db->order_by($order);
			$q = $CI->db->get($table);
			foreach($q->result_array() as $r)
			{
				return $r[$field];
			}
			return 0;
		}
	}

	if (!function_exists('to_idr')){	
		function to_idr($data)
		{
			$result = 'Rp. ' . number_format($data, 0, '', '.');
	        return $result;
		}
	}

	function indonesian_date($date)
    {
        //die($date);
        $result = date('j F Y', strtotime($date));
        return $result;
    }

    if ( ! function_exists('indonesian_currency'))
	{
		function indonesian_currency($number){
			$result = 'Rp. ' . number_format($number, 0, '', '.');
	                return $result;
		}

		
	}

}
