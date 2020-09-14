<section class="s-pageheader s-pageheader--home">
  <div class="container">
    <header class="header">
        <div class="header__content row">

            <div class="header__logo">
                <a class="logo" href="index.php">
                    <img src="images/logo.png" alt="Homepage" style="width: 150px; height: 150px;">
                </a>
            </div>

            <ul class="header__social">
                <li>
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
                </li>
            </ul>

            <a class="header__toggle-menu" href="#" title="Menu"><span>Menu</span></a>

            <nav class="header__nav-wrap">

                <h2 class="header__nav-heading h6">Site Navigation</h2>

                <ul style="font-weight: bold; font-size: large; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif" class="header__nav">
                    <li class="current"><a href="index.php" title="">Početna</a></li>
                    <li class="current"><a href="slike.php" title="">Slike</a></li>
                    <?php
                      if($_SESSION['ulogovaniKupac']->ulogovan()){
                        ?>
                        <li class="current"><a href="kampanje.php" title="">Trenutne akcije</a></li>
                        <?php
                        if($_SESSION['ulogovaniKupac']->admin()){
                          ?>
                          <li class="current"><a href="administracija.php" title="">Administracija</a></li>
                          <?php
                        }
                        ?>
                        <li class="current"><a href="logout.php" title="">Logout</a></li>
                         <?php
                      }else{
                        ?>
                        <li class="current"><a href="register.php" title="">Registracija</a></li>
                        <li class="current"><a href="login.php" title="">Login</a></li>

                        <?php
                      }
                     ?>
                </ul>

                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav>

        </div>
    </header>
  </div>
</section>
