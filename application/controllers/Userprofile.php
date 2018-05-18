<?php

session_start();
class Userprofile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    // Load session library
    $this->load->library('session');

    // Load database
    $this->load->database();
        $this->load->model('login_database');
    }
    /*function Managevideo(){
        $this->load->helper("html");
        $this->load->helper("form");
        $this->load->library("table");

        //koneksi ke database
        //konek ke modelyouchan
        $this->load->model("Modelyouchan");
        $video			 = $this->Modelyouchan->konek_db();

        //hasil dimasukan ke result menggunakan fungsi result
        $data['video']	 = $this->Modelyouchan->konek_db()->result();

        //view yang dipanggil adalh v_managevideo
        //v_managevideo dimasukan kedalam string
        $string = $this->load->view("V_managevideo",$data, TRUE);
        $data['content']=$string;
        $this->load->view("template",$data);
    }*/

    public function Managevideo()
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
        $email = ($this->session->userdata['logged_in']['email']);
        $id = ($this->session->userdata['logged_in']['iduser']);

        $config = array();
        $config['base_url'] = base_url().'userprofile/managevideo';
        $config['total_rows'] = $this->Modelyouchan->count_video($id);
        $config['per_page'] = 5;

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
        $data['email'] = $email;
        $data['id'] = $id;

        $data['video'] = $this->Modelyouchan->fetch_video($config['per_page'], $this->uri->segment(3), $id);

        //data['links'] = $this->pagination->create_links();

        //view yang dipanggil adalh v_managevideo
        //v_managevideo dimasukan kedalam string
        $string = $this->load->view('V_managevideo', $data, true);
        $data['content'] = $string;

        $poin = cekPoin($id);
        $data['poin'] = $poin;

        $this->load->view('template', $data);
    }

    public function edit()
    {
        $this->load->model('modelyouchan');
        $idvideo = $this->uri->segment(3);
        $data['product'] = $this->modelyouchan->product($idvideo)->row_array();

        $this->load->view('edit_video', $data);
    }
    public function edit_simpan()
    {
        $id = ($this->session->userdata['logged_in']['iduser']);
        $idvideo = $this->input->post('idvideo');
        $video = array(
            'iduser' => $id,
            'idvideo' => $this->input->post('idvideo'),
            'linkvideo' => $this->input->post('linkvideo'), );
        $this->db->where('idvideo', $idvideo);
        $this->db->update('video', $video);
        redirect('userprofile/konek2');
    }
    public function konek2()
    {
        $this->load->model('modelyouchan');

        $data['userprofile'] = $this->modelyouchan->konek_db()->result();

        redirect('userprofile/managevideo');
    }
    public function input()
    {
        $username = ($this->session->userdata['logged_in']['username']);
        $email = ($this->session->userdata['logged_in']['email']);
        $id = ($this->session->userdata['logged_in']['iduser']);

        $this->load->model('modelyouchan');
        //$data['product']		= $this->modelyouchan->linkvideo($id)->row_array();

        // $this->load->view('input_video');

        $data = array();
        $string = $this->load->view('input_video', $data, true);
        $data['content'] = $string;

        $data['id'] = $id;
        $data['email'] = $email;
        $data['username'] = $username;

        $this->load->view('template', $data);
    }

    public function input_simpan()
    {
        //$kode = $this->input->post('idvideo');

        $id = ($this->session->userdata['logged_in']['iduser']);

        $datavideo = array(
            'iduser' => $id,
            'linkvideo' => $this->input->post('linkvideo'),
            'banned' => 'Tidak',
            );

        $this->db->insert('video', $datavideo);
        $this->db->where('iduser', $id);
        redirect('userprofile/konek2');
    }
    public function hapus($idvideo)
    {
        $this->load->model('delete_video');
        $where = array('idvideo' => $idvideo);
        $this->delete_video->hapus_data($where, 'video');
        redirect('userprofile/konek2');
    }

//untuk addpoin
    public function addpoin()
    {
    }

//untuk delete poin
    public function deletepoin()
    {
    }

// untuk lihat video user
    // function video(){
    // 	//load library dan helper yg di butuhkan
    // 	$this->load->helper("html");
    // 	$this->load->helper("form");
    // 	$this->load->library("table");
    // 	$this->load->library('pagination');
    // 	$this->load->library('session');

    // 	//koneksi ke database
    // 	//konek ke modelyouchan
    // 	$this->load->model("Modelyouchan");

    // 	$id = $this->uri->segment(3);

    // 	$config = array();
    // 	$config['base_url'] = base_url().'userprofile/video';
    // 	$config['total_rows'] = $this->Modelyouchan->cek_video($id);
    // 	$config['per_page'] = 25;

    // 	$config['full_tag_open'] = "<ul class ='pagination'>";
    // 	$config['full_tag_close'] = "</ul>";
    // 	$config['num_tag_open'] = '<li>';
    // 	$config['num_tag_close'] = '</li>';
    // 	$config['cur_tag_open'] = "<li class='disabled'> <li class='active'><a href = '#'>";
    // 	$config['cur_tag_close'] = "<span class = 'sr-only'></span></a></li>";
    // 	$config['next_tag_open'] = '<li>';
    // 	$config['next_tag_close'] = '</li>';
    // 	$config['prev_tag_open'] = '<li>';
    // 	$config['prev_tag_close'] = '</li>';
    // 	$config['first_tag_open'] = '<li>';
    // 	$config['first_tag_close'] = '</li>';
    // 	$config['last_tag_open'] = '<li>';
    // 	$config['last_tag_close'] = '</li>';

    // 	$this->pagination->initialize($config);

    // 	$data['video'] = $this->Modelyouchan->fetch_video($config['per_page'], $this->uri->segment(3), $id);

    // 	//data['links'] = $this->pagination->create_links();

    // 	//view yang dipanggil adalh v_managevideo
    // 	//v_managevideo dimasukan kedalam string
    // 	$string = $this->load->view("Video_admin",$data, TRUE);
    // 	$data['content']=$string;
    // 	$this->load->view("templateadmin",$data);
    // }

    public function banned()
    {
        $this->load->model('Modelyouchan');
        $idvideo = $this->uri->segment(3);

        $this->Modelyouchan->banned_video($idvideo);

        redirect('Dashboard/manageuser');
    }

    public function unbanned()
    {
        $this->load->model('Modelyouchan');
        $idvideo = $this->uri->segment(3);

        $this->Modelyouchan->unbanned_video($idvideo);

        redirect('Dashboard/manageuser');
    }

    public function delete()
    {
    }
}
