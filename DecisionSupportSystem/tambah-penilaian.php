<?php
include "header.php";
include "includes/config.php";

// code insert data
if ($_POST && isset($_POST['b']) && isset($_POST['s'])) {
    $selectedAlternatif = $_POST['a'];
    $selectedBobot = $_POST['b'];
    $selectedSkala = $_POST['s'];

    // Validasi apakah id_bobot yang diinput ada dalam tabel bobot
    $checkBobot = mysqli_query($koneksi, "SELECT * FROM bobot WHERE id_bobot = '$selectedBobot'");

    if (mysqli_num_rows($checkBobot) > 0) {
        // Jika id_bobot valid, jalankan query INSERT
        $insert = mysqli_query($koneksi, "INSERT INTO matrixkeputusan (id_alternatif, id_bobot, id_skala) VALUES ('$selectedAlternatif','$selectedBobot','$selectedSkala')");

        if ($insert) {
            echo "<script>location.href='penilaian.php'</script>";
        } else {
            echo "Gagal: " . mysqli_error($koneksi);
        }
    } else {
        echo "Id Bobot tidak valid.";
    }
}
?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 text-left">
            <h4>Form Tambah Penilaian</h4>
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <br><br>
    <form method="POST" action="">
        <div class="form-group row">
            <label for="a" class="col-sm-2 col-form-label">ID Alternatif</label>
            <div class="col-sm-10">
                <select class="form-control" id="a" name="a">
                    <?php
                    $queryAlternatif = mysqli_query($koneksi, "SELECT * FROM alternatif");
                    while ($row = mysqli_fetch_assoc($queryAlternatif)) {
                        echo "<option value='" . $row['id_alternatif'] . "'>" . $row['id_alternatif'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="b" class="col-sm-2 col-form-label">ID Bobot</label>
            <div class="col-sm-10">
                <select class="form-control" id="b" name="b">
                    <?php
                    $queryBobot = mysqli_query($koneksi, "SELECT * FROM bobot");
                    while ($row = mysqli_fetch_assoc($queryBobot)) {
                        echo "<option value='" . $row['id_bobot'] . "'>" . $row['id_bobot'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="s" class="col-sm-2 col-form-label">ID Skala</label>
            <div class="col-sm-10">
                <select class="form-control" id="s" name="s">
                    <?php
                    $querySkala = mysqli_query($koneksi, "SELECT * FROM skala");
                    while ($row = mysqli_fetch_assoc($querySkala)) {
                        echo "<option value='" . $row['id_skala'] . "'>" . $row['id_skala'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" onclick="location.href='penilaian.php'" class="btn btn-success">Kembali</button>
            </div>
        </div>
    </form>
</div>