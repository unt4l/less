<?php
require_once "core/init.php";
// $murid  = tmp_murid();
if(isset($_GET['kelas'])){
  $kelas = $_GET['kelas'];
  $murid = tmp_by_id($kelas);
}
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $murid = cari2($cari);
}

$perPage =10;
$page = isset($_GET["halaman"])?(int)$_GET["halaman"] : 1;
// die($page);
$start =($page>1)?($page * $perPage) -$perPage : 0;
$murid = tmp_murid($start,$perPage);
$all = "SELECT * FROM murid";
$result = mysqli_query($link,$all);
$total = mysqli_num_rows($result);

$pages = ceil($total/$perPage);
//$kls = $_GET['kls'];
 ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Tes Program 1.1</title> -->
    <title>PSB Nurbaity Less</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button type="button"class="navbar-toggle" data-toggle="collapse" data-target="#dt">
          <span class="glyphicon glyphicon-menu-hamburger"></span>
        </button>
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-education">Nurbaity Less</span></a>
      </div>
  <div class="collapse navbar-collapse" id="dt">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user">Murid</span></a>
          <ul class="dropdown-menu">
            <li><a href="lm.php">Data Murid</a></li>
            <li><a href="tm.php">Daftar Baru</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-bookmark">Kelas</span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Pra Sekolah A</a></li>
            <li><a href="#">Pra Sekolah B</a></li>
            <li><a href="#">Pra Sekolah C</a></li>
            <li><a href="#">Pra Sekolah D</a></li>
            <li><a href="#">Privat Pra Sekolah</a></li>
            <li><a href="#">SD Tingkat 1</a></li>
            <li><a href="#">SD Tingkat 2</a></li>
            <li><a href="#">SD Tingkat 3</a></li>
            <li><a href="#">SD Tingkat 4</a></li>
            <li><a href="#">SD Tingkat 5</a></li>
            <li><a href="#">Privat SD Tingkat 1-5</a></li>
            <li><a href="#">SD Tingkat 6</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-tasks">Nilai</span></a>
          <ul class="dropdown-menu">
            <li><a href="nilai.php">Nilai Murid</a></li>
            <li><a href="#">KKM Mapel</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-usd">Keuangan</span></a>
          <ul class="dropdown-menu">
            <li><a href="tabung.php">Tabungan</a></li>
            <li><a href="#">SPP Bulanan</a></li>
            <li><a href="#">Uang Amal</a></li>
            <li><a href="#">Kas</a></li>
            <li><a href="#">Ujian & Daftar Ulang</a></li>
          </ul>
        </li>
        <li><a href="#"><span class="glyphicon glyphicon-briefcase">Keorganisasian</span></a></li>
      </ul>
    </div>
  </nav>
<div class="container-fluid">
<h1 class="text-center">Data Pribadi Murid</h1>
<div class="panel panel-default">
  <div class="panel-heading">
      <strong>Pilih Kelas Untuk Ditampilkan : </strong>
      <select class="" name="kelas">
        <?php $data = kls();
        while ($a = mysqli_fetch_assoc($data)):?>
        <option value="<?=$a['id_spp']?>"><?=$a['kelas']?></option>
        <?php endwhile; ?>
      </select>
      <form method="get" class="col-sm-3 navbar-right">
        <div class="input-group">
          <input type="text" name="cari" placeholder="ketik untuk mencari" class="form-control">
          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        </div>
      </form>
  </div>
</div>
<div class="panel panel-danger">
  <div class="panel-body">
  <div class="table-responsive table-bordered">
    <table class="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Ayah</th>
          <th>Ibu</th>
          <th>No. Tlp</th>
          <th>Pilihan</th>
        </tr>
      </thead>
<?php while ($row = mysqli_fetch_assoc($murid)):?>
        <tbody>
          <tr>
            <td><?=$row['nama']; ?></td>
            <td><?=$row['alamat']; ?></td>
            <td><?=$row['ayah']; ?></td>
            <td><?=$row['ibu']; ?></td>
            <td><?=$row['tlp']; ?></td>
            <td>
              <a class="btn btn-info" href="det.php?id=<?=$row['id']; ?>" title="Lihat Rincian Data"><span class="glyphicon glyphicon-eye-open"></span></a>
              <a class="btn btn-warning" href="em.php?id=<?=$row['id']; ?>" title="Ubah Data Siswa"><span class="glyphicon glyphicon-pencil"></span></a>
              <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal1" title="Hapus Data Siswa"><span class="glyphicon glyphicon-trash"></span></a>
              <!-- <button type="button" class="btn btn-danger" name="hapus" data-toggle="modal" data-target="#modal1">Hapus</button> -->
              <div class="modal fade" id="modal1" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-tittle">Konfirmasi Hapus Data</h4>
                    </div>
                    <div class="modal-body">
                      <p>Yakin akan menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                      <a href="del.php?id=<?=$row['id']; ?>" class="btn btn-success pull-left"><span class="glyphicon glyphicon-ok"></span>Ya</a>
                      <!-- <div class="modal fade" id="modal2" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-body">
                              <h4>Berhasil menghapus data</h4>
                              <a href="#" type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-ok"></span>Ya</a>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <a href="#" type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Batal</a>
                      <!-- <button type="button" class="btn btn-success pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-ok"></span>Ya</button>
                      <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Batal</button> -->
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
<?php endwhile; ?>
    </table>
  </div>
<div class="text-center">
  <?php for($i=1;$i<=$pages; $i++){ ?>
    <a href="?halaman=<? echo $i?>"><? echo $i?></a>
    <?php } ?>
</div>
</div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
