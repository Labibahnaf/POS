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
            <h3 class="box-title"><?= ucfirst($page)?> Item</h3>
            <div class="pull-right">
                <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i> 
                </a>
            </div>
        </div>
        <div class="box-body" >
            <div class="row  ">
                <div class="col-md-4 col-md-offset-4" >
                    <?php echo form_open_multipart('item/process')?>
                        <div class="form-group">
                            <label for="">Item Barcode *</label>
                            <input type="hidden" name="id" value="<?= $row->item_id?>" >
                            <input type="text" name="barcode" value="<?= $row -> barcode ?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="">Product Name *</label>
                            <input type="hidden" name="id" value="<?= $row->item_id?>" >
                            <input type="text" name="product_name" value="<?= $row -> nama ?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="">category *</label>
                            <select name="category" id="" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($category->result() as $key => $data ){ ?>
                                    <option value="<?= $data->category_id?>" <?= $data->category_id == $row->category_id ? "selected" : null ?> ><?= $data->nama ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Unit *</label>
                            <?php echo form_dropdown('unit', $unit, $selectedunit, 
                            ['class' => 'form-control', 'required' => 'required' ])?>
                        </div>
                        <div class="form-group">
                            <label for="">gudang *</label>
                            <select name="gudang" id="" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php foreach($gudang->result() as $key => $data ){ ?>
                                    <option value="<?= $data->gudang_id?>" <?= $data->gudang_id == $row->gudang_id ? "selected" : null ?> ><?= $data->nama ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Price *</label>
                            <input type="hidden" name="id" value="<?= $row->item_id?>" >
                            <input type="number" name="price" value="<?= $row -> price ?>" class="form-control" required >
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <?php if ($page == 'edit') { 
                                if ($row->gambar != null) { ?>
                                    <div style="margin-bottom:5px">
                                        <img src="<?= base_url('uploads/products/'.$row->gambar) ?>" style="width:80%">
                                    </div>
                                <?php
                                }
                            }?>
                            <input type="file" name="gambar" class="form-control">
                            <small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ingin input gambar' ?>)</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?= $page?>" class="btn btn-success btn-flat"> <i class="fa fa-paper-plane"></i> Save</button>
                            <!-- <button type="Reset" class="btn btn-flat">Reset</button> -->
                        </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>

    </div>
	
</section>
<!-- /.content -->