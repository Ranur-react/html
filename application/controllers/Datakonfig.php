<?php
class Datakonfig extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('Modelkonfigurasi','k');
}

public function edit(){
$id = $this->uri->segment(3);
$qambildata = $this->k->ambildata($id);
	if($qambildata->num_rows()>0){
		$get=$qambildata->row_array();
		$data=array(
		'data'=>$get,
		);
		$data['ip_server']=$this->k->konfig_ip_edit($get['ip_server'])->result_array();
	} else {
	exit('Maaf Data Tidak Ditemukan');
	}

$template=array(
'judul' => 'Data Konfigurasi IP',
'menu' => $this->load->view('temp/menu', '', TRUE),
'isi' => $this->load->view('Datakonfig/formedit', $data, TRUE),
);
$this->parser->parse('temp/temp', $template);

}
public function update(){
	$param = $this->input->post(null, TRUE);
	$qupdate=$this->k->updatedata($param);
	if($qupdate){
		$pesanu='<div class="alert alert-success"><strong>Data Berhasil Di Update </strong></div>';
		$this->session->set_flashdata('pesan',$pesanu);
		redirect('Datakonfig');
	}
}
//===============
public function hapus(){
$id=$this->uri->segment(3);
$qambildata=$this->k->ambildata($id);
if($qambildata->num_rows() > 0 ){
	$this->k->hapusdata($id);
	$pesansukses = '<div class="alert alert-success">'
	.'<strong>Data Dengan Kode : ' .$id . ' Berhasil Dihapus</strong>'
	.'</div>';
	$this->session->set_flashdata('pesan',$pesansukses);
	redirect('Datakonfig/index');}
	else {
	exit('Maaf Data Tidak Di Temukan');}

}
public function index() {
$tcari=$this->input->post('tombolcari',TRUE);
if(isset($tcari)){
	$cari = $this->input->post('cari',TRUE);
	$this->session->set_userdata('ckategori',$cari);
	redirect('Datakonfig/index');
}
else{
	$cari = $this->session->userdata('ckategori');
}
$querymahasiswa = $this->k->konfigurasiip($cari);
//Ini Konfigurasi Pagination
$this->load->library('pagination');
$config['base_url'] = site_url('Datakonfig/index/');
$config['total_rows'] = $querymahasiswa->num_rows();
$config['per_page'] = '5';
$config['next_link'] = 'Next';
$config['prev_link'] = 'Previous';
$config['first_link'] = 'Awal';
$config['last_link'] = 'Akhir';
$config['uri_segment'] = 3;
//Custom Pagination
$config['attributes']['rel'] = false;
$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
$config['full_tag_close'] = '</ul></nav>';
$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="page-item disabled"><li class="page-item active"><a class="page-link" href="#">';
$config['cur_tag_close'] = '</a></li>';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';
//custom pagination
$this->pagination->initialize($config);
$uri = $this->uri->segment(3);
$per_page = $config['per_page'];
$querymahasiswa_perpage = $this->k->konfigurasiip_perpage($cari, $per_page, $uri);
$data = array(
'tampil' => $querymahasiswa_perpage,
'cari'=>$cari
);
	$template = array(
	'judul' => 'Data Konfigurasi IP Address',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('konfigurasiip/viewdata', $data, TRUE),
	);
	$this->parser->parse('temp/temp', $template);
}

public function tambah() {
	
	// $data['ip_server']=$this->k()->result_array();
	$template = array(
	'judul' => 'Konfigurasi IP Address',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('konfigurasiip/formtambah', '', TRUE),
	);
	$this->parser->parse('temp/temp', $template);
}
//================================================================================
public function simpandata() {
			$params = $this->input->post(null, TRUE);
	
			$this->form_validation->set_rules('id', 'IP Server', 'required', array(
			'required' => '%s tidak boleh kosong'
			));
			$this->form_validation->set_rules('nama', 'Network', 'required', array(
			'required' => '%s tidak boleh kosong'
			));
			$this->form_validation->set_rules('password', 'Netmask', 'required', array(
			'required' => '%s tidak boleh kosong'
			));
if ($this->form_validation->run() == FALSE) {
	$pesanerror = '<div class="alert alert-danger"><strong>' . validation_errors() . '</strong></div>';
		$this->session->set_flashdata('pesan', $pesanerror);
		redirect('Datakonfig/tambah');
} else {
		
		$querysimpandata = $this->k->simpandata($params);

		if ($querysimpandata) {
			$pesansukes = '<div class="alert alert-success"><strong>Data akses berhasil disimpan</strong></div>';
			$this->session->set_flashdata('pesan', $pesansukes);
			redirect('Datakonfig/tambah');
		}
}
}
//====================================================================================================


}

?>