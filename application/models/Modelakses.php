<?php 
class Modelakses extends CI_Model{

public function ambildata($id) {
return $this->db->get_where('hakakses',array('id'=>$id));
}


public function view(){	
	return $this->db->get('hakakses');
}
public function jatah_ip(){
	return $this->db->query("SELECT * FROM jatah_ip WHERE `ip_address` NOT IN (SELECT ip FROM hakakses);");
}
public function jatah_ip_edit($ip){
	return $this->db->query("SELECT * FROM jatah_ip WHERE `ip_address` NOT IN (SELECT ip FROM hakakses WHERE ip NOT IN('$ip'));");

}
public function level(){	
	return $this->db->get('level');
}
public function dataakses_perpage($cari,$per_page,$uri){
	$arraycari = array(
	'id' => $cari,
	'namaperangkat' => $cari
	);
	$this->db->or_like($arraycari);
	return $this->db->get('hakakses',$per_page,$uri);
}

function dataakses($cari){
$arraycari=array(
'id'=>$cari,
'namaperangkat'=>$cari
);
$this->db->or_like($arraycari);
return $this->db->get('hakakses');
}

public function hapusdata($id){
return $this->db->delete('hakakses',array('id'=>$id));

}
public function updatedata($params)
{
		$field=array(
		'namaperangkat'=>$params['nama'],
		'password'=>$params['password'],
		'level'=>$params['level'],
		'ip'=>$params['ip_address']
	);

	$this->db->where('id',$params['id']);
	return $this->db->update('hakakses',$field);
}
public function updatedata_STATUS($params)
{
		$field=array('status'=>$params['status']);
			$this->db->where('id',$params['id']);
	return $this->db->update('hakakses',$field);
}

	public function simpandata($params){
				$field=array(
					'namaperangkat'=>$params['nama'],
					'id'=>$params['id'],
					'password'=>$params['password'],
					'level'=>$params['level'],
					'ip'=>$params['ip_address'],
					'status'=>'1'
				);

		$konfig=$this->Konfigurasi();

					ini_set('display_errors', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);
					$connection = ssh2_connect($konfig['ip_mikrotik'], $konfig['port']);
					ssh2_auth_password($connection, 'admin', '');	
					$stream = ssh2_exec($connection, ' ip hotspot user add name='.$params['id'].' password='.$params['password'].' profile='.$params['level'].' address='.$params['ip_address'].'');

					if ($stream) {
						# code...
						return $this->db->insert('hakakses',$field);
					}

	}


	public function Konfigurasi()
{
		return $this->db->query("SELECT*FROM konfigurasi WHERE kode IN (SELECT MAX(kode) FROM konfigurasi)")->row_array();
}
}
?>