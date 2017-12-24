// INVOICE
$(document).ready( function () {
  var table = $('#tbInvoice').dataTable( {
      "language": {
      "paginate": {"first": "Halaman pertama", "last": "Halaman Terakhir", "next": "Selanjutnya", "previous": "Sebelumnya"},
      "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
      "infoEmpty": "Tidak ada produk untuk ditampilkan",
      "infoFiltered": " - difilter _MAX_ produk",
      "sInfoFiltered": "(difilter dari _MAX_ total produk)",
      "emptyTable": "Produk tidak ditemukan",
      "lengthMenu": "Menampilkan _MENU_ produk",
      "loadingRecords": "Harap tunggu ... ...",
      "search": "Cari:",
      "zeroRecords": "Produk tidak ditemukan",
      "sSearchPlaceholder": "Pencarian produk",
      "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ produk",
      },
      "paging": false,
      "searching": false,
      "bSort": false,
      "columnDefs": [
        {
          "targets": [2,4],
          "render" : $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )
        }
      ]
  });

  // VARIABLE
  var table = $('#tbInvoice').DataTable();
  var rowCount = table.rows().count();
  if ( rowCount == 0 ) {
    document.getElementById('btnSimpanTransaksi').disabled = true;
  }
  else {
    document.getElementById('btnSimpanTransaksi').disabled = false;
  }
  // SELECT ROW TABLE INVOICE
  $('#tbInvoice tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
      $(this).removeClass('selected');
      document.getElementById('btnHapusRowPenjualan').disabled = true;
      document.getElementById('btnEditRowPenjualan').disabled = true;
    }
    else {
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
      document.getElementById('btnHapusRowPenjualan').disabled = false;
      document.getElementById('btnEditRowPenjualan').disabled = false;
    }
    rowCount = table.rows().count();
    // BUTTON CETAK
    if ( rowCount == 0 ) {
      document.getElementById('btnSimpanTransaksi').disabled = true;
    }
    else {
      document.getElementById('btnSimpanTransaksi').disabled = false;
    }
  });
  // EDIT BUTTON EVENT
  $('#btnEditRowPenjualan').click(function() {
    data = table.rows('.selected').data();
    // $('#txJumlahProdukUpdatePenjualan').val(data[0][3]);
    // $('#txDiskonProdukUpdatePenjualan').val(data[0][4]);
    // $('#txStokProdukUpdatePenjualan').val(data[0][6]);
  });
  // RESET EDIT PRODUK BUTTON EVENT
  $('#btnResetProdukUpdatePenjualan').on('click', function() {
    data = table.rows('.selected').data();
    // $('#txJumlahProdukUpdatePenjualan').val(data[0][3]);
    // $('#txDiskonProdukUpdatePenjualan').val(data[0][4]);
    // $('#txStokProdukUpdatePenjualan').val(data[0][6]);
    document.getElementById('btnUpdateProdukInvoicePenjualan').disabled = true;
  });
  // UPDATE PRODUK BUTTON EVENT
  $('#btnUpdateProdukInvoicePenjualan').on('click', function() {
    data = table.rows('.selected').data();
    // var pd_jumlah = $('#txJumlahProdukUpdatePenjualan').val();
    // if (pd_jumlah == "") {
    //   pd_jumlah = data[0][3];
    // }
    // var pd_disc = $('#txDiskonProdukUpdatePenjualan').val();
    // if (pd_jumlah == "") {
    //   pd_jumlah = data[0][4];
    // }
    // var pd_subtotal = pd_jumlah * (data[0][2] - pd_disc);
    // var pd_stok = data[0][6];

    // if (pd_jumlah <= pd_stok) {
    //   total_uang_sub = data[0][5];
    //   total_uang_edit = pd_subtotal;
    //   total_uang = (total_uang - total_uang_sub) + total_uang_edit;

    //   $('#txTotalUangPenjualan').val(total_uang);
    //   $('#pTotalUangPenjualan').text(toRp(total_uang));
    //   table.row('.selected').data([
    //     data[0][0],
    //     data[0][1],
    //     data[0][2],
    //     pd_jumlah,
    //     pd_disc,
    //     pd_subtotal,
    //     pd_stok
    //   ]).draw(false);
    //   $('#mdEditProdukInvoicePenjualan').modal("hide");
    // }
    // else {
    //   alert("JUMLAH PRODUK MELEBIHI STOK.");
    //   $('#txJumlahProdukUpdatePenjualan').val(data[0][3]);
    //   $('#txDiskonProdukUpdatePenjualan').val(data[0][4]);
    //   $('#txStokProdukUpdatePenjualan').val(data[0][6]);
    // }
    document.getElementById('btnUpdateProdukInvoicePenjualan').disabled = true;
  });
  // DELETE ROW TABLE INVOICE
  $('#btnHapusRowPenjualan').click( function () {
    data = table.rows('.selected').data();
    // total_uang = total_uang - data[0][5];
    // $('#txTotalUangPenjualan').val(total_uang);
    // $('#pTotalUangPenjualan').text(toRp(total_uang));
    table.row('.selected').remove().draw( false );
    rowCount = table.rows().count();
    // BUTTON CETAK
    if ( rowCount == 0 ) {
      document.getElementById('btnSimpanTransaksi').disabled = true;
    }
    else {
      document.getElementById('btnSimpanTransaksi').disabled = false;
    }
    document.getElementById('btnHapusRowPenjualan').disabled = true;
    document.getElementById('btnEditRowPenjualan').disabled = true;
  });
});

