<?php
class Dataakses extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('Modelakses','k');
}

public function edit(){
$id = $this->uri->segment(3);
$qambildata = $this->k->ambildata($id);
	if($qambildata->num_rows()>0){
		$get=$qambildata->row_array();
		$data=array(
		'data'=>$get,
		);
		$data['level']=$this->k->level()->result_array();
		$data['ip']=$this->k->jatah_ip_edit($get['ip'])->result_array();
	} else {
	exit('Maaf Data Tidak Ditemukan');
	}

$template=array(
'judul' => 'Data Akses',
'menu' => $this->load->view('temp/menu', '', TRUE),
'isi' => $this->load->view('dataakses/formedit', $data, TRUE),
);
$this->parser->parse('temp/temp', $template);

}
public function update(){
	$param = $this->input->post(null, TRUE);
	$qupdate=$this->k->updatedata($param);
	if($qupdate){
		$pesanu='<div class="alert alert-success"><strong>Data Berhasil Di Update </strong></div>';
		$this->session->set_flashdata('pesan',$pesanu);
		redirect('dataakses');
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
	redirect('dataakses/index');}
	else {
	exit('Maaf Data Tidak Di Temukan');}

}
public function index() {
$tcari=$this->input->post('tombolcari',TRUE);
if(isset($tcari)){
	$cari = $this->input->post('cari',TRUE);
	$this->session->set_userdata('ckategori',$cari);
	redirect('dataakses/index');
}
else{
	$cari = $this->session->userdata('ckategori');
}
$qry = $this->k->dataakses($cari);
//Ini Konfigurasi Pagination
$this->load->library('pagination');
$config['base_url'] = site_url('dataakses/index/');
$config['total_rows'] = $qry->num_rows();
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
$querymahasiswa_perpage = $this->k->dataakses_perpage($cari, $per_page, $uri);
$data = array(
'tampil' => $querymahasiswa_perpage,
'cari'=>$cari
);
	$template = array(
	'judul' => 'Data Akses',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('dataakses/viewdata', $data, TRUE),
	);
	$this->parser->parse('temp/temp', $template);
}

public function tambah() {
	$data['level']=$this->k->level()->result_array();
	$data['ip']=$this->k->jatah_ip()->result_array();
	$template = array(
	'judul' => 'Tambah Data Akses',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('dataakses/formtambah', $data, TRUE),
	);
	$this->parser->parse('temp/temp', $template);
}

//================================================================================
public function simpandata() {
			$params = $this->input->post(null, TRUE);
	
			$this->form_validation->set_rules('id', 'Id Pengguna', 'required', array(
			'required' => '%s tidak boleh kosong'
			));
			$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required', array(
			'required' => '%s tidak boleh kosong'
			));
			$this->form_validation->set_rules('password', 'Password User', 'required', array(
			'required' => '%s tidak boleh kosong'
			));
if ($this->form_validation->run() == FALSE) {
	$pesanerror = '<div class="alert alert-danger"><strong>' . validation_errors() . '</strong></div>';
		$this->session->set_flashdata('pesan', $pesanerror);
		redirect('dataakses/tambah');
} else {
		
		$querysimpandata = $this->k->simpandata($params);

		if ($querysimpandata) {
			$pesansukes = '<div class="alert alert-success"><strong>Data akses berhasil disimpan</strong></div>';
			$this->session->set_flashdata('pesan', $pesansukes);
			redirect('dataakses/tambah');
		}
}
}
//====================================================================================================


}

?>