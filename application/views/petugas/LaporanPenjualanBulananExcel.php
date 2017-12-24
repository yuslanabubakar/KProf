<?php
    header("Content-type: application/vnd-ms-excel");

    header("Content-Disposition: attachment; filename=laporanpenjualanbulanan.xls");

    header("Pragma: no-cache");

    header("Expires: 0");
?>

<table id="penjualanTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
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
                <td><?php echo $as->idTransaksi; ?></td>
                <td><?php echo $as->tglTransaksi; ?></td>
                <td><?php echo $as->total; ?></td>
            </tr>

            <?php
            $cekcek = $cekcek + $as->total;
        }
        ?>
    </tbody>
</table>