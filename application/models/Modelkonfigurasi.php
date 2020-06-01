<?php 
class Modelkonfigurasi extends CI_Model{
	protected $tabel='konfigurasi';

	public function save()
	{
		$data = [
			'ip_server'   => $params['ip_server'],
			'network'   => $params['network'],
			'netmask'   => $params['netmask'],
			'jumlah_host'   => $params['jumlah_host'],
			'rangemin'   => $params['rangemin'],
			'rangemax'   => $params['rangemax']
		];
		return $this->db->insert($this->tabel, $data);
	}

}
?>