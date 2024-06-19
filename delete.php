<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = "DELETE FROM users WHERE id = $id";
$result = mysqli_query($koneksi, $data);
if ($result) {
  header('location: index.php');
}
