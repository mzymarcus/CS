<?php

class Member_area extends CI_Controller {
    function __construct()
    {
        parent::__construct();	
        $this->load->library(array('session'));
        $this->load->model(array('CI_auth', 'CI_menu'));
        $this->load->helper(array('html','url'));
    }
    
    function index(){
        if($this->CI_auth->check_logged()===FALSE)
            redirect(base_url().'index.php/login/');
        else{
            $data['title'] = 'Member only';
            $data['menu_top'] = $this->CI_menu->menu_top();
            $data['body'] = 'You are logged in MEMBER AREA <br/> <br/> <a href="'.base_url().'login/logout/"> Click here </ a> to logout';
            $this->load->view('_output_html', $data);
        }
    }
}