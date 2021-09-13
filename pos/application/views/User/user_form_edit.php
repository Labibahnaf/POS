<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Users
		<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
		<li class="active">Users</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="pull-right">
                <a href="<?= site_url('user') ?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"> Back</i> 
                </a>
            </div>
        </div>
        <div class="box-body" >
            <div class="row  ">
                <div class="col-md-4 col-md-offset-4" >
                    <form action="" method="post">
                        <div class="form-group <?= form_error('nama')? 'has-error' : null ?> ">
                            <label for="">Name *</label>
                            <input type="hidden" name="user_id" value="<?= $row->user_id?>" >
                            <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $row->nama ?>" class="form-control">
                            <?= form_error('nama')?>
                        </div>
                        <div class="form-group <?= form_error('username')? 'has-error' : null ?> ">
                            <label for="">Username *</label>
                            <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control">
                            <?= form_error('username')?>
                        </div>
                        <div class="form-group <?= form_error('password')? 'has-error' : null ?> ">
                            <label for="">Password *</label> <small>(Biarkan kosong jika tidak diganti)</small>
                            <input type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control">
                            <?= form_error('password')?>
                        </div>
                        <div class="form-group <?= form_error('passconf')? 'has-error' : null ?> ">
                            <label for="">Password Confirmation *</label>
                            <input type="password" name="passconf" value="<?= $this->input->post('passconf') ?>" class="form-control">
                            <?= form_error('passconf')?>
                        </div>
                        <div class="form-group  ">
                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control"><?= $this->input->post('alamat') ?? $row->alamat ?></textarea>
                        </div>
                        <div class="form-group <?= form_error('level')? 'has-error' : null ?> ">
                            <label for="">Level</label>
                            <select  name="level" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                                <option value="1">Admin</option>
                                <option value="2" <?= $level == 2 ? 'selected' : null ?> >Kasir</option>
                            </select>
                            <?= form_error('level')?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-flat"> <i class="fa fa-paper-plane"></i> Save</button>
                            <button class="btn  btn-flat">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
	
</section>
<!-- /.content -->