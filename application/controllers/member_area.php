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
            // $this->load->view('_output_html', $data);
			
            $data['name1']=$this->session->userdata('user_input1');
			
			$uname=$this->session->userdata('user_input1');
			
			$this->load->view('member_area', $data);
			$this->load->model('record_model');
			$this->record_model->ratio($uname);
			}
	}
	function buy(){
		if($_POST["sid"]){
			$data['sid']=$this->input->post("sid");
			$sdata=$this->input->post("sid");
			$data['price']=$this->input->post("price");
			$pdata=$this->input->post("price");
			$data['amount']=0 - $this->input->post("amount");
			$adata=0 - $this->input->post("amount");
			echo "ld";
			
			$cost=$data['amount'] * $data['price'];
			$uname=$this->session->userdata('user_input1');				
			$check_query1="SELECT `Allowance` FROM `users` WHERE `name`='$uname'";
			$query1=$this->db->query($check_query1);
			$row1=$query1->row();
			$new_cost=$row1->Allowance+$cost;
			$check_query2="UPDATE `users` SET `Allowance`='$new_cost' WHERE `name`='$uname'";
			$query2=$this->db->query($check_query2);
			$check_query3="INSERT INTO `record` (`U_Name`, `S_Name`, `Price`, `Quantity`, `Cost`) VALUES ('$uname', '$sdata', '$pdata', '$adata', '$cost')";
			$query3=$this->db->query($check_query3);
		}
	}
	function sell(){
		if($_POST["sid"]){
			$data['sid']=$this->input->post("sid");
			$data['price']=$this->input->post("price");
			$data['amount']=$this->input->post("amount");
			$cost=$data['amount'] * $data['price'];
			$uname=$this->session->userdata('user_input1');				
			$check_query1="SELECT `Allowance` FROM `users` WHERE `name`='$uname'";
			$query1=$this->db->query($check_query1);
			$row1=$query1->row();
			$new_cost=$row1->Allowance+$cost;
			$check_query2="UPDATE `users` SET `Allowance`='$new_cost' WHERE `name`='$uname'";
			$query2=$this->db->query($check_query2);
			$check_query3="UPDATE `record` SET `Cost`='$cost' WHERE `U_Name`='$uname'";
			$query3=$this->db->query($check_query3);
		}
	}
			




    function realtime(){
        $this->load->view('stocks_realtime');
        $this->load->view('stocks_buy');
    }


    public function instruments(){
        $ric1 = array("ric" => "0002.HK", "name" => "CHEUNG KONG HOLDINGS LTD", "closePrice" => 135.2, "livePrice" => rand(5, 15));
        $ric2 = array("ric" => "0003.HK", "name" => "KONG HOLDINGS LTD", "closePrice" => 35.2, "livePrice" => rand(15, 35));
        $ric2 = array("ric" => "0004.HK", "name" => "KONG asdf LTD", "closePrice" => 235.2, "livePrice" => rand(150, 165));
        $ric2 = array("ric" => "0005.HK", "name" => "KONG  LTD", "closePrice" => 345.2, "livePrice" => rand(150, 315));
        $ric2 = array("ric" => "0006.HK", "name" => "KONG HOLDINGS ", "closePrice" => 315.2, "livePrice" => rand(10, 15));
        
        $arr = array($ric1, $ric2);    
        echo json_encode( $arr );
    }

    public function instrument($ric){
        $arr = array("ric" => "0002.HK", "name" => "CHEUNG KONG HOLDINGS LTD", "closePrice" => 135.2, "livePrice" => rand(5, 15));    
        echo json_encode( $arr );
    }
}