
<style type="text/css">
	
</style>
<div class="col-lg-12">
<div class="box">
	<div class="box-header">
	              <h3 class="box-title"><i class="fa fa-folder"></i>Konfigurasi IP</h3>
	</div>
<div class="box-body">
<strong class="box-title">
<?php echo anchor('Datakonfig/index', 'Kembali', array('class' => 'btn btn-warning')) ?>
</strong>
<br></br>
<?php echo $this->session->flashdata('pesan');?>
<?php echo form_open('Konfigurasi_IP/simpandata', array('class' => 'form-horizontal')) ?>

<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Ip address Mikrotik</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="ip_mikrotik"  value="192.168.137.201" class="form-control">
	<input type="text" name="port" value="22"  class="form-control">
	<span class="error ip_mikrotik text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">IP Hotspot Server </label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="ip_server" autofocus class="form-control ip_serverinput">
	<span class="error ip_server text-red"></span>

<!-- 	<select name="prefix">
		<option selected value="/24">Class C /24</option>
		<option value="/16">Class B /16</option>
		<option value="/8">Class A /8</option>
	</select> -->

	<span class="error prefix text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Network</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="network" class="form-control network">
	<span class="error network text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Netmask</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="netmask" class="form-control netmask" value="" placeholder="" >
	<span class="error netmask text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Jumlah Host</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="jumlah_host" class="form-control jumlah_hostinput">
	<span class="error jumlah_host text-red"></span>

	</div>
</div>
<!-- <div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Range</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="rangemin" class="form-control"> s/d
	<input type="text" name="rangemax" class="form-control">
	<span class="error range text-red"></span>

	</div>
</div>
 -->
<div class="row form-group">
<div class="col col-md-2">
<button type="submit" class="btn btn-success">
Simpan Konfigurasi
</button>
</div>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
<script type="text/javascript">
	$('.select3').select2();
	$('.select4').select2();


		$(document).ready( function(e) {

	   		$(document).focusout('.network', function(e) {
	   				setTimeout(function(){
						$('.netmask').val("255.");
	   				},10);
	   					   				setTimeout(function(){
	   										$('.netmask').val("255.25");
	   				},20);	   				setTimeout(function(){
						$('.netmask').val("255.255");
	   				},30);	   				setTimeout(function(){
						$('.netmask').val("255.255.2");
	   				},40);	   				setTimeout(function(){
						$('.netmask').val("255.255.25");
	   				},50);	   				setTimeout(function(){
					$('.netmask').val("255.255.255.");
	   				},60);	   				setTimeout(function(){
						$('.netmask').val("255.255.255.0");
	   				},70);



			});
			$(document).focusout('.ip_serverinput', function(e) {
				let server=$('.ip_serverinput').val();
					let ipsplitprefix=server.split("/");
					var n = server.includes("/");

					if(n==false){
						$('.ip_server').text("Tulis Ip address dengan menyertakan Prefix (/24)+");
						$('.ip_serverinput').val("");
					}else{
						$('.ip_server').text("");

					}
	

				// 	$('.network').val("")
				// 	$('.network').val(ipsplit[0]+"."+ipsplit[1]+"."+ipsplit[2]+"."+0);
				// 	let n = server.length; 
				// 	if (n>=3
				// 		$('.ip_serverinput').val(server.slice(0, 3)+"."+server.slice(3));
				// 	}

				let ip=ipsplitprefix[0];
				let ip_per_blok=ip.split(".");

				let prefix=ipsplitprefix[1];
					if(prefix==24){
						ipb1=ip_per_blok[0];
						ipb2=ip_per_blok[1];
						ipb3=ip_per_blok[2];
						ipb4=ip_per_blok[3];
						$('.network').val("")
					$('.network').val(ipb1+"."+ipb2+"."+ipb3+"."+0);
					}
					else if(prefix>24){
						ipb1=ip_per_blok[0];
						ipb2=ip_per_blok[1];
						ipb3=ip_per_blok[2];
						ipb4=ip_per_blok[3];
						let x=32-prefix;
						let	range=Math.pow(2, x);
						let	bitmx=256;
						let n=bitmx / range;
						let net=0;
						let netstate=0;
							for (let i =0; i<n; i++) {
								net=net+range;
								if(net>ipb4){
									break;
								}
								netstate=net;
							}
							if(netstate==ipb4){
								$('.ip_server').text("Jangan Menggunakan Ip Network dari Prefix !!");
								$('.ip_serverinput').val("");
								$('.network').val("");

							}else{
								$('.network').val("")
								$('.network').val(ipb1+"."+ipb2+"."+ipb3+"."+netstate);
							}
								// alert(netstate);	
								// alert("Networknya adalah 192.168.1."+net);	
						// ipb4=ipb4^


					}
				});
	});
</script>