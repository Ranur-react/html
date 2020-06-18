<?php
class Home extends CI_Controller {
public function __construct() {
parent::__construct();
}


public function index() {

	$template = array(
	'judul' => 'Beranda',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('Home/index', '', TRUE)
	 
	);
	$this->parser->parse('temp/temp', $template);


	}
}

?>