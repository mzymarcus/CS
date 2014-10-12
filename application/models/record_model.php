<?php
	class Record_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		public function each_stock($U_Name){
		   $query = "SELECT S_Name, SUM(Cost) AS S1 FROM record WHERE U_Name='$U_Name' GROUP BY S_Name ORDER BY S_Name";
		   $data['pair']=$this->db->query($query);
		   
		   return $data;
		}
		public function ratio($U_Name){
			$query1="SELECT SUM(Quantity) AS S1 FROM record WHERE U_Name='$U_Name'";
			$data['sum']=$this->db->query($query1);
			
			$query2="SELECT S_Name, SUM(Quantity) AS S2 FROM record WHERE U_Name='$U_Name' GROUP BY S_Name ORDER BY S_Name";
			$data['each']=$this->db->query($query2);
			
			return $data;
		}
	}
?>
