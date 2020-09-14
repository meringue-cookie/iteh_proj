<?php
include 'konekcija.php';
$id= $_GET['id'];
$konekcija->query("DELETE FROM kampanja where kampanjaID = $id");
header("Location:index.php");
 ?>