// MENU
$(document).ready( function () {
  var table = $('#tbMenu').dataTable( {
    "language": {
      "paginate": {"first": "Halaman pertama", "last": "Halaman Terakhir", "next": "Selanjutnya", "previous": "Sebelumnya"},
      "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
      "infoEmpty": "Tidak ada produk untuk ditampilkan",
      "infoFiltered": " - difilter _MAX_ produk",
      "sInfoFiltered": "(difilter dari _MAX_ total produk)",
      "emptyTable": "Produk tidak ditemukan",
      "lengthMenu": "Menampilkan _MENU_ produk",
      "loadingRecords": "Harap tunggu ... ...",
      "search": "Cari:",
      "zeroRecords": "Produk tidak ditemukan",
      "sSearchPlaceholder": "Pencarian produk",
      "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ produk",
    },
    "columnDefs": [
      {
        "targets": [3],
        "render" : $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )
      }
    ]
  });

  // VARIABLE
  var table = $('#tbMenu').DataTable();
  // SELECT ROW TABLE CARI PRODUK
  $('#tbMenu tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
      $(this).removeClass('selected');
      document.getElementById('btnPilihMenu').disabled = true;
    }
    else {
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
      document.getElementById('btnPilihMenu').disabled = false;
    }
  });
  // PILIH PRODUK BUTTON EVENT
  $('#btnPilihMenu').click(function() {
    data = table.rows('.selected').data();
    // var getJenisPenjualan = $('#ddJenisPenjualan').val();
    // var pd_barcode = data[0][0];
    // var pd_model = data[0][1];
    // var pd_harga_jual = 0;
    // if (getJenisPenjualan == "Grosir") {
    //   pd_harga_jual = data[0][2];
    // }
    // else if (getJenisPenjualan == "Eceran") {
    //   pd_harga_jual = data[0][3];
    // }
    // else {
    //   pd_harga_jual = 0;
    // }
    // var pd_jumlah = 1;
    // var pd_disc = data[0][4];
    // var pd_subtotal = pd_jumlah * (pd_harga_jual - pd_disc);
    // var pd_stok = data[0][5];
    // var isDuplicate = false;
    // var table2 = $('#tbInvoice').DataTable();
    // data = table2.rows().data();
    // $.each(data, function(i, item) {
    //   if (data[i][0] == pd_barcode) {
    //     isDuplicate = true;
    //   }
    // });

    // if (!isDuplicate) {
    //   if (pd_stok != 0) {
    //     $('#tbInvoice').DataTable().row.add([
    //     pd_barcode,
    //     pd_model,
    //     pd_harga_jual,
    //     pd_jumlah,
    //     pd_disc,
    //     pd_subtotal,
    //     pd_stok
    //     ]).draw();

    //     total_uang = total_uang + pd_subtotal;
    //     $('#txTotalUangPenjualan').val(total_uang);
    //     $('#pTotalUangPenjualan').text(toRp(total_uang));
    //     $('#almdBerhasilPilihProdukPenjualan').show().fadeTo(3000, 500).slideUp(500, function(){
    //       $('#almdBerhasilPilihProdukPenjualan').slideUp(500)});
    //   }
    //   else {
    //     $('#almdGagalPilihProdukPenjualan').show().fadeTo(3000, 500).slideUp(500, function(){
    //       $('#almdGagalPilihProdukPenjualan').slideUp(500)});
    //   }
    // }
    // else {
    //   $('#almdGagal2PilihProdukPenjualan').show().fadeTo(3000, 500).slideUp(500, function(){
    //     $('#almdGagal2PilihProdukPenjualan').slideUp(500)});
    // }
    table.$('tr.selected').removeClass('selected');
    document.getElementById('btnPilihMenu').disabled = true;
    var table2 = $('#tbInvoice').DataTable();
    var rowCount = table2.rows().count();
    if ( rowCount == 0 ) {
      document.getElementById('btnSimpanTransaksi').disabled = true;
    }
    else {
      document.getElementById('btnSimpanTransaksi').disabled = false;
    }
  });
  // CARI PRODUK BUTTON EVENT
  $("#btnMenu").click(function(event) {
    // event.preventDefault();
    // var getting = $.get('lihat_produk/api');

    // getting.done(function(data) {
    //   table.clear().draw();
    //   $.each(data, function(i, item) {
    //     table.row.add([
    //       data[i].fields.pd_barcode,
    //       data[i].fields.pd_model,
    //       data[i].fields.pd_harga_jual_grosir,
    //       data[i].fields.pd_harga_jual_eceran,
    //       data[i].fields.pd_disc,
    //       data[i].fields.pd_stok
    //     ]).draw();
    //   });
    // });
    // getting.fail(function(data) {
    //   alert("TERJADI KESALAHAN, SILAHKAN COBA KEMBALI");
    // })
  });
});

