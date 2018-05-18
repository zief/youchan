<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class user extends CI_Controller {
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
		$this->load->helper("cekpoin");

	if(isset($this->session->userdata['logged_in'])){
		
	}
	else{
			
		redirect('user/login','refresh');
			
	}

		$username	=	($this->session->userdata['logged_in']['username']);
		$email		=	($this->session->userdata['logged_in']['email']);
		$id			=	($this->session->userdata['logged_in']['iduser']);
		
		
		$data=array();
			$data["username"]	=	$username;
			$data["email"]		=	$email;
			$data["id"]			=	$id;

		
		
		$data["content"]="Hello Amikom";
		//$username = ($this->session->userdata['logged_in']['username']);
		$poin = cekPoin($id);
				$data["poin"] = $poin;

		$this->load->view('template',$data);
				

	}

	

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	if(isset($this->session->userdata['logged_in'])){
		if(($this->session->userdata['logged_in']['level'])==1){
				redirect('admin','refresh');
		}
		else
		{
				redirect('user','refresh');
			//$this->load->view('template');
		}

	}
	


	if ($this->form_validation->run() == FALSE) {

		if($this->session->userdata('log_in') != False){

			redirect('user','refresh');
			//$this->load->view('template');

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
					'iduser' => $result[0]->id,
					'username' => $result[0]->username,
					'email' => $result[0]->email,
					'level' => $result[0]->level,
					);
			
			// Add user data in session
			$this->session->set_userdata('logged_in', $session_data);

			
			//data yg dikirim ke view
			$data=array();
			$data["username"]	=	($this->session->userdata['logged_in']['username']);
			$data["email"]		=	($this->session->userdata['logged_in']['email']);
			$data["id"]			=	($this->session->userdata['logged_in']['iduser']);


			$this->load->view('template',$data);
			redirect('user_authentication/cek_level','refresh');
		
			}

		} else {

			$data = array(
			'error_message' => 'Invalid Username or Password'
			);

		$this->load->view('login_form', $data);

		}
	
	}
		
	}

	public function home(){
		$this->load->helper("html");
		$this->load->helper("form");
		$this->load->library("table");
		$this->load->library('session');
		$this->load->helper('cekpoin');
		$this->load->helper("ythumbnail");

		$this->load->model("Modelyouchan");


		$username	=	($this->session->userdata['logged_in']['username']);
		$email		=	($this->session->userdata['logged_in']['email']);
		$id			=	($this->session->userdata['logged_in']['iduser']);

		$hasil = $this->Modelyouchan->tonton_video($id);

		$data =array();
    	
    	$data["content"] = "Halo ".$username."..!!! Apa kabarmu hari ini?";

    	$data["username"]	=	$username;
		$data["email"]		=	$email;
		$data["id"]			=	$id;


		$data["video"]	= $hasil;	

		$string = $this->load->view("lihat_video",$data , TRUE);
		$data['content']=$string;

		$poin = cekPoin($id);
				$data["poin"] = $poin;

		$this->load->view("template",$data);


	}

	public function tonton(){
		$this->load->helper("html");
		$this->load->helper("form");
		$this->load->library("table");
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->helper('cekpoin');
		
		//koneksi ke database
		//konek ke modelyouchan
		$this->load->model("Modelyouchan");

		//$this->load->view('nonton_video');

		$username	=	($this->session->userdata['logged_in']['username']);
		$email		=	($this->session->userdata['logged_in']['email']);
		$id			=	($this->session->userdata['logged_in']['iduser']);

		//$data['content']= $this->Modelyouchan->tonton_video($id);
		
		$hasil = $this->Modelyouchan->tonton_video($id);

		$data =array();
    	
    	$data["content"] = "Ayo tonton video dan share videomu..!!";

    	$data["username"]	=	$username;
		$data["email"]		=	$email;
		$data["id"]			=	$id;
    	 
		
		$data["video"]	= $hasil;	

		$string = $this->load->view("nonton_video",$data , TRUE);
		$data['content']=$string;

		$poin = cekPoin($id);
				$data["poin"] = $poin;

		$this->load->view("template",$data);
		
	}
	

}

/* End of file situs.php */
/* Location: ./application/controllers/situs.php */