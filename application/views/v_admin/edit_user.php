<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/user'); ?>">Pengguna</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Pengguna</h3>
                </div>
                <!-- /.card-header -->
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() . 'admin/proses_user_edit'; ?>" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id_user" value="<?= $dt[0]->id_user;?>">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="user" class="form-control" required="required" value="<?= $dt[0]->user;?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="pass" class="form-control" required="required" value="<?= $dt[0]->pass;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>