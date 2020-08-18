<?php
class Konfigurasi_IP extends CI_Controller {
public function __construct() {
parent::__construct();
$this->load->model('Modelkonfigurasi');
}



public function index() {

	$d['data']=$this->Modelkonfigurasi->view();
	$template = array(
	'judul' => 'Data Konfigurasi IP Address',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('Konfigurasi/index', $d, TRUE)
	 
	);
	$this->parser->parse('temp/temp', $template);


}
public function Bersih()
{
	$this->Modelkonfigurasi->HapusKonfigurasipadaMikrotik();
}
public function tambah() {
	
	// $data['ip_server']=$this->k()->result_array();
	$template = array(
	'judul' => 'Konfigurasi IP Address',
	'menu' => $this->load->view('temp/menu', '', TRUE),
	'isi' => $this->load->view('Konfigurasi/formtambah', '', TRUE),
	);
	$this->parser->parse('temp/temp', $template);
}
public function Eror_Validate_massage($value,$type)
{
		if($type=="danger"){
		$pesanerror = '<div class="alert alert-danger"><strong>' .$value. '</strong></div>';
		}else{
		$pesanerror = '<div class="alert alert-success"><strong>' .$value. '</strong></div>';

		}
	return $this->session->set_flashdata('pesan', $pesanerror);
}
public function simpandata() 
	{
		$params = $this->input->post(null, TRUE);
			
					$this->form_validation->set_rules('ip_mikrotik', 'ip_mikrotik', 'required');
					$this->form_validation->set_rules('port', 'ip_mikrotik', 'required');
					$this->form_validation->set_rules('ip_server_otg', 'ip server', 'required');
					$this->form_validation->set_rules('network', 'Network', 'required');
					// $this->form_validation->set_rules('netmask', 'Netmask', 'required');
					$this->form_validation->set_rules('jumlah_host', 'Jumlah_host', 'required');
					// $this->form_validation->set_rules('rangemin', 'range', 'required');
					// $this->form_validation->set_rules('rangemax', 'range', 'required');

					$this->form_validation->set_message('required', '%s tidak boleh kosong.');
					$this->form_validation->set_message('is_unique', '%s sudah digunakan.');


		if ($this->form_validation->run() == FALSE) 
		{
			  
			$this->Eror_Validate_massage($value=validation_errors(),$type="danger");
					redirect('Konfigurasi_IP/tambah');
		} else 
		{
				
				$querysimpandata = $this->Modelkonfigurasi->save($params);

				if ($querysimpandata) 
				{
					$this->Eror_Validate_massage($value="Data akses berhasil disimpan",$type="success");
					$this->session->set_flashdata('pesan', $pesansukes);
					redirect('Konfigurasi_IP/tambah');
				}else{

					$this->Eror_Validate_massage($value="Data akses GAGAL disimpan",$type="danger");
				}
		}
	}

}

?>