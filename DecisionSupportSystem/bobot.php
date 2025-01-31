<?php
include "header.php";
include "includes/config.php";

$querykr = mysqli_query($koneksi, "SELECT b.id_bobot, b.id_kriteria, b.value, k.nm_kriteria 
                                    FROM bobot b
                                    INNER JOIN kriteria k ON b.id_kriteria = k.id_kriteria");

?>

<br>
<div class="tab-content">
    <div id="nk" class="container tab-pane active"><br>
        <div class="row">
            <div class="col-md-6 text-left">
                <h4>Data Nilai Bobot</h4>
            </div>
            <div class="col-md-6 text-right">
                <button onclick="location.href='tambah-bobot.php'" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
        <br>
        <table id="tabeldata" width="100%" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Bobot</th>
                    <th>Id Kriteria</th>
                    <th>Value</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_array($querykr)) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['id_bobot'] ?></td>
                        <td><?php echo $row['id_kriteria'] . " : " . $row['nm_kriteria'] ?></td>
                        <td><?php echo $row['value'] ?></td>
                        <td class="text-center">
                            <a href="edit-bobot.php?id=<?php echo $row['id_bobot'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
                            <a href="hapus-bobot.php?id=<?php echo $row['id_bobot'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <!-- <th>No</th>
                    <th>Keterangan Nilai</th>
                    <th>Jumlah</th>
                    <th>Aksi</th> -->
                </tr>
            </tfoot>
        </table>
    </div>

    <?php
    include "footer.php";
    ?>