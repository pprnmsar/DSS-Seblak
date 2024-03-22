<?php
include "header.php";
include 'includes/config.php';
$koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
$query = mysqli_query($koneksi,"SELECT * FROM topsis_maxmin");
?>

<!-- Tabel Nilai Max dan Min -->
<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Tabel Nilai Max dan Min</h4>
		</div>
		<!-- <div class="col-md-6 text-right">
			<button onclick="location.href='tambah-kriteria.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
	</div>
	<br>

  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link text-dark" href="rangking.php">Metode SAW</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-dark" href="wp.php">Metode WP</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-dark" data-toggle="tab" href="topsis.php">Metode TOPSIS</a>
    </li>
	<!-- <li class="nav-item">
      <a class="nav-link text-dark" href="multimoora.php">Metode MULTIMOORA</a>
    </li> -->
  </ul>
  <br>

	<table id="tabeldata" width="100%" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Matrix</th>
				<th>ID Kriteria</th>
				<th>Nama Kriteria</th>
                <th>Maximum</th>
                <th>Minimum</th>
				<!-- <th>Aksi</th> -->
			</tr>	
		</thead>
<tbody>
<?php
$no=1;
while ($row = mysqli_fetch_array($query)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?php echo $row['id_matrix'] ?></td>
                <td><?php echo $row['id_kriteria'] ?></td>
                <td><?php echo $row['nm_kriteria'] ?></td>
                <td><?php echo $row['maximum'] ?></td>
                <td><?php echo $row['minimum'] ?></td>
                <!-- <td class="text-center">
					<a href="edit-kriteria.php?id=<?php echo $row['id_matrix'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
					<a href="hapus-kriteria.php?id=<?php echo $row['id_matrix'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
			    </td> -->
            </tr>
<?php
}
?>
</tbody>

		<tfoot>
			<tr>
			</tr>	
		</tfoot>
	</table>
</div>

<!-- Tabel Nilai V Topsis -->
<?php
include "includes/config.php";
$koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
$query = mysqli_query($koneksi,"SELECT * FROM topsis_nilaiv");
?>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Tabel Nilai V</h4>
		</div>
		<!-- <div class="col-md-6 text-right">
			<button onclick="location.href='tambah-kriteria.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
	</div>
	<br>

	<table id="tabeldata" width="100%" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Alternatif</th>
				<th>DPlus</th>
                <th>DMin</th>
                <th>Nilai V</th>
				<!-- <th>Aksi</th> -->
			</tr>	
		</thead>
<tbody>
<?php
$no=1;
while ($row = mysqli_fetch_array($query)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['id_alternatif'] ?></td>
                <td><?php echo $row['dplus'] ?></td>
                <td><?php echo $row['dmin'] ?></td>
                <td><?php echo $row['nilaiv'] ?></td>
                <!-- <td class="text-center">
					<a href="edit-kriteria.php?id=<?php echo $row['id_alternatif'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
					<a href="hapus-kriteria.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
			    </td> -->
            </tr>
<?php
}
?>
</tbody>

		<tfoot>
			<tr>
			</tr>	
		</tfoot>
	</table>
</div>

<!-- Tabel topsis_terbobot -->
<?php
include "includes/config.php";
$koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
$query = mysqli_query($koneksi,"SELECT * FROM topsis_terbobot");
?>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Tabel Normalisasi Terbobot TOPSIS</h4>
		</div>
		<!-- <div class="col-md-6 text-right">
			<button onclick="location.href='tambah-kriteria.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
	</div>
	<br>

	<table id="tabeldata" width="100%" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Matrix</th>
				<th>ID Alternatif</th>
				<th>Nama Alternatif</th>
				<th>ID Kriteria</th>
				<th>Nama Kriteria</th>
				<th>ID Bobot</th>
				<th>Value</th>
				<th>Nilai</th>
				<th>Keterangan</th>
				<th>Normalisasi</th>
				<th>Terbobot</th>
				<!-- <th>Aksi</th> -->
			</tr>	
		</thead>
<tbody>
<?php
$no=1;
while ($row = mysqli_fetch_array($query)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
				<td><?php echo $row['id_matrix'] ?></td>
				<td><?php echo $row['id_alternatif'] ?></td>
                <td><?php echo $row['nm_alternatif'] ?></td>
				<td><?php echo $row['id_kriteria'] ?></td>
                <td><?php echo $row['nm_kriteria'] ?></td>
                <td><?php echo $row['id_bobot'] ?></td>
                <td><?php echo $row['value'] ?></td>
                <td><?php echo $row['nilai'] ?></td>
                <td><?php echo $row['keterangan'] ?></td>
                <td><?php echo $row['normalisasi'] ?></td>
                <td><?php echo $row['terbobot'] ?></td>
                <!-- <td class="text-center">
					<a href="edit-kriteria.php?id=<?php echo $row['id_matrix'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
					<a href="hapus-kriteria.php?id=<?php echo $row['id_matrix'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
			    </td> -->
            </tr>
<?php
}
?>
</tbody>

		<tfoot>
			<tr>
			</tr>	
		</tfoot>
	</table>
</div>

<!-- Tabel wp_pangkat -->
<?php
include "includes/config.php";
$koneksi->query("SET @@sql_mode = SYS.LIST_DROP(@@sql_mode, 'ONLY_FULL_GROUP_BY')");
$query = mysqli_query($koneksi,"SELECT * FROM topsis_pembagi");
?>

<br>
<div class="container">
	<div class="row">
		<div class="col-md-6 text-left">
			<h4>Tabel Pembagi TOPSIS</h4>
		</div>
		<!-- <div class="col-md-6 text-right">
			<button onclick="location.href='tambah-kriteria.php'" class="btn btn-primary">Tambah Data</button>
		</div> -->
	</div>
	<br>

	<table id="tabeldata" width="100%" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Kriteria</th>
				<th>Nama Kriteria</th>
                <th>Bagi</th>
				<!-- <th>Aksi</th> -->
			</tr>	
		</thead>
<tbody>
<?php
$no=1;
while ($row = mysqli_fetch_array($query)){
?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['id_kriteria'] ?></td>
                <td><?php echo $row['nm_kriteria'] ?></td>
                <td><?php echo $row['bagi'] ?></td>
                <!-- <td class="text-center">
					<a href="edit-kriteria.php?id=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>
					<a href="hapus-kriteria.php?id=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="fas fa-trash-alt"></span></a>
			    </td> -->
            </tr>
<?php
}
?>
</tbody>

		<tfoot>
			<tr>
			</tr>	
		</tfoot>
	</table>
</div>

<?php  
include "footer.php";
?>