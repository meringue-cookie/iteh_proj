<?php include 'sesija.php';
      include 'konekcija.php';
      $idUlogovanog = $_SESSION['ulogovaniKupac']->kupacID;
      $upitKampanje = "SELECT * FROM kampanja k join proizvod p on k.proizvodID=p.proizvodID join stavkekampanje sk on k.kampanjaID= sk.kampanjaID where sk.kupacID = $idUlogovanog and k.vaziDo > now()";
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
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="text-center">Akcija</th>
                <th class="text-center">Važi do</th>
                <th class="text-center">Proizvod</th>
                <th class="text-center">Cena</th>
                <th class="text-center">Popust</th>
                <th class="text-center">Cena sa popustom</th>
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
                  <td class="text-center"><?php echo $p['cena'] ?> dinara</td>
                  <td class="text-center"><?php echo $p['popust'] ?> %</td>
                  <td class="text-center"><?php
                    $cena =$p['cena'];
                    $popust = $p['popust'];
                   $novaCena = $cena*(100 - $popust)*0.01;
                   echo $novaCena;
                   ?> dinara</td>
                </tr>
              <?php
                  }
               ?>
            </tbodY>
          </table>
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


</body>

</html>
