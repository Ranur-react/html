<?php
class Konfigurasi_IP extends CI_Controller {
public function __construct() {
parent::__construct();
// $this->load->model('Modelkonfigurasi','k');
}


public function index() {

	$template = array(
	'judul' => 'Data Konfigurasi IP Address',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('Konfigurasi/index', '', TRUE),
	);
	$this->parser->parse('temp/temp', $template);


}

}