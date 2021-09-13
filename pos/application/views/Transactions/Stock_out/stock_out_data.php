<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Stock Out
		<small>Barang Keluar</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
		<li class="active">Stock Out</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Stock Out</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/out/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Add Stock Out</i> 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive" >
            <table class="table table-border table-stripped" id="table1" >
                <thead>
                    <tr>
                        <th >#</th>
                        <th>Barcode</th>
                        <th>Product Item</th>
                        <th>Qty</th>
                        <th>Info</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row as $key => $data ){ ?>
                    <tr>
                        <td style="width:5%"><?= $no++ ?>.</td>
                        <td><?= $data->barcode ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->qty ?></td>
                        <td><?= $data->detail ?></td>
                        <td class="text-center" ><?= $data->created ?></td>
                        <td class="text-center" width="160px">
                            <a href="<?= site_url('stock/out/del/'.$data->stock_id.'/'.$data->item_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs" >
                                <i class="fa fa-trash"> Delete</i>
                            </a>                           
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->

