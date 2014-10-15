<?php
	class Record_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		public function each_stock($U_Name){
		   $query = "SELECT S_Name, SUM(Cost) FROM record WHERE U_Name='$U_Name' GROUP BY S_Name";
		   $result=$this->db->query($query);
		   $result1=$result->row();
		   $data['S_Name']=$result1->S_Name;
		   $data['SUM(Cost)']=$result1->SUM(Cost);
		   return $data;
		}
		public function ratio($U_Name){
			$query1="SELECT SUM(Quantity) FROM record WHERE U_Name='$U_Name'";
			$sum=$this->db->query($query1);
			$query2="SELECT S_Name, SUM(Quantity) FROM record WHERE U_Name='$U_Name' GROUP BY S_Name";
			$ratio=$this->db->query($query2);
			$row=$ratio->num_rows();
		}
	}
?>
