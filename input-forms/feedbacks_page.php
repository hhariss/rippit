<?php
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../img/whiteclaws.png" />
    <title>Rippit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/style.css" />
</head>
<main>

    <body>
        <?php
      session_start();
      if (!isset($_SESSION['username'])) {
        header('Location: php/login_page.php');
        die();
      }
      ?>
        <header>
            <nav class="navbar">
                <a href="../index.php">
                    <img alt="Logo" src="../img/whiteclaws.png" width="150" />
                </a>
            </nav>
        </header>
        <form class="container col-7 font-monospace" method="post" action="../php/feedback_page.php">
            <div class="form-group mt-3">
                <h1>give feedback</h1>
                <textarea class="form-control" placeholder="enter content" name="fcontent" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary mt-4">submit</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
    </body>
</main>

</html>