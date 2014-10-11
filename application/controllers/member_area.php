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





    function realtime(){
        $this->load->view('stocks_realtime');
        $this->load->view('stocks_buy');
    }


    public function instruments(){
        $ric1 = array("ric" => "0002.HK", "name" => "CHEUNG KONG HOLDINGS LTD", "closePrice" => 135.2, "livePrice" => rand(5, 15));
        $ric2 = array("ric" => "0003.HK", "name" => "KONG HOLDINGS LTD", "closePrice" => 35.2, "livePrice" => rand(15, 35));
        $arr = array($ric1, $ric2);    
        //add the header here
        header('Content-Type: application/json');
        echo json_encode( $arr );
    }

    public function instrument(){
        $arr = array("ric" => "0002.HK", "name" => "CHEUNG KONG HOLDINGS LTD", "closePrice" => 135.2, "livePrice" => rand(5, 15));    
        //add the header here
        header('Content-Type: application/json');
        echo json_encode( $arr );
    }

    
}