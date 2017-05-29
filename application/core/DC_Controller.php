<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DC_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // DEFAULT TIME ZONE
        date_default_timezone_set('Asia/Jakarta');
        
        // TABLE 
        $this->tbl_prefix = 'dc_';
        $this->tbl_static_content= $this->tbl_prefix . 'static_content';
        $this->tbl_user= $this->tbl_prefix . 'user';
        $this->tbl_menu= $this->tbl_prefix . 'menu';
        $this->tbl_icons= $this->tbl_prefix . 'icons';
        $this->tbl_user_groups= $this->tbl_prefix . 'user_groups';
        $this->tbl_groups= $this->tbl_prefix . 'groups';
        $this->tbl_user_accsess= $this->tbl_prefix . 'menu_accsess';
        $this->tbl_appearance= $this->tbl_prefix . 'appearance';
        $this->tbl_unit= $this->tbl_prefix . 'unit';
        $this->tbl_unit_album= $this->tbl_prefix . 'unit_album';
        $this->tbl_area= $this->tbl_prefix . 'area';
        $this->tbl_area_album= $this->tbl_prefix . 'area_album';
        $this->tbl_unit_type= $this->tbl_prefix . 'unit_type';

        $this->tbl_customer= $this->tbl_prefix . 'customer';
        $this->tbl_customer_album= $this->tbl_prefix . 'customer_album';

        //load model fo all page
        $this->load->model('model_basic');

        //apperance function for all
        $this->appearance=select_where($this->tbl_appearance,'id',1)->row();
         
    }

    function name_method($method){
        if($method!='index'){
            echo str_replace('_', ' ', $method);
        }
    }

    function check_login(){
        if($this->session->userdata('admin') == FALSE){
            redirect('admin/login');
        }
        else{
            return true;
        }
    }

    function get_menu(){
        if($this->session->userdata('admin')){
            $user_groups=$this->session->userdata['admin']['user_group'];
        }else{
            $user_groups=0;
        }
       $data=$this->model_basic->get_menu($user_groups);
       return $data;
    }


    function check_access(){
        if($this->session->userdata('admin')){
            $user_groups=$this->session->userdata['admin']['user_group'];
        }else{
            $user_groups=0;
        }
        $data=$this->model_basic->get_menu_access($user_groups);
        foreach ($data as $key) {
            $form=$key->target.'_form';
            if($key->target==$this->uri->segment(2) or $key->target==$this->uri->segment(1) or $form==$this->uri->segment(2)){
                redirect('admin/404');
            }
        }
    }

    

}
