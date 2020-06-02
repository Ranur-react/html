<?php 
class Modelkonfigurasi extends CI_Model{
	protected $tabel='konfigurasi';
	protected $tabe2='jatah_ip';
public function view()
{
		return $this->db->query("SELECT*FROM konfigurasi WHERE kode IN (SELECT MAX(kode) FROM konfigurasi)")->row_array();
}
	public function save($params)
	{
		$data = [
			'ip_mikrotik'   => $params['ip_mikrotik'],
			'port'   => $params['port'],
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
			$this->db->query("DELETE FROM `jatah_ip`");
			for ($i=0; $i <= $params['jumlah_host'] ; $i++) { 
				$ip_right+=1;
				$ip=$ipnetwork_left.$ip_right;
				$this->save_jatahip($no=$i,$ip);
			}


				$konfig=$this->Konfigurasi();

					ini_set('display_errors', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);
					$connection = ssh2_connect($konfig['ip_mikrotik'], $konfig['port']);
					ssh2_auth_password($connection, 'admin', '');	
					 

			
					//dhcp-server
							// 0. add ip bridge int
							// 		ip address add address=192.168.50.1/24 network=192.168.50.0 interface=hotspotBrdg
							// 0. Remove Pool
							// 		ip pool remove hotspotBrdg
							// 1. create DHCP Pool  []
							// 		ip pool add name=hotspotBrdg ranges=192.168.50.1-192.168.50.5
							// 2. Remove Network
							// 		ip dhcp-server network remove 0
							// 3. create network
							// 		ip dhcp-server network add address=192.168.50.0/24 gateway=192.168.50.1 dns-server=8.8.8.8
							// 4. Create DHCP
							// 		ip dhcp-server add name=hotspotBrdg address-pool=hotspotBrdg interface=hotspotBrdg    
									
							// 		ip dhcp-server enable hotspotBrdg
//add and remove address interface
				 $stream = ssh2_exec($connection, 'ip address remove 1');

					$stream = ssh2_exec($connection, 'ip address add address='.$params['ip_server'].$params['prefix'].' network='.$params['network'].' interface=hotspotBrdg');
//end---add and remove address interface
// ip pool 
					$stream = ssh2_exec($connection, 'ip pool remove hotspotBrdg');

				


					$stream = ssh2_exec($connection, 'ip pool add name=hotspotBrdg ranges='.$params['rangemin'].'-'.$params['rangemax']);
//end pool range

//dhcp 


					$stream = ssh2_exec($connection,'ip dhcp-server add name=hotspotBrdg address-pool=hotspotBrdg interface=hotspotBrdg');

	$stream = ssh2_exec($connection, 'ip dhcp-server network remove 0');
					$stream = ssh2_exec($connection, 'ip dhcp-server network add address='.$params['network'].$params['prefix'].' gateway='.$params['ip_server'].' dns-server=8.8.8.8');
					
					$stream = ssh2_exec($connection,'ip dhcp-server enable hotspotBrdg');
					//end dhcp



					if ($stream) {
						# code...
						return $this->db->insert($this->tabel, $data);
					}

	}
public function save_jatahip($no,$ip)
	{
		$data = [
			'no'   => $no,
			'ip_address'   => $ip
		];
		return $this->db->insert($this->tabe2, $data);
	}

	public function Konfigurasi()
{
		return $this->db->query("SELECT*FROM konfigurasi WHERE kode IN (SELECT MAX(kode) FROM konfigurasi)")->row_array();
}
}
?>