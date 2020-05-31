<script>
function tambahdata(){
location.href=('<?php echo site_url('Datakonfig/tambah')?>');}

function editdata(ip){
location.href=('<?php echo site_url('Datakonfig/edit/')?>' + ip);}

function hapusdata(ip){
pesan=confirm('Yakin Data Dengan IP: "' + ip + '" ini dihapus');
if(pesan){
location.href=('<?php echo site_url('Datakonfig/hapus/')?>' + ip);}
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
              <h3 class="box-title"><i class="fa fa-folder"></i> Konfigurasi IP Address</h3>
            </div>
<div class="box-body">
	<div class="col col-md-2"></div>
	<div class="col col-md-6">
		<div><?php $r=$tampil->row_array(); ?></div>
		<table class="containts-tabel">
			<tr>
				<td class="tb-title">IP Server</td>
				<td class="titik">:</td>
				<td class="isi"><?= $r['ip_server']; ?></td>
			</tr>
			<tr>
				<td class="tb-title">Network</td>
				<td class="titik">:</td>
				<td class="isi"><?= $r['network']; ?></td>
			</tr>
			<tr>
				<td class="tb-title">Netmask</td>
				<td class="titik">:</td>
				<td class="isi"><?= $r['netmask']; ?></td>
			</tr>
			<tr>
				<td class="tb-title">Jumlah Host</td>
				<td class="titik">:</td>
				<td class="isi"><?= $r['jumlah_host']; ?></td>
			</tr>
			<tr>
				<td class="tb-title">Ip Range</td>
				<td class="titik">:</td>
				<td class="isi"><?= $r['range']; ?></td>
			</tr>
			<tr>
				<td>
					<strong>
						<button type="button" class="btn btn-primary" onclick="return tambahdata();">
						<i class="fa fa-plus"></i> Tambah Data
						</button>
					</strong>
				</td>
			</tr>
		</table>
	</div>




<br></br>
<!-- <?php echo form_open('', array('class' => 'form-horizontal')) ?>
<div class="row form-group">
<div class="col col-md-2">
<label class="form-control-label">Cari Data</label>
</div>
<div class="col-12 col-md-4">
<input type="text" name="cari" value="<?php echo $cari;?>"
class="form-control" placeholder="Input IP">
</div>
<div class="col-12 col-md-2">
<button type="submit" class="btn btn-success" name="tombolcari">
<i class="fa fa-search"></i>
</button>
</div>
</div>
<?php echo form_close(); ?> -->
<!-- <table class="table table-bordered">
<thead>
<tr>
<th>IP Server</th>
<th>Network</th>
<th>Netmask</th>
<th>Jumlah Host</th>
<th>Range</th>

</tr>
</thead>
<tbody>
<?php
// $nomor = 0;
// foreach ( as $row):
// $nomor++;
?>
<tr>

<td><?php echo $row['ip_server']; ?></td>
<td><?php echo $row['network']; ?></td>
<td><?php echo $row['netmask']; ?></td>
<td><?php echo $row['jumlah_host']; ?></td>
<td><?php echo $row['range']; ?></td>


<td>
<button type="button" class="btn btn-info" onclick="return editdata('<?php echo $row['ip_server']?>');" title="Edit Data">
<i class="fa fa-pencil"></i>
</button>
</td>
</tr>
<?php
// endforeach;
?>
</tbody>
</table> -->

<div class="pull-right">
<?php echo $this->pagination->create_links(); ?>
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