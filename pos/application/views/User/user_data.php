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
            <h3 class="box-title">Data User</h3>
            <div class="pull-right">
                <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"> Create</i> 
                </a>
            </div>
        </div>
        <div class="box-body table-responsive" >
            <!-- <?php print_r($row)?> -->
            <table class="table table-border table-stripped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>Level</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data ){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->username ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
                        <td class="text-center" width="160px">
                            <form action="<?= site_url('user/del') ?>" method="post">
                                <a href="<?= site_url('user/edit/'.$data->user_id) ?>" class="btn btn-primary btn-xs" >
                                    <i class="fa fa-pencil"> Update</i>
                                </a>                   
                                <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                <button onclick="return confirm('Apakah anda yakin?') " type="submit" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"> Delete</i>
                                </button>
                            </form>
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