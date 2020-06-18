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
		
			$rangemin="";
			$rangemax="";
			$index[0]="";
			$ipnetwork_left=substr($params['network'], 0, -1); //didapat 192.168.1.xxx
			$a_len=strlen($ipnetwork_left);
			$ip_right=substr($params['ip_server'], $a_len);
			$this->db->query("DELETE FROM `jatah_ip`");
			for ($i=0; $i < $params['jumlah_host'] ; $i++) { 
				$ip_right+=1;
				$ip=$ipnetwork_left.$ip_right;
				$index[$i]=$ip;
				$this->save_jatahip($no=$i,$ip);
			}
				// if ($i=0) 
				// 		{$rangemin=$ip;
				// 		}
				// 	if($i=$params['jumlah_host'])
				// 	{
				// 			$rangemax=$ip;
				// 	}
			$rangemin=$index[0];		
			$nx=count($index)-1;		
			$rangemax=$index[$nx];		

				$konfig=$this->Konfigurasi();

					ini_set('display_errors', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);
					$connection = ssh2_connect($konfig['ip_mikrotik'], $konfig['port']);
					ssh2_auth_password($connection, 'admin', '');	
					 

						 $data = [
									'ip_mikrotik'   => $params['ip_mikrotik'],
									'port'   => $params['port'],
									'ip_server'   => $params['ip_server'],
									'prefix'   => '/24',
									'network'   => $params['network'],
									'netmask'   => $params['netmask'],
									'jumlah_host'   => $params['jumlah_host'],
									'rangemin'   => $rangemin,
									'rangemax'   => $rangemax
								];
			
					//dhcp-server

							// 		ip dhcp-server enable hotspotBrdg
//add and remove address interface
				   $stream = ssh2_exec($connection, '');
				   $stream = ssh2_exec($connection, 'ip address remove number=1');
				   $stream = ssh2_exec($connection, 'ip address remove number=2');
				   $stream = ssh2_exec($connection, 'ip address remove number=3');
				   $stream = ssh2_exec($connection, 'ip address remove number=4');

					$stream = ssh2_exec($connection, 'ip address add address='.$params['ip_server'].'/24'.' network='.$params['network'].' interface=hotspotBrdg');
//end---add and remove address interface
// ip pool 
					$stream = ssh2_exec($connection, 'ip dhcp-server network remove 0');
					$stream = ssh2_exec($connection, 'ip dhcp-server remove hotspotBrdg');
					$stream = ssh2_exec($connection, 'ip pool remove hotspotBrdg');

				


					$stream = ssh2_exec($connection, 'ip pool add name=hotspotBrdg ranges='.$rangemin.'-'.$rangemax);
//end pool range

//dhcp 



	
					$stream = ssh2_exec($connection, 'ip dhcp-server network add address='.$params['network'].'/24'.' gateway='.$params['ip_server'].' dns-server=8.8.8.8');

					//end dhcp

					$stream = ssh2_exec($connection,'ip dhcp-server add name=hotspotBrdg address-pool=hotspotBrdg interface=hotspotBrdg');

					$stream = ssh2_exec($connection,'ip dhcp-server enable hotspotBrdg');
					$stream = ssh2_exec($connection,'ip hotspot remove hotspotsmk');
					$stream = ssh2_exec($connection,'ip hotspot add name=hotspotsmk interface=hotspotBrdg address-pool=hotspotBrdg profile=wifi');
					$stream = ssh2_exec($connection,'ip hotspot enable hotspotsmk');
 

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