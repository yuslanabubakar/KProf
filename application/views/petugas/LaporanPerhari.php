<?php ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan
            <small>Halaman Admin</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <!-- form start -->
                    <form role="form" class="form-horizontal" method="post" name='process' >
                        <div class="box-body">

                            <div class="box-header">
                                <h3 class="box-title">Laporan Transaksi Penjualan</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Quantity</th>
                                            <th>Harga</th>
                                            <th>Diskon</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cekcek = 0;
                                        $no = 0;
                                        foreach ($data as $as) {
                                            ?>
                                            <tr>
                                                <td><?php echo ++$no; ?></td>
                                                <td><?php echo $as->namaBarang; ?></td>
                                                <td><?php echo $as->quantity; ?></td>
                                                <td><?php echo $as->harga; ?></td>
                                                <td><?php echo $as->diskon*$as->quantity; ?></td>
                                                <td><?php echo $total = ($as->harga * $as->quantity)-($as->diskon*$as->quantity); ?></td>
                                            </tr>

                                            <?php
                                            $cekcek = $cekcek + $total;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <h4 class="box-title">Total Penjualan Hari  <?php echo $tanga ?> :
                                    <span class="label label-warning" style="font-size:16px;"> Rp. <?php echo number_format($cekcek) ?> </span> </h3>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </form>
                    <div class="box-footer">

                        <button type="submit" id="print"  class="btn btn-default pull-right"> <a href="javascript:window.print();">PRINT</a></button>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
</div>
 <script>
  window.load = print_d();
  function print_d(){
   window.print();
  }
 </script>
<!-- /.content -->
