<?php

require_once "pdf/fpdf.php";

function cek_id(){
  global $link;
  $query = "SELECT MAX(id) AS mak FROM murid";
  $query;
  return result($query);
}

function cari2($cari){
  global $link;
  $query = "SELECT murid.id,murid.nama,ortu.ayah,ortu.ibu,murid.id_spp FROM murid LEFT JOIN ortu ON murid.id=ortu.id WHERE murid.nama LIKE '%$cari%' OR murid.id='%$cari%'";
  return result($query);
}

function cari($cari){
  global $link;
  $query = "SELECT murid.id,murid.nama,murid.alamat,ortu.ayah,ortu.ibu,ortu.tlp FROM murid LEFT JOIN ortu ON murid.id=ortu.id WHERE murid.nama LIKE '%$cari%'";
  return result($query);
}

function cetak($query){
  global $link;
  global $kls;
  $data = array();
  $sql = mysqli_query($query);
  while ($row = mysqli_fetch_assoc($sql)){
  $judul = "Daftar Murid Kelas ".$kls;
  $header = array(array("label"=>"No","length"=>5,"align"=>"L"),
            array("label"=>"Nama","length"=>30,"align"=>"L"),
            array("label"=>"Alamat","length"=>60,"align"=>"L"),
            array("label"=>"Nama Ayah","length"=>20,"align"=>"L"),
            array("label"=>"Nama Ibu","length"=>20,"align"=>"L"),
            array("label"=>"No. Tlp","length"=>20,"align"=>"L")
            );
  $pdf = new PDF();
  $pdf -> AddPage();
  $pdf -> SetFont('Arial','B','16');
  $pdf -> Cell(0,20,$judul,'0',1,'C');
  $pdf -> SetFont('Arial','','10');
  $pdf -> SetFillColor(255,0,0);
  $pdf -> SetTextColor(255);
  $pdf -> SetDrawColor(128,0,0);
  foreach ($header as $kolom) {
    $pdf ->Cell($kolom['length'],5,$kolom['label'],1,'0',$kolom['align'],true);
  }
  $pdf->Ln();
  }
  $pdf->Output();
}
function kls(){
  global $link;
  $query = "SELECT id_spp,kelas FROM spp ORDER BY id_spp ASC";
  return result($query);
}

function em($id,$na,$aa,$tla,$tgla,$aga,$ay,$ib,$pa,$aot,$tlp,$id_spp){
    global $link;
    $query = "UPDATE murid SET nama='$na',alamat='$aa',tl='$tla',tgl='$tgla',agama='$aga',id_spp='$id_spp' WHERE id='$id';UPDATE ortu SET ayah='$ay', ibu='$ib', p_ayah='$pa', alamat='$aot',tlp='$tlp' WHERE id='$id'";
    return mq($query);
}

function tm($nms,$als,$ags,$id_spp,$tls,$tgs,$nma,$nmi,$po,$alo,$tlpo){
  global $link;
  $query = "INSERT INTO murid(nama,alamat,agama,id_spp,tl,tgl) VALUES ('$nms','$als','$ags','$id_spp','$tls','$tgs');INSERT INTO ortu(ayah,ibu,p_ayah,alamat,tlp) VALUES ('$nma','$nmi','$po','$alo','$tlpo');";
  // $query .= "INSERT INTO ortu(ayah,ibu,p_ayah,alamat,tlp) VALUES ('$nma','$nmi','$po','$alo','$tlpo');";
  return mq($query);
}

function dmo($id){
  global $link;
  $query = "DELETE FROM murid WHERE id='$id'; DELETE FROM ortu WHERE id='$id';";
  return mq($query);
}

function tmp_id($id){
  global $link;
  $query = "SELECT murid.id,murid.nama,murid.alamat,murid.tl,murid.tgl,murid.agama,ortu.ayah,ortu.ibu,ortu.p_ayah,ortu.alamat AS aot,ortu.tlp,spp.id_spp,spp.kelas FROM murid LEFT JOIN ortu ON ortu.id=murid.id LEFT JOIN spp ON spp.id_spp=murid.id_spp WHERE murid.id =$id";
  return result($query);

}

function tmp_by_id($kelas){
  global $link;
  $query = "SELECT murid.id,murid.nama,murid.alamat,ortu.ayah,ortu.ibu,ortu.tlp FROM murid LEFT JOIN ortu ON murid.id=ortu.id WHERE murid.id_spp='$kelas'";
  return result($query);

}

function tmp(){
  global $link;
  $query = "SELECT murid.id,murid.nama,murid.alamat,ortu.ayah,ortu.ibu,ortu.tlp FROM murid LEFT JOIN ortu ON murid.id=ortu.id";
  return result($query);

}

function tmp_murid($start, $perPage){
  global $link;
  $query = "SELECT murid.id,murid.nama,murid.alamat,ortu.ayah,ortu.ibu,ortu.tlp FROM murid LEFT JOIN ortu ON murid.id=ortu.id LIMIT $start,$perPage";
  return result($query);

}

function run($query){
  global $link;
  if (mysqli_query($link,$query)) return true;
  else return false;

}

function mq2($query){
  global $link;
  if($link->connect_error){
    die("koneksi Bermasalah pada : ".$link->connect_error);
  }
  if($link->multi_query($query)===TRUE){
    echo "Data berhasil Ditambahkan";
  }else {
    echo "Error pada : ".$query."<br>".$link->error;
  }
}

function mq($query){
    global $link;
    if(!$link){
      die("Koneksi Bermasalah: ".mysqli_connect_error());
    }
    if(mysqli_multi_query($link,$query)){
      header('Location:lm.php');
    }else{
      echo "Error:".$query."<br>".mysqli_error($link);
    }
  mysqli_close($link);
}

function result($query){
  global $link;
  if ($result = mysqli_query($link,$query) or die ('gagal menampilkan data')) {
    return $result;
  }
}

 ?>
