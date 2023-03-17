<?php 
    session_start();
    $index = "input-forms/login_page.php";
    if (!isset($_SESSION['username'])) {
        header('Location: ' . $index);
        die();
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Maintenance</title>
    <link rel="icon" type="image/png" href="img/whiteclaws.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/style.css" />

    <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
</head>

<main>

    <body class="h-100, m-0">
        <header>
            <nav class="navbar justify-content-space-between">
                <a href="index.php">
                    <img alt="Logo" src="img/whiteclaws.png" width="150" />
                </a>
            </nav>
        </header>
        <div class="text-center font-monospace">
            <h1>maintenance</h1>
        </div>
        <div class="d-flex flex-column h-100 align-content-center text-center gap-1 font-monospace">
            <div><a href="input-forms/insert_admin.php"> admin </a></div>
            <div><a href="input-forms/register_page.php"> register page </a></div>
            <div><a href="input-forms/post_page.php"> posts </a></div>
            <div><a href="input-forms/sightings_page.php"> sightings</a></div>
            <div><a href="input-forms/reports_page.php"> reports </a></div>
            <div><a href="input-forms/feedbacks_page.php"> feedbacks </a></div>
            <div><a href="input-forms/makes_page.php"> makes </a></div>
            <div><a href="input-forms/resolves_page.php"> resolves </a></div>
            <div><a href="input-forms/publishes_post.php"> publishes </a></div>
        </div>
    </body>
</main>

</html>