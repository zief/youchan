<?php

session_start(); //we need to start session in order to access it through CI

Class User_authentication extends CI_Controller {

public function __construct() {
	parent::__construct();

	// Load form helper library
	$this->load->helper('form');

	$this->load->helper('security');
	// Load form validation library
	$this->load->library('form_validation');

	// Load session library
	$this->load->library('session');
	$this->load->driver('session');

	// Load database
	$this->load->database();
	$this->load->model('login_database');
	// $this->load->library('Nativesession');

}

	// Show login page
public function index() {
	$this->load->view('login_form');
}

public function admin(){
	$this->load->view('login_formadmin');	
}


// Show registration page
public function user_registration_show() {
	$this->load->view('registration_form');
}

// Validate and store registration data in database
public function new_user_registration() {

	// Check validation for user input in SignUp form
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	
	if ($this->form_validation->run() == FALSE) {
		
		$this->load->view('registration_form');
	
	} else {
	
		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email_value'),
			'password' => $this->input->post('password'),
			'level' => '2'
		);

		$result = $this->login_database->registration_insert($data);
	
		if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$this->load->view('login_form', $data);

		} else {

			$data['message_display'] = 'Username already exist!';
			$this->load->view('registration_form', $data);
		}
	}
}

// Check for user login process
public function user_login_process() {

	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	if ($this->form_validation->run() == FALSE) {

		if(isset($this->session->userdata['logged_in'])){

			redirect('user','refresh');
			// $this->load->view('template');

		}else{
			$this->load->view('login_form');
		}

	} else {

		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password')
		);

		$result = $this->login_database->login($data);
		
		if ($result == TRUE) {

			$username = $this->input->post('username');
			$result = $this->login_database->read_user_information($username);
		
			if ($result != false) {
					
					$session_data = array(
					'log_in' => TRUE,
					'iduser' => $result[0]->iduser,
					'username' => $result[0]->user_name,
					'email' => $result[0]->user_email,
					);
			
			// Add user data in session
			$this->session->set_userdata($session_data);

			
			// $this->Nativesession->set('iduser', $iduser);

			// tempat redirect setelah login
			$data=array();
			$data["username"]	=	($this->session->userdata['logged_in']['username']);
			$data["email"]		=	($this->session->userdata['logged_in']['email']);
			$data["id"]			=	($this->session->userdata['logged_in']['iduser']);



			$this->load->view('template',$data);
			// redirect('user','refresh');
			}

		} else {

			$data = array(
			'error_message' => 'Invalid Username or Password'
			);

		$this->load->view('login_form', $data);
		}
	}
}

public function admin_login_process(){

	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	if ($this->form_validation->run() == FALSE) {
		if(isset($this->session->userdata['logged_in'])){
		$this->load->view('templateadmin');
		}else{
		$this->load->view('login_formadmin');
		}
	} else {
	$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);

	$result = $this->login_database->loginadmin($data);

		if ($result == TRUE) {

			$username = $this->input->post('username');
			$result = $this->login_database->read_user_information($username);
	
			if ($result != false) {
				$session_data = array(
				'username' => $result[0]->user_name,
				'email' => $result[0]->user_email,
				);
	
			// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);
			// tempat redirect setelah login
			$data["username"]=$username;
			$data["iduser"]=$iduser;

			header("location: ".base_url()."Admin");
			}

		} else {
	
			$data = array(
				'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('login_formadmin', $data);
		}
	}
}



// Logout from admin page
public function logout() {

	// Removing session data
	$sess_array = array(
	'username' => '',
	'email'	=> '',
	'id' => ''
	);

	$this->session->unset_userdata('logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('login_form', $data);

	// $this->Nativesession->delete('iduser');
}

public function cek_level(){
	if(isset($this->session->userdata['logged_in'])){
		if(($this->session->userdata['logged_in']['level'])==1){
			redirect('admin','refresh');
		}
		else{
			redirect('user','refresh');
		}

	}else{
		redirect('user/login','refresh');
	}
}

}

?>