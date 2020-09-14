<?php include 'sesija.php';
      include 'konekcija.php';
      $pom = $konekcija->real_escape_string($_GET['id']);
      $id = intval($pom);

      $upit = "SELECT * from proizvod where proizvodID = $id";
      $rez = $konekcija->query($upit);
      $niz = [];
      while($red = $rez->fetch_assoc()){
        array_push($niz,$red);
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
          <h1 class="text-center" style="text-decoration-line: underline;">Detalji o proizvodu</h1>
          <h2>Naziv proizvoda: <?php echo $niz[0]['naziv']; ?></h2>
          <h3>Cena: <?php echo $niz[0]['cena']; ?> dinara</h3>
          <img src="images/<?php echo $niz[0]['slika']; ?>" class="img img-responsive">
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
