<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Units
		<small>Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
		<li class="active">Units</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- <?php $this->view('message')?> -->
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Units</h3>
            <div class="pull-right">
                <a href="<?= site_url('unit/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Create</i> 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive" >
            <!-- <?php print_r($row)?> -->
            <table class="table table-border table-stripped" id="table1">
                <thead>
                    <tr>
                        <th >#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data ){ ?>
                    <tr>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data->nama ?></td>
                        <td class="text-center" width="160px">
                            <a href="<?= site_url('unit/edit/'.$data->unit_id) ?>" class="btn btn-primary btn-xs" >
                                <i class="fa fa-pencil"> Update</i>
                            </a>
                            <a href="<?= site_url('unit/del/'.$data->unit_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs" >
                                <i class="fa fa-trash"> Delete</i>
                            </a>                           
                        </td>
                    </tr>
                    <?php 
                    } ?>
                </tbody>
            </table>
        </div>

    </div>
	
</section>
<!-- /.content -->