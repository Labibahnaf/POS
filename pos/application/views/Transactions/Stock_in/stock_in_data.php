<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Stock In
		<small>Barang Masuk</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
		<li class="active">Stock In</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Stock In</h3>
            <div class="pull-right">
                <a href="<?= site_url('stock/in/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Add Stock In</i> 
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
                        <!-- <th>Gudang</th> -->
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row as $key => $data ){ ?>
                    <tr>
                        <td style="width:5%"><?= $no++ ?>.</td>
                        <td><?= $data->barcode ?></td>
                        <td><?= $data->item_nama ?></td>
                        <td><?= $data->qty ?></td>
                        <td><?= indo_date($data->date) ?></td>
                        <td class="text-center" width="160px">
                            <a id="set_detail" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-detail"
                            data-barcode="<?=$data->barcode?>"
                            data-item_nama="<?=$data->item_nama?>"
                            data-detail="<?=$data->detail?>"
                            data-supplier_nama="<?=$data->supplier_nama?>"
                            data-qty="<?=$data->qty?>"
                            data-date="<?=indo_date($data->date)?>">
                                <i class="fa fa-eye"> Detail</i>
                            </a>
                            <a href="<?= site_url('stock/in/del/'.$data->stock_id.'/'.$data->item_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs" >
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

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-sm ">
        <div class="modal-content">
            <div class="modal-header">
                <button Type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Stock In Detail</h4>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th>Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><span id="item_nama"></span></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td><span id="supplier_nama"></span></td>
                        </tr>
                        <!-- <tr>
                            <th>Gudang</th>
                            <td><span id="Gudang_name"></span></td>
                        </tr> -->
                        <tr>
                            <th>QTY</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click', '#set_detail', function() {
            var barcode = $(this).data('barcode');
            var item_nama = $(this).data('item_nama');
            var detail = $(this).data('detail');
            var supplier_nama = $(this).data('supplier_nama');
            // var gudang_name = $(this).data('gudang_name');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            $('#barcode').text(barcode);
            $('#item_nama').text(item_nama);
            $('#detail').text(detail);
            $('#supplier_nama').text(supplier_nama);
            // $('#gudang_name').text(gudang_name);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#set_detail').modal('hide');
        })
    })
</script>