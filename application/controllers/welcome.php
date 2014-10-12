<?php
/***************************************************************************
* w3programmers.com
***************************************************************************/
class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model(array('CI_auth', 'CI_menu'));
	}
	
	function index()
	{
		$data = array(
			'menu_top' => $this->CI_menu->menu_top(),
		);
		$this->load->view('welcome_message', $data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */