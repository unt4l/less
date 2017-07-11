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

?>
<?php include_once 'view/header.php'; ?>
  <div class="container-fluid">
    <h1 class="text-center">Data Pribadi Peserta Didik</h1>
    <br><br>
    <div class="form-horizontal">
      <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Nama murid :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="nama" value="<?=$na;?>" disabled>
          </div>
      </div>
      <div class="form-group">
          <label  class="control-label col-sm-3" for="alamat">Alamat murid :</label>
          <div class="col-sm-6">
            <textarea class="form-control" name="alamat" rows="5" disabled><?=$aa;?></textarea>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="tgl">Tempat lahir :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="tmp" value="<?=$tla;?>" disabled>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="tgl">Tanggal Lahir :<br><i class="small">(yyyy-mm-dd)</i> </label>
          <div class="col-sm-3">
            <input type="text" name="tgl" class="tanggal" value="<?=$tgla;?>" disabled>
            </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="agama">Agama :</label>
          <div class="col-sm-3">
              <select class="form-control" name="agama" disabled>
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
              <input class="form-control" type="text" name="ayah" value="<?=$ay?>" disabled>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="ibu">Nama Ibu :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="ibu" value="<?=$ib?>" disabled>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="pekerjaan">Pekerjaan Orangtua :</label>
          <div class="col-sm-3">
            <select class="form-control" name="kerja" disabled>
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
            <textarea class="form-control" name="al_ortu" rows="5" disabled><?=$aot;?></textarea>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="pekerjaan">No. Telp :</label>
          <div class="col-sm-3">
              <input class="form-control" type="text" name="tlp" value="<?=$tlp;?>" disabled>
          </div>
      </div>
      <div class="form-group">
          <label class="control-label col-sm-3" for="kelas">Kelas :</label>
          <div class="col-sm-3">
          <select class="" name="kelas" disabled>
            <?php $data = kls();
            while ($a = mysqli_fetch_assoc($data)):?>
            <option value="<?=$id_spp;?>"><?=$kls;?></option>
            <?php endwhile; ?>
          </select><br></br>
          </div>
      </div>
    </div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.tanggal').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true
            });
        });
    </script>
  </body>
</html>
