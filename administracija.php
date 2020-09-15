<?php

include 'sesija.php';
include 'konekcija.php';

$upit = "SELECT * FROM proizvod";
$rez = $konekcija->query($upit);
$niz = [];
while($red = $rez->fetch_assoc()){
  array_push($niz,$red);
}

$upit1 = "SELECT * FROM kupac";
$rez = $konekcija->query($upit1);
$nizKupaca = [];
while($red = $rez->fetch_assoc()){
  array_push($nizKupaca,$red);
}
$poruka = "";
if(isset($_POST['sacuvajKupca'])){
  array_push($_SESSION['kupci'],$_POST['kupac']);
}



if(isset($_POST['sacuvaj'])){
  $naziv = trim($_POST['naziv']);
  $datum = trim($_POST['datum']);
  $popust = trim($_POST['popust']);
  $proizvod = trim($_POST['proizvod']);
  $upitsac = "INSERT INTO kampanja(nazivKampanje,popust,vaziDo,proizvodID) VALUES ('$naziv',$popust,'$datum',$proizvod)";
  if($konekcija->query($upitsac)){
    $id = $konekcija->insert_id;
    foreach($_SESSION['kupci'] as $n){
      $idkupca = $n['kupacID'];
      $upitsac2 = "INSERT INTO stavkekampanje(kampanjaID,kupacID) VALUES ($id,$idkupca)";
        $konekcija->query($upitsac2);
    }
    $_SESSION['kupci'] = [];
    $poruka = "Uspesno uneta akcija.";
  }else{
    $poruka = "Neuspesno uneta akcija.";
  }
}

if(count($_SESSION['kupci']) != 0){
  $podaci =" where kupacID in (". implode(",", $_SESSION['kupci']).")";
  $upit2 = "SELECT * FROM kupac ".$podaci;
  $rez = $konekcija->query($upit2);
  $nizOdDodatih = [];
  while($red = $rez->fetch_assoc()){
    array_push($nizOdDodatih,$red);
  }
}else{
  $nizOdDodatih = [];
}

$upitKampanje = "SELECT * FROM kampanja k join proizvod p on k.proizvodID=p.proizvodID ";
$rez = $konekcija->query($upitKampanje);
$nizKampanja = [];
while($red = $rez->fetch_assoc()){
  array_push($nizKampanja,$red);
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Toy Kingdom</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/classic.css" />
	  <link rel="stylesheet" href="css/classic.date.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body id="top">
  <?php include 'header.php'; ?>

    <section class="s-content">

        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

            </div>
        </div>
        <div class="container">
            <h1 class="text-center" style="text-decoration-line: underline;">Kreiraj novu akciju</h1>
            <div class="row text-center">
              <form method="post" action="">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Naziv akcije" name="naziv" id="naziv">
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control datepicker" placeholder="Važi do" name="datum" id="datum">
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Popust (u %)" id="popust" name="popust">
              </div>
              <div class="col-md-12">
                <select name="proizvod" class="form-control">
                  <?php
                  foreach($niz as $n){
                    ?>
                    <option value="<?php echo $n['proizvodID']; ?>"><?php echo $n['naziv']; ?></option>
                    <?php
                  }

                   ?>
                </select>
              </div>
              <div class="col-md-12">
                <input type="submit" class="button" style="width: 30rem; background-color: #FFEBCD; border-radius: 10px; border: 2px solid #B22222;" name="sacuvaj" value="Sačuvaj">
              </div>
            </form>
            <form action="" method="post">
              <div class="col-md-12">
                <select name="kupac" class="form-control">
                  <?php
                  foreach($nizKupaca as $n){
                    ?>
                    <option value="<?php echo $n['kupacID']; ?>"><?php echo $n['imePrezime']; ?></option>
                    <?php
                  }

                   ?>
                </select>
              </div>
              <div class="col-md-12">
                <input type="submit" class="button" style="width: 30rem; background-color: #FFEBCD; border-radius: 10px; border: 2px solid #B22222;" name="sacuvajKupca" value="Dodaj kupca">
              </div>
            </form>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">Kupac</th>
                  <th class="text-center">E-mail</th>
                  <th class="text-center">Adresa</th>

                </tr>
              </thead>
              <tbody>
                <?php
                foreach($nizOdDodatih as $p){
                ?>
                  <tr>
                    <td class="text-center"><?php echo $p['imePrezime'] ?></td>
                    <td class="text-center"><?php echo $p['email'] ?></td>
                    <td class="text-center"><?php echo $p['adresa'] ?></td>
                  </tr>
                <?php
                    }
                 ?>
              </tbodY>
            </table>
            <p><?php $poruka; ?></p>
            <table id="kampanje" class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">Akcija</th>
                  <th class="text-center">Važi do</th>
                  <th class="text-center">Proizvod</th>
                  <th class="text-center">Obriši akciju</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($nizKampanja as $p){
                ?>
                  <tr>
                    <td class="text-center"><?php echo $p['nazivKampanje'] ?></td>
                    <td class="text-center"><?php echo $p['vaziDo'] ?></td>
                    <td class="text-center"><?php echo $p['naziv'] ?></td>
                    <td class="text-center"><a href="obrisi.php?id=<?php echo $p['kampanjaID'] ?>" class='btn btn-danger'>Obriši</a></td>
                  </tr>
                <?php
                    }
                 ?>
              </tbody>
            </table>
            <h1 style="text-decoration-line: underline;">Grafički prikaz podataka</h1>
            <div id="podaciGrafik"></div>
            <h1 style="text-decoration-line: underline;">Unos novog proizvoda</h1>
            <form action="upload.php" method= "POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Naziv proizvoda" id="naziv" name="naziv">
              </div>
              <div class="col-md-12">
                <input type="number" class="form-control" placeholder="Cena" id="cena" name="cena">
              </div>
              <div class="col-md-12">
                <input type="file" class="form-control" placeholder="Unesite sliku" id="fileToUpload" name="fileToUpload">
              </div>
              <div class="col-md-12">
                <input type="submit" class="button" style="width: 30rem; background-color: #FFEBCD; border-radius: 10px; border: 2px solid #B22222;" value="Sačuvaj" id="submit" name="submit">
              </div>
            </form>
          </div>
      </div>

    </section>

    <?php include 'footer.php'; ?>

    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/picker.js"></script>
	   <script src="js/picker.date.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script>
         $(document).ready(function(){
           $('#kampanje').DataTable();
       });
     </script>
  	<script>
  		$('.datepicker').pickadate({
  			format: 'yyyy-mm-dd',
  			formatSubmit: 'yyyy-mm-dd',
  			hiddenPrefix: 'prefix__',
  			hiddenSuffix: '__suffix'
  		});
  	</script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">
      google.load('visualization', '1', {'packages':['corechart']});
      google.setOnLoadCallback(nacrtajGrafikFunkcija);

      function nacrtajGrafikFunkcija() {
        var jsonData = $.ajax({
        url: "podaciVizuelizacija.php",
        dataType:"json",
        async: false
      }).responseText;
      var data = new google.visualization.DataTable(jsonData);
      var options = {'title':'Broj pojavljivanja proizvoda u akcijama',
       backgroundColor: { fill:'transparent' },
        titleTextStyle: {
      textAlign: 'center',
          color: 'black',
          fontSize: 25},
          'width':900,
          'height':650,
          is3D:true,
      legend: {
          textStyle: {
        color: 'black'
          }
      },
      };

      var chart = new google.visualization.PieChart(document.getElementById('podaciGrafik'));


      chart.draw(data,  options);

    }
    </script>
</body>

</html>
