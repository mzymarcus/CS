<?php

class Login extends CI_Controller {

	function __construct()
	{
	    parent::__construct();	
            $this->load->library(array('session', 'form_validation'));
            $this->load->model(array('CI_auth', 'CI_menu'));
            $this->load->helper(array('html','form', 'url'));
	}
        
        function index(){
		if($this->CI_auth->check_logged()=== true)
			redirect(base_url().'index.php/member_area/');
			
		$sub_data['login_failed'] ='';
		$data['title'] = 'Login';
		$data['menu_top'] = $this->CI_menu->menu_top();
		$data['body'] = $this->load->view('_login_form',$sub_data, true);
		
		if($this->input->post('submit_login')) {
			$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[35]|xss_clean');
			$this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>');
			
			if ($this->form_validation->run() == FALSE){
				$data['body'] = $this->load->view('_login_form',$sub_data , true);
				$this->load->view('_output_html', $data);
			}
			else{
				$login_array = array($this->input->post('username'), $this->input->post('password'));
				if($this->CI_auth->process_login($login_array))
				{
					//login successfull
					$this->session->set_userdata('user_input1', $this->input->post('username'));
					redirect(base_url().'index.php/member_area/');
				}
				else{
					$sub_data['login_failed'] = "Invalid username or password";
					$data['body'] = $this->load->view('_login_form',$sub_data , true);
					$this->load->view('_output_html', $data);
				}
			}
		}
		else{
			$this->load->view('_output_html', $data);
		}
        }
        function logout(){
            $this->session->sess_destroy();
	    redirect(base_url().'index.php/login/');
        }
}
?>