// KASIR
$(document).ready( function () {
  var table = $('#tbKasir').dataTable( {
    "language": {
      "paginate": {"first": "Halaman pertama", "last": "Halaman Terakhir", "next": "Selanjutnya", "previous": "Sebelumnya"},
      "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
      "infoEmpty": "Tidak ada kasir untuk ditampilkan",
      "infoFiltered": " - difilter _MAX_ kasir",
      "sInfoFiltered": "(difilter dari _MAX_ total kasir)",
      "emptyTable": "Kasir tidak ditemukan",
      "lengthMenu": "Menampilkan _MENU_ kasir",
      "loadingRecords": "Harap tunggu ... ...",
      "search": "Cari:",
      "zeroRecords": "Kasir tidak ditemukan",
      "sSearchPlaceholder": "Pencarian kasir",
      "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ kasir",
    }
  });

  // VARIABLE
  var table = $('#tbKasir').DataTable();
  // SELECT ROW TABLE MODAL PILIH PELANGGAN
  $('#tbKasir tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
      $(this).removeClass('selected');
      document.getElementById('btnPilihKasir').disabled = true;
    }
    else {
      table.$('tr.selected').removeClass('selected');
      $(this).addClass('selected');
      document.getElementById('btnPilihKasir').disabled = false;
    }
  });
  // PILIH PELANGGAN BUTTON EVENT
  $('#btnPilihKasir').click(function() {
    data = table.rows('.selected').data();
    // $('#txIdPelangganPenjualan').val(data[0][0]);
    // $('#txNamaPelangganPenjualan').val(data[0][1]);
    // $('#txDiskonPelangganPenjualan').val(data[0][8]);
    // $('#almdBerhasilPilihPelangganPenjualan').show().fadeTo(3000, 500).slideUp(500, function(){
    //   $('#almdBerhasilPilihPelangganPenjualan').slideUp(500)});
    table.$('tr.selected').removeClass('selected');
    document.getElementById('btnPilihKasir').disabled = true;
  });
  // CARI PELANGGAN BUTTON EVENT
  $("#btnCariKasir").click(function(event) {
    // event.preventDefault();
    // var getting = $.get('lihat_pelanggan/api');

    // getting.done(function(data) {
    //   table.clear().draw();
    //   $.each(data, function(i, item) {
    //     table.row.add([
    //       data[i].pk,
    //       data[i].fields.pg_nama,
    //       data[i].fields.pg_alamat,
    //       // data[i].fields.pg_prov,
    //       // data[i].fields.pg_kota,
    //       // data[i].fields.pg_kec,
    //       // data[i].fields.pg_kel,
    //       data[i].fields.pg_telp,
    //       data[i].fields.pg_disc
    //     ]).draw();
    //   });
    // });
    // getting.fail(function(data) {
    //   alert("TERJADI KESALAHAN, SILAHKAN COBA KEMBALI.");
    // })
  });
});