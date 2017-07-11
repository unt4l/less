<?php
require_once "core/init.php";
$tgl = date('d/m/y');

if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $murid = cari2($cari);
}
 ?>
 <?php include_once 'view/header.php'; ?>
<div class="containter">
  <h1 class="text-center">Tabungan Murid</h1>
  <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1">Klik untuk memilih data</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body">
            <p class="text-right">Tanggal hariini : <?=$tgl;?></p>
            <form method="get">
              <div class="input-group">
                <input type="text" name="cari" placeholder="Masukan NIS/Nama Murid" class="form-control">
                <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
              </div>
            </form>
          </div>
          <div class="panel-footer">
            <div class="table-responsive table-bordered">
              <table class="table">
                <thead>
                  <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Ayah</th>
                    <th>Ibu</th>
                    <th>Pilih Murid</th>
                  </tr>
                </thead>
          <?php while ($row = mysqli_fetch_assoc($murid)): ?>
                  <tbody>
                    <tr>
                      <td><?=$row['id']; ?></td>
                      <td><?=$row['nama']; ?></td>
                      <td><?=$row['id_spp']; ?></td>
                      <td><?=$row['ayah']; ?></td>
                      <td><?=$row['ibu']; ?></td>
                      <td>
                        <a class="btn btn-info" href="det.php?id=<?=$row['id']; ?>" title="Pilih murid untuk menabung"><span class="glyphicon glyphicon-eye-open"></span></a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
          <?php endwhile; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <div class="panel panel-default col-sm-6">
    <div class="panel-heading"><strong>Tambah Tabungan</strong></div>
    <div class="panel-body">
      <div class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">NIS :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="nis" value="" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Nama Siswa :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="nama" value="" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Saldo Tabungan :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="saldo" value="" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Tambah senilai :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="tambah" value=""><br>
              <input type="submit" name="simpan" value="Simpan Tabungan">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="panel panel-default col-sm-6">
    <div class="panel-heading"><strong>Ambil Tabungan</strong></div>
    <div class="panel-body">
      <div class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">NIS :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="nis" value="" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Nama Siswa :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="nama" value="" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Saldo Tabungan :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="saldo" value="" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama">Ambil senilai :</label>
          <div class="col-sm-6">
              <input class="form-control" type="text" name="tambah" value=""><br>
              <input type="submit" name="simpan" value="Simpan Sisa Tabungan">
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
