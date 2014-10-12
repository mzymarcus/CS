<?php

class Filename extends CI_controller{
	public function first ($para1, $para2="Marcus"){
		$this->load->model("model1");
		$profile=$this->model1->getProfile("Wo");
		
		//print_r($profile);
		
		$data1=array("data"=>$para1);
		$data1['profile']=$profile;
		$this->load->view('header', $data1);
		echo "Finished";
	}
}