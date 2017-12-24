<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Laporan Transaksi Harian
            <small> Pelaporan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-calendar"></i>Home</a></li>
            <li class="active">Laporan Harian Transaksi Penjualan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <!-- <section class="col-lg-6 connectedSortable">
    
            </section> -->
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-7 connectedSortable">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Pilih Hari Pelaporan</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="LaporanPerhari/cariTanggal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputID3" class="col-sm-2 control-label">Hari </label>
                                <div class="col-sm-10">
                                    <div id="datetimepicker"class="col-md-4">
                                        <input type="text" id="datepicker" name="hari" class="date-own" data-language='en'
                                               data-min-view="days" data-view="days" data-date-format="dd MM yyyy" placeholder="hari" >
                                        <script type="text/javascript">
                                            $(".date-own").datepicker({
                                                format: "dd MM yyyy",
                                                viewMode: "days",
                                                minViewMode: "days"
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right">SEARCH</button>
                            </div>
                            <!-- /.box-footer -->
                    </form>
                </div>
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
</div>
