
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo "string";
$connection = ssh2_connect('192.168.33.1', '22');
ssh2_auth_password($connection, 'admin', '');
	
echo "-----------------------";
for ($i=0; $i < 10; $i++) { 
	$stream = ssh2_exec($connection, 'ip hotspot user add name=BGuru_'.$i.' password=1h12 profile=bulanan');
}
echo "-----------------------";
?>

tes