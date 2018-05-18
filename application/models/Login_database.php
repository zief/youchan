<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "username =" . "'" . $data['username'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
if ($query->num_rows() == 0) {

// Query to insert data in database
$this->db->insert('user_login', $data);
//masukkan 100 poin ke user

//cek user yg tadi baru daftar
$condition = "username =" . "'" . $data['username'] . "'";
$this->db->select('id');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$row = $query->row();

$iduser = $row->id;

$data = array(
        'iduser' => $iduser,
        'jmlpoint' => '100'
);

$this->db->insert('poin', $data);


if ($this->db->affected_rows() > 0) {
return true;
}
} else {
return false;
}
}

// Read data using username and password
// public function login($username, $password) {
public function login($data) {
$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('user_login');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}


// $this->db->select('iduser, username, email, password');
// $this->db->from('user_login');
// $this->db->where($username);
// $this->db->where($password);
// $this->db->limit(1);

// $query = $this->db->get();

// if ($query->num_rows() == 1) {
// return true;
// } else {
// return false;
// }
}

public function loginadmin($data) {

$condition = "user =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
$this->db->select('*');
$this->db->from('admin');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();

if ($query->num_rows() == 1) {
return true;
} else {
return false;
}
}

public function get_user($name, $password){
	$query = $this->db;
}

// Read data from database to show data in admin page
	public function read_user_information($username) {

		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {	
			return $query->result();
		} else {
			return false;
		}
	}

	public function read_admin_information($username) {

		$condition = "user=" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {	
			return $query->result();
		} else {
			return false;
		}
	}

}

?>