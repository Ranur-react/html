<div class="col-lg-12">
<div class="box">
<div class="box-header">
              <h3 class="box-title"><i class="fa fa-folder"></i> Edit Kategori</h3>
            </div>


<div class="box-body">
<strong>
<?php echo anchor('Datakonfig/index', 'Kembali', array('class' => 'btn btn-warning')) ?>
</strong>
<br></br>
<?php echo $this->session->flashdata('pesan'); ?>
<?php echo form_open('Datakonfig/update', array('class' => 'form-horizontal')) ?>

<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">IP Sever</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="nama" class="form-control" value="<?= $data['ip_server'] ?>">
	<span class="error nama text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Network</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="id" class="form-control" value="<?= $data['network'] ?>">
	<span class="error id text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Netmask</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="password" class="form-control" value="<?= $data['netmask'] ?>">
	<span class="error password text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Jumlah Host</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="password" class="form-control" value="<?= $data['jumlah_host'] ?>">
	<span class="error password text-red"></span>

	</div>
</div>
<div class="row form-group">
	<div class="col col-md-2">
	<label class="form-control-label">Range</label>
	</div>
	<div class="col-12 col-md-6">
	<input type="text" name="password" class="form-control" value="<?= $data['range'] ?>">
	<span class="error password text-red"></span>

	</div>
</div>



<button type="submit" class="btn btn-success">
Update Data
</button>

</div>



<?php echo form_close(); ?>
</div>
</div>

<script type="text/javascript">
	$('.select3').select2();
	$('.select4').select2();
</script>