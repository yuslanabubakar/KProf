<?php
$dt = new DateTime();
// $namaK = $kary->nama;
// $idK = $kary->idKaryawan;
$tgl = $dt->format('Y-m-d');
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
                    <form role="form" class="form-horizontal" method="post" name='process' action='<?php echo base_url(); ?>petugas/Penjualan/AddPesan/'>
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
                                <div style="padding-left:0px" class="col-md-4">
                                    <input type="hidden" class="form-control" placeholder="idKaryawan" name="idKaryawan" id="idKaryawan" readonly value='<?php echo $idK; ?>'>
                                    <input type="text" class="form-control" placeholder="nm" name="nm" id="nm" readonly value='<?php echo $namaK; ?>'>
                                </div>

                            </div>


                            <div class="form-group">
                                <div class="col-md-8">
                                    <label style="margin-top:6px" class="pull-right">Meja</label>
                                </div>
                                <div style="padding-left:0px" class="col-md-4">
                                    <input type="number" readonly class="form-control" id="meja" name="meja"placeholder="Nomor Meja"value="<?php echo $meja; ?>">
                                </div>
                            </div> -->





                            <div class="form-group">
                                <div class="col-md-2">
                                </div>
                                <div style="padding-left:0px" class="col-md-2">
                                </div>
                                <div class="col-md-4"></div>
                                <div class="box-header with-border">
                                    <!-- form start --><h3 class="box-title">Daftar Pesanan</h3>
                                </div>
                            </div>



                            <table class="table table-striped table-bordered" id="tbInvoice">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Menu</th>
                                        <th>Nama Menu</th>
                                        <th>Harga Satuan</th>
                                        <th>Diskon</th>
                                        <th >Jumlah</th>
                                        <th>Sub Total</th>

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
                                            <input type="hidden" readonly class="form-control" name="dtDiskon[]"id="dtDiskon"value="<?php echo $dataDiskon[$ind]; ?>"> 
                                            <input type="hidden" readonly class="form-control" name="dt[]"id="dt"value="<?php echo $dataPesan[$ind]; ?>">
                                            <?php
                                            if($dataPesan[$ind]!=NULL){
                                            ?> 
                                            <tr>
                                                <td><?php echo ++$i; ?></td>
                                                <td><?php echo $idMenu; ?></td> 
                                                <td><?php echo $nama; ?></td> 
                                                <td><?php echo $harga; ?></td>
                                                <td> 
                                                     
                                                    <input type="number" name="diskon" readonly id="diskon" class="form-control" value="<?php echo $dataDiskon[$ind] ?>" >
                                                    <input type="hidden" readonly class="form-control" name="dataDiskon[]"id="dataDiskon"value="<?php echo $dataDiskon[$ind]; ?>">
                                                </td>
                                                <td> 
                                                     
                                                    <input type="number" name="qty" readonly id="qty" class="form-control" value="<?php echo $dataPesan[$ind] ?>" >
                                                    <input type="hidden" readonly class="form-control" name="dataPesan[]"id="dataPesan"value="<?php echo $dataPesan[$ind]; ?>">
                                                </td>

                                                <td><?php echo ($harga * $dataPesan[$ind]) - ($dataDiskon[$ind]*$dataPesan[$ind]); ?></td>
                                                <?php $sum = $sum + (($harga * $dataPesan[$ind]) - ($dataDiskon[$ind]*$dataPesan[$ind])); ?>

                                                

                                            </tr>
                                            
                                            <?php
                                            }
                                            
                                            $ind++; 
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
                            <div style="margin-bottom:5px" class="form-group">
                                <div class="col-md-12">
                                    <p style="text-align:center; background:#00a65a; font-size:75px">
                                        Rp <?php echo $sum ?>,-
                                        <input type="hidden" readonly class="form-control" name="sum"id="sum" value="<?php echo $sum; ?>">

                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                            <button id="back" type="submit" class="btn btn-default pull-left"><a href="javascript:window.history.go(-1);">PREVIOUS</a></button>
                            <button id="btnSimpanTransaksi" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check-circle"></i> SIMPAN TRANSAKSI</button>
                            <button type="submit" id="print"  class="btn btn-default pull-right"> <a href="javascript:window.print();">PRINT</a></button>
                    </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>