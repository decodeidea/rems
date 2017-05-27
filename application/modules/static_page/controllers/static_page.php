<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class static_page extends DC_controller {

	function __construct() {
		parent::__construct();
		if($this->router->fetch_method()=='index'){
			$method='';
		}else{
			$method=str_replace('_',' ',$this->router->fetch_method());
		}
		$this->controller_attr = array('controller' => 'static_page','controller_name' => $this->uri->segment('1'),'method'=>ucwords($method));
	}
	
	 function index(){
		$this->main(1);
	}
	
	function main($id){
		$data = $this->controller_attr;
		$data['function']='detail';
		
		//custom
        $data['data']=select_where($this->tbl_static_content,'id',$id)->row();
		$data['page'] = $this->load->view('static_page/index',$data,true);
		$this->load->view('layout_frontend',$data);
	}
}

