<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    echo "access denied, no permission";
    die();
  }
  $conn = mysqli_connect("localhost", "group6", "beadyshown", "group6");
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
  $usr = $_SESSION['username'];
  $query = "SELECT A.user_name, A.permission_level FROM Admins A WHERE A.user_name='".$usr."' LIMIT 1";

  $result = mysqli_query($conn, $query);
  $fetch = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) == 0) {
    echo "access denied, no permission";
    die();
  }
  elseif ($fetch['permission_level'] > 1){
    echo "access denied, no permission";
    die();
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Rippit</title>
    <link rel="icon" type="image/png" href="../img/whiteclaws.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/6ba144ce88.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../styles/style.css" />
  </head>
  <main>
    <body>
      
      <header>
        <nav class="navbar">
          <a href="../index.php">
            <img alt="Logo" src="../img/whiteclaws.png" width="150" />
          </a>
        </nav>
      </header>
      <form
        class="container col-7 font-monospace"
        method="post"
        action="../php/insert_admin.php"
      >
        <div class="form-group mt-3">
          <h1>admin register</h1>
          <label>admin username</label>
          <input
            class="form-control font-monospace"
            placeholder="enter username"
            name="username"
          />
        </div>
        <div class="form-group mt-3">
          <label class="font-monospace">password</label>
          <input
            type="password"
            class="form-control"
            placeholder="enter password"
            name="password"
          />
        </div>
        <div class="form-group mt-3">
          <label class="font-monospace">permission level</label>
          <input
            class="form-control"
            placeholder="enter permission level 1-3"
            name="permission"
          />
        </div>
        <button type="submit" class="btn btn-secondary mt-4">register</button>
      </form>
    </body>
  </main>
</html>
