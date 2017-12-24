<?php
$dt = new DateTime();
$tgl = $dt->format('Y-m-d');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengeluaran
            <small>Halaman Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-list-alt"></i> Pengeluaran</a></li>
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
                    <!-- form start --><h3 class="box-title">Pengeluaran</h3>
                    </div>
                    <form role="form" class="form-horizontal" method='post' name='process' action='<?php echo base_url();?>petugas/Pengeluaran/tambahPengeluaran/'>
                        <div class="box-body">
                            
                            <!--------------------------
                            | Your Page Content Here |
                            
                            -------------------------->
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Tanggal</label>
                                    <div style="padding-left:60px" class="col-md-6">
                                        <input type="text" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal" readonly value="<?php echo $tgl; ?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Nama</label>
                                    <div style="padding-left:75px" class="col-md-8">
                                        <input type="text" name="namaBarang" id="namaBarang" class="form-control" placeholder="Nama Barang">
                                        <span style="color:red;"><?php echo form_error('namaBarang'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Jumlah</label>
                                    <div style="padding-left:65px" class="col-md-6">
                                        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah Barang" oninput="fungsiTotal()">
                                        <span style="color:red;"><?php echo form_error('jumlah'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Harga</label>
                                    <div style="padding-left:75px" class="col-md-8">
                                        <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga Barang" oninput="fungsiTotal()">
                                        <span style="color:red;"><?php echo form_error('harga'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label style="margin-top:6px" class="pull-left">Total Harga</label>
                                    <div style="padding-left:40px" class="col-md-8">
                                        <input type="text" name="totalHarga" id="totalHarga" class="form-control" placeholder="Total Barang" readonly value="">
                                        <span style="color:red;"><?php echo form_error('totalHarga'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" name="submit" value="Tambah Pengeluaran" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>

<script>
    function fungsiTotal() {
        var jumlah = document.getElementById("jumlah").value;
        var harga = document.getElementById("harga").value;
        document.getElementById("totalHarga").value = jumlah*harga;
    }
</script>