<?php 
class Modelkonfigurasi extends CI_Model{

public function ambildata($ip) {
return $this->db->get_where('konfig_ip',array('ip_server'=>$ip));
}


public function view(){	
	return $this->db->get('konfig_ip');
}

public function ip(){	
	return $this->db->get('ip_server');
}
public function konfigurasiip_perpage($cari,$per_page,$uri){
	$arraycari = array(
	'ip_server' => $cari,
	'network' => $cari
	);
	$this->db->or_like($arraycari);
	return $this->db->get('konfig_ip',$per_page,$uri);
}

function konfigurasiip($cari){
$arraycari=array(
'ip_server'=>$cari,
'network'=>$cari
);
$this->db->or_like($arraycari);
return $this->db->get('konfig_ip');
}

public function hapusdata($ip){
return $this->db->delete('konfig_ip',array('ip_server'=>$id));

}
public function updatedata($params)
{
		$field=array(
		'ip_server'=>$params['ip'],
		'network'=>$params['network'],
		'netmask'=>$params['netmask'],
		'jumlah_host'=>$params['jumlah_host'],
		'range'=>$params['range']
	);

	$this->db->where('ip_server',$params['ip']);
	return $this->db->update('konfig_ip',$field);
}
public function updatedata_STATUS($params)
{
			$this->db->where('ip_server',$params['ip']);
	return $this->db->update('konfig_ip',$field);
}

public function simpandata($params){
	$field=array(
		'ip_server'=>$params['ip'],
		'network'=>$params['network'],
		'netmask'=>$params['netmask'],
		'jumlah_host'=>$params['jumlah_host'],
		'range'=>$params['range']
	);
	return $this->db->insert('konfig_ip',$field);
}
}
?>