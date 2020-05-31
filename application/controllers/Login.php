<?php
class Login extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->library(array('session','form_validation'));
}
function index(){
	$this->load->view('login/viewlogin.php');
	}
	
function cekuser() {
	$username = $this->input->post('username', true);
	$pass = $this->input->post('pass', true);
	$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s tidak boleh kosong'
	));
	$this->form_validation->set_rules('pass', 'Password', 'required', array('required' => '%s tidak boleh kosong'
	));
	if ($this->form_validation->run() == FALSE) 
	{$pesan = '<div class="alert alert-danger"><strong>' . validation_errors() . '</strong></div>';
	$this->session->set_flashdata('pesan', $pesan);
	redirect('login/index');
	} else {
	$sql = "SELECT * FROM admin WHERE id=? AND password= ?";
	$querycek = $this->db->query($sql, array($username, md5($pass)));
	if ($querycek->num_rows() > 0) {$row = $querycek->row_array();
	$simpan_session = array(
	'masuk' => true,
	'id' => $username,
	'nama' => $row['nama'],
	);
	$this->session->set_userdata($simpan_session);
	} else {
	$pesan = '<div class="alert alert-danger"><strong>User ID atau Password anda tidak benar</strong></div>';
	$this->session->set_flashdata('pesan', $pesan);
	redirect('login/index');
	}
}
if ($this->session->userdata('masuk') == true) {redirect('temp/index');
} else {
$this->keluar();
}
}
function keluar() {
$this->session->sess_destroy();
redirect('login/index');
	}	
     	
}	