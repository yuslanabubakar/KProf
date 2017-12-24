<?php
foreach ($editdata as $edit) {
    $id = $edit->idBarang;
    $nama = $edit->namaBarang;
    $jenis = $edit->namaJenis;
    $idjenis= $edit->idJenis;
    $harga = $edit->harga;
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Menu
            <small>Halaman Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-list-alt"></i> Menu</a></li>
            <li class="active"> Edit Menu</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" method='post' name='process' action='<?php echo base_url(); ?>petugas/Menu/EditP/'>
                        <div class="box-body">

                            <!--------------------------
                            | Your Page Content Here |
                            
                            -------------------------->
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">ID Menu</label>
                                    <div style="padding-left:20px" class="col-md-4">
                                        <input type="text" name="idMenu" id="idMenu" type="text" class="form-control"value="<?php echo $id ?>" readonly>
                                        <span style="color:red;"><?php echo form_error('idMenu'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Nama</label>
                                    <div style="padding-left:36px" class="col-md-8">
                                        <input type="text" name="namaMenu" id="namaMenu" type="text" class="form-control"value="<?php echo $nama ?>">
                                        <span style="color:red;"><?php echo form_error('namaMenu'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Jenis</label>

                                    <div style="padding-left:38px" class="col-md-8">
                                        <input type="text" name="jenis" id="jenis" type="text" class="form-control"placeholder="<?php echo $jenis ?>" readonly>

                                        <span style="color:red;"><?php echo form_error('jenis'); ?></span>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Harga</label>
                                    <div style="padding-left:35px" class="col-md-8">
                                        <input type="text" name="harga" id="harga" type="text" class="form-control"value="<?php echo $harga ?>">
                                        <span style="color:red;"><?php echo form_error('harga'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>