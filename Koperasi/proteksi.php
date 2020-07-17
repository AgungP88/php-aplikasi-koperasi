<?php
include'koneksi.php';
session_start();
if(empty($_SESSION["username"])) {
  header("location:index.php");
  $user = $_SESSION["username"];
}
?>
