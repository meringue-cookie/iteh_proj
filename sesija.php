<?php
include 'kupacKlasa.php';
session_start();
if(!isset($_SESSION['ulogovaniKupac'])){
  $_SESSION['ulogovaniKupac'] = Kupac::napraviPraznog();
  $_SESSION['kupci'] = [];
}

 ?>
