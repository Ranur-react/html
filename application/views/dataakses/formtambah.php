

<div class="col-lg-12">
<div class="box">
<div class="box-header">
              <h3 class="box-title"><i class="fa fa-folder"></i>Tambah Data Akses</h3>
            </div>
<div class="box-body">
<strong class="box-title">
<?php echo anchor('dataakses/index', 'Kembali', array('class' => 'btn btn-warning')) ?>
</strong>
<br></br>
<?php echo $this->session->flashdata('pesan');?>
<?php echo form_open('dataakses/simpandata', array('class' => 'form-horizontal')) ?>


<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Nama Perangkat</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="nama" class="form-control">
	<span class="error nama text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Id</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="id" class="form-control">
	<span class="error id text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Password</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="password" class="form-control">
	<span class="error password text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Level Koneksi</label>
	</div>
	<div class="col-12 col-md-5">
		<select class="form-control select4" name="level" >
			<?php foreach ($level as $key => $value) { ?>
				<option value="<?= $value['level'] ?>"><?= strtoupper($value['level']) ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">IP Address</label>
	</div>
	<div class="col-12 col-md-5">
	<select class="form-control select3" name="ip_address" id="level">
		<?php foreach ($ip as $key => $value) { ?>
			<option value="<?= $value['ip_address'] ?>"><?= strtoupper($value['ip_address']) ?></option>
		<?php } ?>
	</select>
	</div>
</div>
<div class="row form-group">
<div class="col col-md-2">
<button type="submit" class="btn btn-success">
Simpan Data
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
</script>