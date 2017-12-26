<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Buat Menu
            <small>Halaman Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-list-alt"></i> Menu</a></li>
            <li class="active"> Buat Menu</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                    <!-- form start --><h3 class="box-title">Menambahkan Menu</h3>
                    </div>
                    <form role="form" class="form-horizontal" method='post' name='process' action='<?php echo base_url();?>petugas/Menu/Insert/'>
                        <div class="box-body">
                            
                            <!--------------------------
                            | Your Page Content Here |
                            
                            -------------------------->
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">ID Menu</label>
                                    <div style="padding-left:20px" class="col-md-5">
                                        <input readonly type="text" name="idMenu" id="idMenu" class="form-control" value="<?php echo $lastIdMenu; ?>">
                                        <span style="color:red;"><?php echo form_error('idMenu'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Nama</label>
                                    <div style="padding-left:37px" class="col-md-8">
                                        <input type="text" name="namaMenu" id="namaMenu" type="text" class="form-control" placeholder="Nama Menu">
                                        <span style="color:red;"><?php echo form_error('namaMenu'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Jenis</label>
                                    <div style="padding-left:39px" class="col-md-8">
                                        <?php if ($total_rowJ > 0) { ?>
                                            <select name="jenis" class="required form-control">
                                                <option value='-'> </option>
                                                <?php foreach ($jenis as $m): ?>
                                                    <option value='<?php echo $m->idJenis; ?>'><?php echo $m->idJenis . " - " . $m->namaJenis; ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php }else { ?>
                                            <input class="input-xxlarge focused" type="text" readonly value="Jenis Belum Ada ! Silahkan Buat Jenis Terlebih Dahulu">
                                        <?php } ?>
                                        <span style="color:red;"><?php echo form_error('jenis'); ?></span>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Harga</label>
                                    <div style="padding-left:35px" class="col-md-8">
                                        <input type="text" name="harga" id="harga" class="form-control" type="text" placeholder="Harga">
                                        <span style="color:red;"><?php echo form_error('harga'); ?></span>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Buat Menu" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>