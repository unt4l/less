<?php
require_once "core/init.php";
$tgl = date('d/m/y');
if (isset($_POST['tambah'])) {
  $nms = $_POST['nama'];
  $als = $_POST['alamat'];
  $ags = $_POST['agama'];
  $id_spp = $_POST['kelas'];
  $tls = $_POST['tmp'];
  $tgs = $_POST['tgl'];
  $nma = $_POST['ayah'];
  $nmi = $_POST['ibu'];
  $po = $_POST['kerja'];
  $alo = $_POST['al_ortu'];
  $tlpo = $_POST['tlp'];
  if (!empty(trim($nms)) && !empty(trim($als))) {
    if (tm($nms,$als,$ags,$id_spp,$tls,$tgs,$nma,$nmi,$po,$alo,$tlpo)) {
      header('Location: tm.php');
    }else{
      $error = 'ada masalah saat menambah data';
    }

  }else{
    $error = 'semua field wajib diisi';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSB Nurbaity Less</title>
    <!-- <link rel="stylesheet" href="js/bootstrap-datepicker3.css"> -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
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
            <li><a href="#">Nilai Murid</a></li>
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
    <h1 class="text-center">Formulir Pendaftaran Murid Baru</h1>
    <br><br>
<div class="panel panel-default col-sm-6">
  <div class="panel-heading text-center"><strong>Data Pribadi Murid</strong></div>
  <div class="panel-body">
    <form role="form" method="post" id="formInput">
      <div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-sm-3" for="kelas">Pilih Kelas :</label>
            <div class="col-sm-3">
            <select class="" name="kelas">
              <?php $data = kls();
              while ($a = mysqli_fetch_assoc($data)):?>
              <option value="<?=$a['id_spp']?>"><?=$a['kelas']?></option>
              <?php endwhile; ?>
            </select><br>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="nama">Nama murid :</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="nama">
            </div>
        </div>
        <div class="form-group">
            <label  class="control-label col-sm-3" for="alamat">Alamat murid :</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="alamat" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tgl">Tempat lahir :</label>
            <div class="col-sm-3">
                <input class="form-control" type="text" name="tmp">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tgl">Tanggal Lahir :</label>
            <div class="col-sm-3">
              <input type="text" name="tgl" class="tanggal" placeholder="thn-bln-tgl">
              </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="jk">Jenis Kelamin :</label>
            <div class="col-sm-3">
                <select class="form-control" name="jk">
                  <option value=""></option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="agama">Agama :</label>
            <div class="col-sm-3">
                <select class="form-control" name="agama">
                  <option value=""></option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen Protestan">Kristen Protestan</option>
                  <option value="Kristen Katolik">Kristen Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Budha">Budha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="ayah">Nama Ayah :</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="ayah">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="ibu">Nama Ibu :</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="ibu">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="pekerjaan">Pekerjaan :</label>
            <div class="col-sm-3">
              <select class="form-control" name="kerja">
                <option value=""></option>
                <option value="Tani">Tani</option>
                <option value="Karyawan Swasta">Karyawan Swasta</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="PNS">PNS</option>
                <option value="TNI/POLISI">TNI/POLISI</option>
                <option value="Perangkat Desa">Perangkat Desa</option>
                <option value="Buruh">Buruh</option>
                <option value="Nelayan">Nelayan</option>
                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                <option value="Lain-lain">Lain-lain</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label  class="control-label col-sm-3" for="alamat">Alamat Ortu :</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="al_ortu" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="tlp">No. Telp :</label>
            <div class="col-sm-3">
                <input class="form-control" type="text" name="tlp">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="sekolah">Asal Sekolah :</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" name="sekolah"><br>
                <input type="submit" name="tambah" class="btn btn-primary" value="Simpan Data" title="simpan data siswa baru">
            </div>
        </div>

      </div>
  </form>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( '.tanggal' ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"
    });
  } );
  </script>

  <div class="panel panel-default col-sm-6">
    <div class="panel-heading text-center"><strong>Rincian Biaya</strong></div>
    <div class="panel-body">
      <p class="text-right">Tanggal hariini : <?=$tgl;?></p>
      <div class="form-group">
          <label class="control-label col-sm-3" for="dft">NIS :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="nis" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="dft">Pendaftaran :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="dft" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="spp">SPP :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="spp" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="kas">Kas :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="kas" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="krt">Kartu SPP :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="krt_spp" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="seragam">Seragam :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="seragam" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="sm">Seragam Muslim :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="seragam_muslim" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="kaos">Kaos :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="kaos" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="lks">LKS :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="lks" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="bp">Buku Paket :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="buku_paket" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="pr">Buku PR :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="buku_pr" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="tot">Total Biaya :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="tot" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="spp">No. Transaksi :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="id_trs" disabled="">
          </div>
      </div><br></br>
      <div class="form-group">
          <label class="control-label col-sm-3" for="tlp">Jml Dibayarkan :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="bayar"><br>
              <input type="submit" name="simp" value="Simpan Pembayaran" class="btn btn-primary" title="simpan data pembayaran">
          </div>
      </div><br></br>
      <div class="form-group">
        <div class="col-sm-3">
          <a href="#" class="btn btn-lg" title="cetak bukti pembayaran"><span class="glyphicon glyphicon-print"></span></a>
        </div>
      </div><br></br>
    </div>
  </div>
</div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datepicker({
                changeMonth: true,
                changeYear: true,
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });
    </script> -->
  </body>
</html>
