<?php

session_start();
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    // Load session library
    $this->load->library('session');

    // Load database
    $this->load->database();
        $this->load->model('login_database');
        $this->load->model('modelyouchan');
    }

    public function index()
    {
        $this->load->model('modelyouchan');
        $this->load->helper('cekpoin');
        if (isset($this->session->userdata['logged_in'])) {
        } else {
            redirect('situs', 'refresh');
        }

        if (($this->session->userdata['logged_in']['level']) == 1) {
            $data = array();
            $data['username'] = ($this->session->userdata['logged_in']['username']);
            $data['email'] = ($this->session->userdata['logged_in']['email']);
            $data['id'] = ($this->session->userdata['logged_in']['iduser']);

            $data['content'] = 'Hello Amikom';
            //$username = ($this->session->userdata['logged_in']['username']);
            $this->load->view('templateadmin', $data);
        } else {
            $data = array();
            $data['username'] = ($this->session->userdata['logged_in']['username']);
            $data['email'] = ($this->session->userdata['logged_in']['email']);
            $data['id'] = ($this->session->userdata['logged_in']['iduser']);

            $data['content'] = 'Hello Amikom';
            $id = ($this->session->userdata['logged_in']['iduser']);

                //poin
                $poin = cekPoin($id);
            $data['poin'] = $poin;

                // if($result != false){
                // 	$poin = intval($result[0]->jmlpoint);
                // }
                // //poin esih eror
                // $data["poin"] = $poin;

            //$username = ($this->session->userdata['logged_in']['username']);
            $this->load->view('template', $data);
        }
    }

    public function manageuser()
    {

        //load library dan helper yg di butuhkan
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->helper('cekpoin');

        //koneksi ke database
        //konek ke modelyouchan
        $this->load->model('Modelyouchan');

        $username = ($this->session->userdata['logged_in']['username']);

        $config = array();
        $config['base_url'] = base_url().'Dashboard/video';
        $config['total_rows'] = $this->Modelyouchan->count_user();
        $config['per_page'] = 10;

        $config['full_tag_open'] = "<ul class ='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'> <li class='active'><a href = '#'>";
        $config['cur_tag_close'] = "<span class = 'sr-only'></span></a></li>";
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data = array();
        $data['username'] = $username;

        $data['user'] = $this->Modelyouchan->fetch_user($config['per_page'], $this->uri->segment(3));

        //data['links'] = $this->pagination->create_links();

        //view yang dipanggil adalh v_managevideo
        //v_managevideo dimasukan kedalam string
        $string = $this->load->view('V_manageuser', $data, true);
        $data['content'] = $string;
        $this->load->view('templateadmin', $data);
        // $this->load->view("V_manageuser",$data);
    }

    public function video()
    {
        //load library dan helper yg di butuhkan
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->library('table');
        $this->load->library('pagination');
        $this->load->library('session');

        //koneksi ke database
        //konek ke modelyouchan
        $this->load->model('Modelyouchan');

        $id = $this->uri->segment(3);

        $config = array();
        $config['base_url'] = base_url().'Dashboard/video';
        $config['total_rows'] = $this->Modelyouchan->cek_video($id);
        $config['per_page'] = 25;

        $config['full_tag_open'] = "<ul class ='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'> <li class='active'><a href = '#'>";
        $config['cur_tag_close'] = "<span class = 'sr-only'></span></a></li>";
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['video'] = $this->Modelyouchan->fetch_video($config['per_page'], $this->uri->segment(3), $id);

        //data['links'] = $this->pagination->create_links();

        //view yang dipanggil adalh v_managevideo
        //v_managevideo dimasukan kedalam string
        $string = $this->load->view('Video_admin', $data, true);
        $data['content'] = $string;
        $this->load->view('templateadmin', $data);
    }

    public function addpoin()
    {
        $username = ($this->session->userdata['logged_in']['username']);
        $email = ($this->session->userdata['logged_in']['email']);
        $id = ($this->session->userdata['logged_in']['iduser']);

        $this->load->model('modelyouchan');
        //$data['product']		= $this->modelyouchan->linkvideo($id)->row_array();

        // $data["id"] = $id;
        $data['judul'] = 'Form Add Poin';
        $data['tempat_submit'] = 'Dashboard/tambah_poin';
        $data['status'] = '+';
        $this->load->view('edit_poin', $data);

        // $data =array();
        // $string = $this->load->view("addpoin", $data , TRUE);
        // $data['content']=$string;

        // $data["id"] = $id;
        // $data["email"] = $email;
        // $data["username"] = $username;

        // $this->load->view("template",$data);
    }

    public function tambah_poin()
    {
        $this->load->model('modelyouchan');

        $id = $this->input->post('iduser');

        $poin = $this->modelyouchan->cek_poin($id);
        $p = intval($poin);

        $tempPoin = intval($this->input->post('poin'));

        $jumpoin = $p + $tempPoin;

        $this->modelyouchan->update_poin($jumpoin, $id);

        redirect('Dashboard/manageuser');
    }

    public function deletepoin()
    {
        $this->load->model('modelyouchan');

        $data['judul'] = 'Form Kurangi Poin';
        $data['tempat_submit'] = 'Dashboard/kurang_poin';
        $data['status'] = '-';
        $this->load->view('edit_poin', $data);
    }

    public function kurang_poin()
    {
        $this->load->model('modelyouchan');

        $id = $this->input->post('iduser');

        $poin = $this->modelyouchan->cek_poin($id);
        $p = intval($poin);

        $tempPoin = intval($this->input->post('poin'));

        $jumpoin = $p - $tempPoin;

        $this->modelyouchan->update_poin($jumpoin, $id);

        redirect('Dashboard/manageuser');
    }
}
