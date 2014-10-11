<?php

class Model1 extends CI_Model{
	public function getProfile($para1){
		return array("fullname"=>"Marcus", "age"=>"34");
	}
}