<?php 
    session_start();
?>


<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8" />
      <title>Rippit</title>
      <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
      <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
      <link rel="icon" type="image/png" href="img/whiteclaws.png" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous" />
      <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
      

      <link rel="stylesheet" href="styles/style.css" />
</head>

<main>

      <body>
            <header>
                  <nav class="navbar justify-content-between align-items-end">
                        <a href="index.php">
                              <img alt="Logo" src="img/whiteclaws.png" width="150" />
                        </a>

                        <div>
                              <?php 
              if (isset($_SESSION['username'])) {?>
                              <a class="navbutton" href="php/logout.php">log out</a>
                              <a class="navbutton" href="#"> <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION['username'] ?>
                              </a>
                              <?php
              }
              else { ?>
                              <a class="navbutton" href="input-forms/register_page.php">register</a>
                              <a class="navbutton" href="input-forms/login_page.php">log in</a>
                              <?php } ?>


                        </div>
                  </nav>
            </header>


            <div class="d-flex flex-column justify-content-center align-items-center">
                  <div class="d-flex  justify-content-center align-items-center m-1">
                              <form class="form-inline align-self-end search me-auto p-2"
                                    action=<?php echo "input-forms/user_info.php" ?>>
                                    <div class="d-flex justify-content-center align-items-center input-group gap-4">
                                        <label for="uname"> user search: </label>
                                          <input class="form-control searchbar"
                                                style="border-radius: 0px; color: white;" type="text"
                                                placeholder="Search" id="uname" name="uname">
                                    </div>
                              </form>
                  </div>
                  <div> 
                        <a href="input-forms/location.php"> Get your location. </a>
                  </div>
              </div>
            <script type="text/javascript" src="scripts/autocomplete.php"> </script>
      </body>
</main>

</html>