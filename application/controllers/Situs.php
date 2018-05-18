<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Situs extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper("cekpoin");
		

	}
	
	public function index()
	{	
		
		
		$this->load->view('home');


	}

	public function login(){
		$this->load->view('login_form');
		
	}

	public function adminlogin(){
		$this->load->view('login_formadmin');
		
	}

	public function registrasi() {
	$this->load->view('registration_form');
	}

	public function faq(){
		// $this->load->view('faqs');

		$username	=	($this->session->userdata['logged_in']['username']);
		$email		=	($this->session->userdata['logged_in']['email']);
		$id			=	($this->session->userdata['logged_in']['iduser']);


		$data = array();

		$data["username"]	=	$username;
		$data["email"]		=	$email;
		$data["id"]			=	$id	;



		$string = $this->load->view("faqs",$data, TRUE);
		$data['content']=$string;

		$poin = cekPoin($id);
				$data["poin"] = $poin;

		$this->load->view("template",$data);
	}


	

}

/* End of file situs.php */
/* Location: ./application/controllers/situs.php */