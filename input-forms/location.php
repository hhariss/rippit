<?php 
    session_start();
?>


<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8" />
      <title>we see you :)</title>
      <link rel="icon" type="image/png" href="../img/whiteclaws.png" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous" />
      <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    
      <link rel="stylesheet" href="../styles/style.css" />
</head>

<main>

      <body>
            <header>
                  <nav class="navbar justify-content-between align-items-end">
                        <a href="../index.php">
                              <img alt="Logo" src="../img/whiteclaws.png" width="150" />
                        </a>

                        <div>
                              <?php 
              if (isset($_SESSION['username'])) {?>
                              <a class="navbutton" href="../php/logout.php">log out</a>
                              <a class="navbutton" href="#"> <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION['username'] ?>
                              </a>
                              <?php
              }
              else { ?>
                              <a class="navbutton" href="../input-forms/register_page.php">register</a>
                              <a class="navbutton" href="../input-forms/login_page.php">log in</a>
                              <?php } ?>


                        </div>
                  </nav>
            </header>


            <div class="d-flex flex-column justify-content-center align-items-center">
                  <div> 
                    <div id="map" style="width: 600px; height: 400px;"></div>
                  </div>
              </div>

            <script type="application/javascript" src="../scripts/map.js"> </script>
      </body>
</main>

</html>