<?php
class Temp extends CI_Controller{

public function __construct(){
	parent:: __construct();
	$this->load->library(array('session'));
	if($this->session->userdata('masuk') == TRUE){
		return true;
	}else{
		redirect ('login/index');
	}
}
public function index(){
$template = array (
'judul' => 'Beranda',
'menu'=>$this->load->view('temp/menu', '',TRUE),
'isi' => $this->load->view('temp/beranda', '', TRUE),

);

$this->parser->parse('temp/temp',$template);

}}?>