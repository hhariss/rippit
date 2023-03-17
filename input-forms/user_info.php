<?php
    session_start();

    $db = mysqli_connect("localhost", "group6", "beadyshown", "group6");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
        
    $query = "SELECT username,user_karma, join_date FROM Users WHERE username=? LIMIT 1";
    $stmt = mysqli_prepare($db, $query);
    
    mysqli_stmt_bind_param($stmt, "s", $uname);
    
    $uname = filter_input(INPUT_GET, 'uname', FILTER_SANITIZE_ADD_SLASHES);
    $bind = mysqli_stmt_execute($stmt);
    
    

    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_stmt_errno($stmt) > 0) {
        echo "<p> test </p>";
    }
    
    
    $user = mysqli_fetch_assoc($result);
    if ($user == "") {
        echo "User not found.";
        die();
    }
    

    
    

    $username = $user[username];
    $karma = $user[user_karma];
    $jDate = $user[join_date];

?>



<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8" />
      <title>Rippit</title>
      <link rel="icon" type="image/png" href="../img/whiteclaws.png" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous" />
      <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
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
                  <div id="user" class="d-flex gap-4 mt-1">
                        <div id="pfp">
                              <i class="fa-solid fa-user"></i>
                        </div>

                        <div id="info" class="d-flex flex-column">
                              <div id="uname" class="title"> <?php echo $username; ?></div>
                              <div id="karma">karma <?php echo $karma; ?> </div>
                              <div id="joinDate">joined on <?php echo $jDate; ?> </div>
                        </div>
                  </div>
            </div>
      </body>
</main>

</html>