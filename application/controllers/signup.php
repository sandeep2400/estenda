<?php
class Signup extends CI_Controller {
	public function index()
	{
		$this->load->library('form_validation'); //Initialize the validation

		$this->form_validation->set_rules('signup_fname', 'First Name', 'required|min_length[3]|max_length[50]|alpha_dash');
		$this->form_validation->set_rules('signup_lname', 'Last Name', 'required|min_length[3]|max_length[50]|alpha_dash');
		$this->form_validation->set_rules('signup_email', 'Email', 'required|min_length[3]|valid_email|is_unique[membership.email]');	
		$this->form_validation->set_rules('signup_tel', 'Tel', 'required|min_length[10]|max_length[15]|alpha_dash');
		$this->form_validation->set_rules('signup_pass', 'Password', 'required|min_length[3]|max_length[20]|alpha_dash');
		$this->form_validation->set_rules('signup_re_pass', 'Confirm-Password', 'required|min_length[3]|max_length[20]|alpha_dash|matches[signup_pass]');
		
		if ($this->form_validation->run() == FALSE) 
		{  
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('signup_view');
			$this->load->view('templates/footer');
		}	
		else
		{
			$signup['fname'] = $_POST['signup_fname'];
			$signup['lname'] = $_POST['signup_lname'];
			$signup['email'] = $_POST['signup_email'];
			$signup['tel'] = $_POST['signup_tel'];			
			$signup['password'] = $_POST['signup_pass'];

			$this->load->model('login_Model');
			$this->login_Model->write_data($signup);
			$newdata = array
						(   'email' => $signup['email'],
							'is_logged_in' => true
						);
			$this->session->set_userdata($newdata);
			redirect('contactlist');  
		}

	}	
}
?>