<?php
class ContactList extends CI_Controller {
	public function index()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (isset($is_logged_in) && ($is_logged_in == true))
		{
			//$this->load->library('javascript'); //Initialize the validation
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('contactlist_view');
				$this->load->view('templates/footer');
		}
		else
		{
			redirect('login');
		}
	}

	public function getall()
	{
		$this->load->model('Login_Model'); 
		$contr_recs ['rows']= $this->Login_Model->getall();
		$usernm = $this->session->userdata('email');
		for ($i=0; $i < count($contr_recs['rows']); $i++) {
			if (($contr_recs['rows'][$i]->email)==$usernm) {
				$contr_recs['rows'][$i]->you = true;
			}
			else {
				$contr_recs['rows'][$i]->you = false;	
			}
		}
		$contr_recs = json_encode($contr_recs);
		print($contr_recs);
	}

	public function update()
	{	
		$obj = json_decode(file_get_contents('php://input'));
        $message = $obj->message;
		$item['lname']  = $message->lname;
		$item['fname']  = $message->fname;
		$item['tel']  = $message->tel;
		$item['email']  = $message->email;		
		$this->load->model('login_model');
		$this->login_model->update_data($item);
	
	}	

}
?>