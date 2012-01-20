<?php
class Login extends CI_Controller {
		
	public function index() {
		if($this->session->userdata('loggedIn') == false) {
			$data['action'] = $this->session->userdata('action');
			$data['title'] = "WowGuildProgressTracker - Login";
			$data['header'] = "Login";
			$data['error'] = NULL;
			$this->load->view("Header/header", $data);			
			$this->load->view("Login/index", $data);
		} else {
			$this->load->view("Logout/index.html");
		}
	}
	
	public function sha() {
		echo sha1('password2');
	}

	public function authenticate() {
		$login = $this->input->post('login');
		$password = $this->input->post('password');
		if(empty($login) || empty($password)) {
			$data['action'] = $this->session->userdata('action');
			$data['title'] = "WowGuildProgressTracker - Login";
			$data['header'] = "Login";	
			$data['error'] = "Login or password isn't right";
			$this->load->view("Header/header", $data);			
			$this->load->view("Login/index", $data);
		} else {
			$this->load->model('LoginModel');
			$password = mysql_real_escape_string($password);
			$password = sha1($password);
			$login = mysql_real_escape_string($login);
			$data['result'] = $this->LoginModel->checkUser($login,$password);
			if(empty($data['result'])) {
				$data['action'] = $this->session->userdata('action');
				$data['title'] = "WowGuildProgressTracker - Login";
				$data['header'] = "Login";	
				$data['error'] = "Login or password isn't right";
				$this->load->view("Header/header", $data);			
				$this->load->view("Login/index", $data);
			} else {	
				$this->MY_Session->set_userdata('action','Login');
				$this->MY_Session->set_userdata('org',$data['result'][0]->org);
				$this->MY_Session->set_userdata('isadmin',$data['result'][0]->isadmin);
				$this->MY_Session->set_userdata('loggedIn',TRUE);
				header("location: ".base_url()."Organisations/MyOrganisation");
			}
		}
	}
}
?>