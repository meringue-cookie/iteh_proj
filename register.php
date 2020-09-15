<?php include 'sesija.php';

include 'konekcija.php';
$poruka = "";
if(isset($_POST['register'])){
  $ime = trim($_POST['ime']);
  $adresa = trim($_POST['adresa']);
  $email = trim($_POST['email']);
  $user = trim($_POST['korIme']);
  $password = trim($_POST['lozinka']);
  $kupac = new Kupac(rand(),$ime,$email,$adresa,$user,$password,0);
  if($kupac->napraviNalogKupcu($konekcija)){
    $poruka = "Uspešno napravljen nalog.";
  }else{
    $poruka = "Neuspešno napravljen nalog.";
  }
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
            <h1 class="text-center" style="text-decoration-line: underline;">Forma za registraciju</h1>
            <div class="row text-center">
              <form method="post" action="">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Ime i prezime" name="ime" id="ime">
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Adresa" name="adresa" id="adresa">
                </div>
                <div class="col-md-12">
                  <input type="email" class="form-control" placeholder="E-mail" name="email" id="email">
                </div>
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Korisničko ime" name="korIme" id="korIme">
              </div>
              <div class="col-md-12">
                <input type="password" class="form-control" placeholder="Lozinka" id="lozinka" name="lozinka">
              </div>
              <div class="col-md-12">
                <input type="submit" class="button" style="width:30rem; background-color: #FFA07A; border-radius: 12px; border: 2px solid #FF7F50;" name="register" value="Registruj se">
              </div>
            </form>
            <p><?php echo $poruka; ?></p>
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

</body>

</html>
