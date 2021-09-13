<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		gudang
		<small>Gudang Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
		<li class="active">gudang</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page)?> gudang</h3>
            <div class="pull-right">
                <a href="<?= site_url('gudang') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i> 
                </a>
            </div>
        </div>
        <div class="box-body" >
            <div class="row  ">
                <div class="col-md-4 col-md-offset-4" >
                    <form action="<?= site_url('gudang/process')?>" method="post">
                        <div class="form-group">
                            <label for="">gudang Name *</label>
                            <input type="hidden" name="id" value="<?= $row->gudang_id?>" >
                            <input type="text" name="gudang_name" value="<?= $row -> nama ?>" class="form-control" required >
                        <div class="form-group">
                            <button type="submit" name="<?= $page?>" class="btn btn-success btn-flat"> <i class="fa fa-paper-plane"></i> Save</button>
                            <!-- <button type="Reset" class="btn btn-flat">Reset</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
	
</section>
<!-- /.content -->