<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Menu
        <small>Halaman Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-list-alt"></i> Menu</a></li>
        <li class="active"> Daftar Menu</a></li>
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
            <form role="form" class="form-horizontal">
              <div class="box-body">
               <!--    <?php echo anchor('petugas/Menu/Add/', 'Add Menu', array('class' => 'btn btn-primary pull-left')); ?>
                  <br><br>-->
 <table class="table table-striped table-bordered" id="tbInvoice">
                          <thead>
                            <tr>
                              <th>No</th>
                              
                              <th>Nama Menu</th>
                              <th>Jenis</th>
                              <th>Harga Satuan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php
                        if ($total_row) {
                            $i = 0;
                            foreach ($menu as $data) {
                                $idMenu = $data->idBarang;
                                $nama = $data->namaBarang;
                                $jenis = $data->namaJenis;
                                $harga = $data->harga;
                                
                                ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $jenis; ?></td>
                                    <td><?php echo $harga; ?></td>
                                    
                                    <td>
                                         <?php echo anchor('petugas/Menu/Edit/' . $idMenu, ' Edit', array('class' => 'btn btn-default col-md-4 fa fa-edit')); ?>
                                        <?php echo anchor('petugas/Menu/Delete/' . $idMenu, ' Delete', array('class' => 'btn btn-danger col-md-4 fa fa-close')); ?>
                                           </td>
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
                      
                   </form>
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>