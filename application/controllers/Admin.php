<?php 
session_start();
class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		$this->load->helper('security');
		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');
	

		// Load database
		$this->load->database();
		$this->load->model('login_database');
	

	}
	
	public function index()
	{	
	if(isset($this->session->userdata['logged_in'])){
			

		}else{
			redirect('admin/login','refresh');
			// $this->load->view('login_form');
		}

		
		if(($this->session->userdata['logged_in']['level'])==1){
				$data=array();
				$data["username"]	=	($this->session->userdata['logged_in']['username']);
				$data["email"]		=	($this->session->userdata['logged_in']['email']);
				$data["id"]			=	($this->session->userdata['logged_in']['iduser']);

		
		
			$data["content"]="Hello Amikom";
			//$username = ($this->session->userdata['logged_in']['username']);
			$this->load->view('templateadmin',$data);
			}
			else {
				redirect('user','refresh');
			}

	}

	public function login(){
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				
				redirect('admin','refresh');
			
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
				$result = $this->login_database->read_admin_information($username);
	
				if ($result != false) {
					$session_data = array(
							'username' => $result[0]->user,
							'log_in' => TRUE
							);
	
					
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					
					//data yg dikirim ke view
					$data=array();
					$data["username"]	=	($this->session->userdata['logged_in']['username']);
			
					$this->load->view('templateadmin',$data);
				}

			} else {
	
			
				$data = array(
					'error_message' => 'Invalid Username or Password'
					);
				
				$this->load->view('login_formadmin', $data);
			}
		}
	}

	


}
