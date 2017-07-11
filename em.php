<?php
require_once "core/init.php";

$error ='';
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

if(isset($_POST['submit'])){
  $na = $_POST['nama'];
  $aa = $_POST['alamat'];
  $tla = $_POST['tl'];
  $tgla = $_POST['tgl'];
  $aga = $_POST['agama'];
  $ay = $_POST['ayah'];
  $ib = $_POST['ibu'];
  $pa = $_POST['p_ayah'];
  $aot = $_POST['aot'];
  $tlp = $_POST['tlp'];
  $id_spp =  $_POST['id_spp'];
  $kls =  $_POST['kelas'];
if (!empty(trim($na)) && !empty(trim($aa))) {
  if (em($id,$na,$$aa,$tla,$tgla,$aga,$ay,$ib,$pa,$aot,$tlp,$id_spp)) {
      header('Location: lm.php');
    }else{
      $error = 'ada masalah saat mengubah data';
    }

    }else{
      $error = 'judul dan konten wajib diisi';
    }
}

?>
<!DOCTYPE html>
<?php include_once 'view/header.php'; ?>

  <div class="container-fluid">
    <h1 class="text-center">Data Pribadi Peserta Didik</h1>
    <br><br>
  <form role="form" method="post" id="formInput">
    <div class="form-horizontal">
      <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Nama murid :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="nama" value="<?=$na;?>">
          </div>
      </div>
      <div class="form-group">
          <label  class="control-label col-sm-3" for="alamat">Alamat murid :</label>
          <div class="col-sm-6">
            <textarea class="form-control" name="alamat" rows="5"><?=$aa;?></textarea>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="tgl">Tempat lahir :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="tmp" value="<?=$tla;?>">
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="tgl">Tanggal Lahir :</label>
          <div class="col-sm-3">
            <input type="text" name="tgl" class="tanggal" value="<?=$tgla;?>">
            </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="agama">Agama :</label>
          <div class="col-sm-3">
              <select class="form-control" name="agama">
                <option value=""><?=$aga;?></option>
                <option value="">Islam</option>
                <option value="">Kristen Protestan</option>
                <option value="">Kristen Katolik</option>
                <option value="">Hindu</option>
                <option value="">Budha</option>
                <option value="">Konghucu</option>
              </select>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="ayah">Nama Ayah :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="ayah" value="<?=$ay?>">
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="ibu">Nama Ibu :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="ibu" value="<?=$ib?>">
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="pekerjaan">Pekerjaan Orangtua :</label>
          <div class="col-sm-3">
            <select class="form-control" name="kerja">
              <option value=""><?=$pa;?></option>
              <option value="">Tani</option>
              <option value="">Karyawan Swasta</option>
              <option value="">Wiraswasta</option>
              <option value="">PNS</option>
              <option value="">TNI/POLISI</option>
              <option value="">Perangkat Desa</option>
              <option value="">Buruh</option>
              <option value="">Nelayan</option>
              <option value="">Ibu Rumah Tangga</option>
              <option value="">Lain-lain</option>
            </select>
          </div>
      </div>
      <div class="form-group">
          <label  class="control-label col-sm-3" for="alamat">Alamat Orangtua :</label>
          <div class="col-sm-6">
            <textarea class="form-control" name="al_ortu" rows="5"><?=$aot;?></textarea>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="pekerjaan">No. Telp :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="tlp" value="<?=$tlp;?>">
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="kelas">Kelas :</label>
          <div class="col-sm-3">
          <select class="" name="kelas">
            <option value="<?=$id_spp;?>"><?=$kls;?></option>
            <?php $data = kls();
            while ($a = mysqli_fetch_assoc($data)):?>
            <option value="<?=$a['id_spp'];?>"><?=$a['kelas'];?></option>
            <?php endwhile; ?>
          </select><br></br>
          <input type="submit" name="submit" class="btn btn-warning" value="Ubah Data Murid"></input>
          </div>
      </div>
    </div>
  </form>
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
  </body>
</html>
