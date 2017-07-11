<?php
require_once "core/init.php";

$error ='';

$id = $_GET['id'];
if (isset($_GET['id'])){
  $article = dmo($id);
  while($row = mysqli_fetch_assoc($article)){
  }
}
    if (dmo($id)) {
    }else{
      $error = 'ada masalah saat hapus data';
    }

 ?>
