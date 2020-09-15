<?php
include 'konekcija.php';
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Greška prilikom unosa. Fajl sa tim imenom već postoji, pokušajte ponovo.";
}else{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $naziv = $_POST['naziv'];
      $cena = $_POST['cena'];
      $slika = basename($_FILES["fileToUpload"]["name"]);
      if($konekcija->query("INSERT INTO proizvod(naziv,cena,slika) VALUES ('$naziv',$cena,'$slika')")){
        header("Location:index.php");
      }else{
        echo("Neuspesno ubacivanje u bazu");
      }
  }
}

?>
