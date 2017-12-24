<?php
$dt = new DateTime();
// $namaK = NULL;

$sum = 0;
$qty = $jumlah;
$tgl = $dt->format('Y-m-d');
// $nMeja;
$dataPesanan = array();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaksi Penjualan
            <small>Halaman Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-shopping-bag"></i> Transaksi</a></li>
            <li class="active"> Penjualan</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" method="post" name='process' action='<?php echo base_url(); ?>petugas/Penjualan/Check'>
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-md-8">
                                    <label style="margin-top:6px" class="pull-right">Tanggal</label>
                                </div>
                                <div style="padding-left:0px" class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Tanggal" name="tanggal" id="tanggal" readonly value='<?php echo $tgl; ?>'>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <div class="col-md-8">
                                    <label style="margin-top:6px" class="pull-right">Kasir</label>
                                </div>
                                <div style="padding-left:0px" class="col-md-2">
                                    <?php if ($total_roww > 0) { ?>
                                    <select name="idKaryawan" id="idKaryawan" class="required form-control">
                                            <option value='-'> </option>
                                            <?php foreach ($petugas as $m): ?>
                                                <option value='<?php echo $m->idKaryawan; ?>'><?php echo $m->idKaryawan . " - " . $m->nama; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php }else { ?>
                                        <input class="input-xxlarge focused" type="text" readonly value="Karyawan Belum Ada ! Silahkan Buat Jenis Terlebih Dahulu">
                                    <?php } ?>
                                    <span style="color:red;"><?php echo form_error('idKaryawan'); ?></span>

                                </div>

                            </div>

                          

                            <div class="form-group">
                                <div class="col-md-8">
                                    <label style="margin-top:6px" class="pull-right">Meja</label>
                                </div>
                                <div style="padding-left:0px" class="col-md-4">
                                    <input type="number" class="form-control" name="meja" id="meja" placeholder="Nomor Meja">
                                </div>
                            </div> -->





                            <div class="form-group">
                                <div class="col-md-2">
                                </div>
                                <div style="padding-left:0px" class="col-md-2">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="box-header with-border">
                                    <!-- form start --><h3 class="box-title">Daftar Menu</h3>
                                </div>
                            </div>



                            <table class="table table-striped table-bordered" id="tbInvoice">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Menu</th>
                                        <th>Nama Menu</th>
                                        <th>Jenis</th>
                                        <th>Harga Satuan</th>
                                        <th>Diskon</th>
                                        <th >Jumlah</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($total_row) {
                                        $i = 0;
                                        $ind = 0;
                                        foreach ($menu as $data) {
                                            $idMenu = $data->idBarang;
                                            $nama = $data->namaBarang;
                                            $jenis = $data->namaJenis;
                                            $harga = $data->harga;
                                            ?>
                                            <tr>
                                                <td><?php echo ++$i; ?></td>
                                                <td><?php echo $idMenu; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $jenis; ?></td>
                                                <td><?php echo $harga; ?></td>
                                                <td>

                                                    <input type="number" name="diskon[]" id="diskon" class="form-control"  placeholder="diskon">

                                                </td>
                                                <td>

                                                    <input type="number" name="qty[]" id="qty" class="form-control"  placeholder="qty">

                                                </td>


                                                <?php $ind++; ?>

                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">Data Belum Ada</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                               <input type="submit" name="submit" value="Check" class="btn btn-primary pull-right">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>