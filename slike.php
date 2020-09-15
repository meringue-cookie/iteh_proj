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
        <h1 class="text-center" style="text-decoration-line: underline;">Slike</h1>
      <div class="container text-center" id="slike"></div>


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
      (function() {
      $.getJSON( "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?", {
        tags: "toys",
        tagmode: "any",
        format: "json"
      })
        .done(function( data ) {
          var text = '';
          $.each( data.items, function( i, item ) {
            text += '<div class="col-md-4"><h3>'+item.title+'</h3><img src="'+item.media.m+'" class="img img-thumbnail"></div>';
          });
          $("#slike").html(text);
        });
      })();
  </script>

</body>

</html>
