<script>
function tambahdata(){
location.href=('<?php echo site_url('dataakses/tambah')?>');}

function editdata(id){
location.href=('<?php echo site_url('dataakses/edit/')?>' + id);}

function hapusdata(id){
pesan=confirm('Yakin Data Dengan ID: "' + id + '" ini dihapus');
if(pesan){
location.href=('<?php echo site_url('dataakses/hapus/')?>' + id);}
else
return false;}
</script>



<div class="col-lg-12">
<div class="box">

<div class="box-header">
              <h3 class="box-title"><i class="fa fa-folder"></i> Data Akses</h3>
            </div>
<div class="box-body">
<strong>
<button type="button" class="btn btn-primary" onclick="return tambahdata();">
<i class="fa fa-plus"></i> Tambah Data
</button>
</strong>
<br></br>
<?php echo form_open('', array('class' => 'form-horizontal')) ?>
<div class="row form-group">
<div class="col col-md-2">
<label class="form-control-label">Cari Data</label>
</div>
<div class="col-12 col-md-4">
<input type="text" name="cari" value="<?php echo $cari;?>"
class="form-control" placeholder="Input Nama Perangkat">
</div>
<div class="col-12 col-md-2">
<button type="submit" class="btn btn-success" name="tombolcari">
<i class="fa fa-search"></i>
</button>
</div>
</div>
<?php echo form_close(); ?>
<table class="table table-bordered">
<thead>
<tr>
<th>No</th>
<th>Nama Perangkat</th>
<th>ID</th>
<th>Password</th>
<th>Level</th>
<th>IP</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$n = 0;
foreach ($tampil->result_array() as $row):
$n++;
?>
<tr>

<td><?= $n ?></td>
<td><?= $row['namaperangkat']; ?></td>
<td><?= $row['id']; ?></td>
<td><?= $row['password']; ?></td>
<td><?= $row['level']; ?></td>
<td><?= $row['ip']; ?></td>
<td><?= $row['status']; ?></td>


<td>
<button type="button" class="btn btn-info" onclick="return editdata('<?php echo $row['id']?>');" title="Edit Data">
<i class="fa fa-pencil"></i>
</button>
<button type="button" class="btn btn-danger" onclick="return hapusdata('<?php echo $row['id']?>');" title="Hapus Data">
<i class="fa fa-remove"></i>
</button>
</td>
</tr>
<?php
endforeach;
?>
</tbody>
</table>

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