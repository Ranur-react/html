<?php 
class Modelkonfigurasi extends CI_Model{
	protected $tabel='konfigurasi';
public function view()
{
		return $this->db->query("SELECT*FROM ".$this->tabel)->result_array();
}
	public function save($params)
	{
		$data = [
			'ip_server'   => $params['ip_server'],
			'prefix'   => $params['prefix'],
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