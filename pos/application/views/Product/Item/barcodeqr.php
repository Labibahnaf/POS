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
            <h3 class="box-title">Barcode Generator</h3>
            <div class="pull-right">
                <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat btn-sm">
                    <i class="fa fa-undo"> Back</i> 
                </a>
            </div>
        </div>
        <div class="box-body" >
            <?php 
                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                echo $generator->getBarcode($row->barcode, $generator::TYPE_CODE_128);
            ?>
            <!-- <br> -->
            <?= $row->barcode?>
        </div>

    </div>
	
</section>
<!-- /.content -->