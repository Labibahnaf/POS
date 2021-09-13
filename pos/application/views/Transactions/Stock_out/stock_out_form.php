<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Stock Out
		<small> Tambah Barang Masuk</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
		<li>Transaction</li>
        <li class="active">Stock Out</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Add Stock Out</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/out') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i> 
                </a>
            </div>
        </div>
        <div class="box-body" >
            <div class="row  ">
                <div class="col-md-4 col-md-offset-4" >
                    <form action="<?= site_url('stock/process')?>" method="post">
                        <div class="form-group">
                            <label for="">Date *</label>
                            <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required >
                        </div>
                        <div>
                            <label for="barcode">Barcode *</label>
                        </div>
                        <div class="form-group input-group" >
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                            <span class="input-group-btn" >
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item"  >
                                    <i class="fa fa-search" ></i>
                                </button>
                            </span>
                        </div>
                        <div class="from-group">
                            <label for="item_nama">Item Name *</label>
                            <input type="text" name="item_nama" id="item_nama" class="form-control" readonly  >
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <label for="unit_nama">Item Unit *</label>
                                    <input type="text" name="unit_nama" id="unit_nama" value="-" class="form-control" readonly >
                                </div>
                                <div class="col-md-8">
                                    <label for="stock">Initial Stock *</label>
                                    <input type="text" name="stock" id="stock" value="-" class="form-control" readonly >
                                </div>
                            </div>
                        </div>
                        <div class="from-group">
                            <label >Detail *</label>
                            <input type="text" name="detail" id="detail" class="form-control" placeholder="terjual / hilang / rusak / expired / dll" required  >
                        </div>
                        <div class="from-group">
                            <label >Qty *</label>
                            <input type="number" name="qty" id="qty" class="form-control" required  >
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" name="out_add" class="btn btn-success btn-flat"> <i class="fa fa-paper-plane"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button Type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Select Product Item</h4>
            </div>
            
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item as $i => $data){?>
                        <tr>
                            <td><?= $data->barcode?></td>
                            <td><?= $data->nama?></td>
                            <td><?= $data->unit_nama?></td>
                            <td class="text-right"><?="Rp " . number_format($data->price,0,",",".")?></td>
                            <td class="text-right"><?= $data->stock?></td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="select" 
                                    data-id="<?=$data->item_id?>"
                                    data-barcode="<?=$data->barcode?>"
                                    data-nama="<?=$data->nama?>"
                                    data-unit="<?=$data->unit_nama?>"
                                    data-stock="<?=$data->stock?>">

                                    <i class="fa fa-check"></i>Select
                                </button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>

<script>
    $(document).ready(function(){
        $(document).on('click', '#select', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var nama = $(this).data('nama');
            var unit_nama = $(this).data('unit');
            var stock = $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_nama').val(nama);
            $('#unit_nama').val(unit_nama);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
        })
    })
</script>