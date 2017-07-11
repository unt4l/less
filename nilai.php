<?php require_once 'core/init.php';
error_reporting(0);
if(isset($_POST['kelas'])){
  $kelas = $_POST['kelas'];
  $murid = tmp_by_id($kelas);
}
$id = $_GET['id'];
if (isset($_GET['id'])){
  $article = tmp_id($id);
  while($row = mysqli_fetch_assoc($article)){
  $na = $row['nama'];
  $aa = $row['alamat'];
  $tla = $row['tl'];
  $tgla = $row['tgl'];
  $aga = $row['agama'];
  $ay = $row['ayah'];
  $ib = $row['ibu'];
  $pa = $row['p_ayah'];
  $aot = $row['aot'];
  $tlp = $row['tlp'];
  $id_spp =  $row['id_spp'];
  $kls =  $row['kelas'];
  }
}
 ?>
<?php include_once 'view/header.php'; ?>
<div class="container-fluid">
  <h2 class="text-center"><strong>Input Nilai Murid</strong></h2>
  <div class="panel-default">
    <div class="panel panel-body">
      <form class="" method="post">
        <strong>Pilih Kelas Untuk Ditampilkan : </strong>
        <select class="" name="kelas">
          <?php $data = kls();
          while ($a = mysqli_fetch_assoc($data)):?>
          <option value="<?=$a['id_spp']?>"><?=$a['kelas']?></option>
          <?php endwhile; ?>
        </select>
        <input type="submit" name="tampil" value="Tampilkan">
      </form>
      <div class="table-responsive table-bordered">
        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Ayah</th>
              <th>Ibu</th>
              <th>No. Tlp</th>
              <th>Pilih Murid</th>
            </tr>
          </thead>
    <?php while ($row = mysqli_fetch_assoc($murid)): ?>
            <tbody>
              <tr>
                <td><?=$row['nama']; ?></td>
                <td><?=$row['alamat']; ?></td>
                <td><?=$row['ayah']; ?></td>
                <td><?=$row['ibu']; ?></td>
                <td><?=$row['tlp']; ?></td>
                <td><a class="btn btn-info" href="nilai.php?id=<?=$row['id']; ?>" title="Lihat Rincian Data"><span class="glyphicon glyphicon-eye-open"></span></a></td>
              </tr>
            </tbody>
    <?php endwhile; ?>
        </table>
      </div>
    </div>
  </div>

