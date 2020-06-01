<?php 
class Modelkonfigurasi extends CI_Model{
	protected $tabel='konfigurasi';
	protected $tabe2='jatah_ip';
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

			$ipnetwork_left=substr($params['network'], 0, -1); //didapat 192.168.1.xxx
			
			$a_len=strlen($ipnetwork_left);
			$ip_right=substr($params['ip_server'], $a_len);
			$ip_right+=1;

			$this->db->query("DELETE FROM `jatah_ip`");
			for ($i=0; $i <= $params['jumlah_host'] ; $i++) { 
				$ip_right+=1;
				$ip=$ipnetwork_left.$ip_right;
				$this->save_jatahip($no=$i,$ip);
			}
		return $this->db->insert($this->tabel, $data);
	}
public function save_jatahip($no,$ip)
	{
		$data = [
			'no'   => $no,
			'ip_address'   => $ip
		];
		return $this->db->insert($this->tabe2, $data);
	}
}
?>