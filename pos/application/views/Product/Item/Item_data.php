<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Item
		<small>Barang</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
		<li class="active">Items</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- <?php $this->view('message')?> -->
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Items</h3>
            <div class="pull-right">
                <a href="<?= site_url('item/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Create</i> 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive" >
            <!-- <?php print_r($row)?> -->
            <table class="table table-border table-stripped" id="table1" >
                <thead>
                    <tr>
                        <th style="width:5%" >#</th>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Unit</th>
                        <th>Gudang</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $no = 1;
                    foreach($row->result() as $key => $data ){ ?>
                    <tr>
                        <td style="width:5%;" ><?= $no++ ?>.</td>
                        <td>
                            <?= $data->barcode ?><br>
                            <a href="<?= site_url('item/qrcode/'.$data->item_id) ?>" class="btn btn-default btn-xs" >
                                QR Code                        <i class="fa fa-barcode"></i>
                            </a>
                        </td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->category_name ?></td>
                        <td><?= $data->unit_nama ?></td>
                        <td><?= $data->gudang_name ?></td>
                        <td><?= $data->price ?></td>
                        <td><?= $data->stock ?></td>
                        <td>
                            <?php if ($data->gambar != null) { ?>
                                <img src="<?= base_url('uploads/products/'.$data->gambar) ?>" style="width:100px">
                            <?php } ?>
                        </td>
                        <td class="text-center" width="160px">
                            <a href="<?= site_url('item/edit/'.$data->item_id) ?>" class="btn btn-primary btn-xs" >
                                <i class="fa fa-pencil"> Update</i>
                            </a>
                            <a href="<?= site_url('item/del/'.$data->item_id) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger btn-xs" >
                                <i class="fa fa-trash"> Delete</i>
                            </a>                           
                        </td>
                    </tr>
                    <?php 
                    } ?> -->
                </tbody>
            </table>
        </div> 
    </div>
	
</section>
<!-- /.content -->

<script>
    $(document).ready(function(){
      $('#table1').DataTable({
            "processing" : true,
            "serverSide" : true,
            "ajax"       : {
                "url" : "<?= site_url('item/get_ajax') ?>",
                "type": "POST"
            },
            "columnDefs" : [{
                    "targets"  : [7, 8],
                    "className": 'text-center'
                },
                {
                    "targets"  : [5, 6],
                    "className": 'text-right'
                },
                {
                    "targets"  : [0, 7, -1],
                    "orderable": false
                }
            ]
      })
    })
  </script>