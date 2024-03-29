<?php include 'sesija.php'; ?>

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
          <h1 class="text-center" style="text-decoration-line: underline;">Spisak proizvoda</h1>
          <p class="text-center">Pretraga po ceni</p>
          <div class="row text-center">
            <div class="col-md-6">
              <input type="number" class="form-control" placeholder="Minimalna cena" id="min">
            </div>
            <div class="col-md-6">
              <input type="number" class="form-control" placeholder="Maksimalna cena" id="max">
            </div>
            <div class="col-md-12">
              <input type="button" class="button" style="width:30rem; background-color: #FFA07A; border-radius: 12px; border: 2px solid #FF7F50;" value="Pretraži" onclick="pretrazi()">
            </div>
        </div>
      </div>
      <div class="container text-center" id="podaci"></div>


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
    <script>
      function pretrazi(){
        var min = $("#min").val();
        var max = $("#max").val();
        $.ajax({
          url: "vratiProizvode.php",
          data: {min:min,max:max},
          success: function(podaci){
              $("#podaci").html(podaci);
          }
        });
      }

    </script>

</body>

</html>
