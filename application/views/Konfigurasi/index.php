<script>
function tambahdata(){
location.href=('<?php echo site_url('Konfigurasi_IP/tambah')?>');}

function editdata(ip){
location.href=('<?php echo site_url('Konfigurasi_IP/edit/')?>' + ip);}

function hapusdata(ip){
pesan=confirm('Yakin Data Dengan IP: "' + ip + '" ini dihapus');
if(pesan){
location.href=('<?php echo site_url('Konfigurasi_IP/hapus/')?>' + ip);}
else
return false;}
</script>


<style type="text/css">
	.containts-tabel{
		width: 60%;
		/*border-bottom: 1px solid #ecf0f5;*/
	}
	.containts-tabel .tb-title{
		/*text-decoration: bold;*/
		font-weight: bold;
		text-align: left;

	}
	.containts-tabel tr {
		border-bottom: 1px solid #ecf0f5;

	}
	.containts-tabel .titik{
		width: 5%;
	}
	.containts-tabel .isi {
		text-align: left;
	}
</style>
<div class="col-lg-12">
<div class="box">

<div class="box-header">
              <h3 class="box-title"><i class="fa fa-folder"></i> Info Konfigurasi IP Address</h3>
            </div>
<div class="box-body">
	<div class="col col-md-2"></div>
	<div class="col col-md-6">
		
		<table class="containts-tabel">
			<tr>
				<td class="tb-title">IP Server</td>
				<td class="titik">:</td>
				<td class="isi"><?= $data['ip_server']; ?><?= $data['prefix']; ?></td>
			</tr>
			<tr>
				<td class="tb-title">Network</td>
				<td class="titik">:</td>
				<td class="isi"><?= $data['network']; ?></td>
			</tr>
			<tr>
				<td class="tb-title">Netmask</td>
				<td class="titik">:</td>
				<td class="isi"> <?= $data['netmask']; ?> </td>
			</tr>
			<tr>
				<td class="tb-title">Jumlah Host</td>
				<td class="titik">:</td>
				<td class="isi"><?= $data['jumlah_host']; ?></td>
			</tr>
			<tr>
				<td class="tb-title">Ip Range</td>
				<td class="titik">:</td>
				<td class="isi"><?= $data['rangemin']; ?> - <?= $data['rangemax']; ?></td>
			</tr>
			<tr>
				<td>
					<strong>
						<button type="button" class="btn btn-primary" onclick="return tambahdata();">
						<i class="fa fa-gear"></i> Setting Kembali
						</button>
					</strong>
				</td>
			</tr>
		</table>
	</div>


<div class="pull-right">
</div>

</div>
</div>
</div>


<script src="<?php echo base_url('temp/'); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<script>
$(document).ready(function () {
$('.pagination a').addClass('page-link');
});
</script>