<div class="panel panel-default">
  <div class="panel-heading">
    Inputkan Nilai Murid
  </div>
  <div class="panel-body">
    <form class="" method="post">
      <form class="form-group"method="post">
        <label for="Nama Murid">NIS :</label>
        <input type="text" name="nama" value="<?=$id;?>" disabled>
        <label for="Nama Murid">Nama murid :</label>
        <input type="text" name="nama" value="<?=$na;?>" disabled>
        <label for="Nama Murid">Kelas murid :</label>
        <input type="text" name="kelas" value="<?=$kls;?>" disabled><br></br>
        <div class="panel panel-primary col-sm-6">
          <div class="panel-heading">
            <strong>PKN</strong>
          </div>
          <div class="panel-body">
            <label for="uts">Tugas1 : </label>
            <input type="text" name="t1" value="">
            <label for="uts">Tugas2 : </label>
            <input type="text" name="t2" value="">
            <label for="uts">Tugas3 : </label>
            <input type="text" name="t3" value=""><br></br>
            <label for="uts">Formatif1 : </label>
            <input type="text" name="f1" value="">
            <label for="uts">Formatif2 : </label>
            <input type="text" name="f2" value="">
            <label for="uts">Formatif3 : </label>
            <input type="text" name="f3" value=""><br></br>
            <label for="uts">UTS : </label>
            <input type="text" name="uts" value="">
            <label for="uts">UAS : </label>
            <input type="text" name="uas" value=""></br>
            <input type="submit" name="simpanpkn" value="Simpan NIlai PKN">
          </div>
        </div>
        <div class="panel panel-primary col-sm-6">
          <div class="panel-heading">
            <strong>Bhs. Indonesia</strong>
          </div>
          <div class="panel-body">
            <label for="uts">Tugas1 : </label>
            <input type="text" name="t1" value="">
            <label for="uts">Tugas2 : </label>
            <input type="text" name="t2" value="">
            <label for="uts">Tugas3 : </label>
            <input type="text" name="t3" value=""><br></br>
            <label for="uts">Formatif1 : </label>
            <input type="text" name="f1" value="">
            <label for="uts">Formatif2 : </label>
            <input type="text" name="f2" value="">
            <label for="uts">Formatif3 : </label>
            <input type="text" name="f3" value=""><br></br>
            <label for="uts">UTS : </label>
            <input type="text" name="uts" value="">
            <label for="uts">UAS : </label>
            <input type="text" name="uas" value=""></br>
            <input type="submit" name="simpanpkn" value="Simpan NIlai BI">
          </div>
        </div><div class="panel panel-primary col-sm-6">
          <div class="panel-heading">
            <strong>Matematika</strong>
          </div>
          <div class="panel-body">
            <label for="uts">Tugas1 : </label>
            <input type="text" name="t1" value="">
            <label for="uts">Tugas2 : </label>
            <input type="text" name="t2" value="">
            <label for="uts">Tugas3 : </label>
            <input type="text" name="t3" value=""><br></br>
            <label for="uts">Formatif1 : </label>
            <input type="text" name="f1" value="">
            <label for="uts">Formatif2 : </label>
            <input type="text" name="f2" value="">
            <label for="uts">Formatif3 : </label>
            <input type="text" name="f3" value=""><br></br>
            <label for="uts">UTS : </label>
            <input type="text" name="uts" value="">
            <label for="uts">UAS : </label>
            <input type="text" name="uas" value=""></br>
            <input type="submit" name="simpanpkn" value="Simpan NIlai MTK">
          </div>
        </div><div class="panel panel-primary col-sm-6">
          <div class="panel-heading">
            <strong>IPA</strong>
          </div>
          <div class="panel-body">
            <label for="uts">Tugas1 : </label>
            <input type="text" name="t1" value="">
            <label for="uts">Tugas2 : </label>
            <input type="text" name="t2" value="">
            <label for="uts">Tugas3 : </label>
            <input type="text" name="t3" value=""><br></br>
            <label for="uts">Formatif1 : </label>
            <input type="text" name="f1" value="">
            <label for="uts">Formatif2 : </label>
            <input type="text" name="f2" value="">
            <label for="uts">Formatif3 : </label>
            <input type="text" name="f3" value=""><br></br>
            <label for="uts">UTS : </label>
            <input type="text" name="uts" value="">
            <label for="uts">UAS : </label>
            <input type="text" name="uas" value=""></br>
            <input type="submit" name="simpanpkn" value="Simpan NIlai IPA">
          </div>
        </div><div class="panel panel-primary col-sm-6">
          <div class="panel-heading">
            <strong>IPS</strong>
          </div>
          <div class="panel-body">
            <label for="uts">Tugas1 : </label>
            <input type="text" name="t1" value="">
            <label for="uts">Tugas2 : </label>
            <input type="text" name="t2" value="">
            <label for="uts">Tugas3 : </label>
            <input type="text" name="t3" value=""><br></br>
            <label for="uts">Formatif1 : </label>
            <input type="text" name="f1" value="">
            <label for="uts">Formatif2 : </label>
            <input type="text" name="f2" value="">
            <label for="uts">Formatif3 : </label>
            <input type="text" name="f3" value=""><br></br>
            <label for="uts">UTS : </label>
            <input type="text" name="uts" value="">
            <label for="uts">UAS : </label>
            <input type="text" name="uas" value=""></br>
            <input type="submit" name="simpanpkn" value="Simpan NIlai IPS">
          </div>
        </div>
      </form>
    </form>
  </div>
</div>

  </form>
</div>
