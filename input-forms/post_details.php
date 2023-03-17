<?php
    session_start();
?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8" />
    <title>Rippit</title>
    <link rel="icon" type="image/png" href="img/whiteclaws.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="../styles/style.css" />

    <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
</head>

<main>

    <body>

        <header>

            <nav class="navbar justify-content-space-between">
                <a href="../index.php">
                    <img alt="Logo" src="../img/whiteclaws.png" width="150" />
                </a>
                <div>
                <?php 
              if (isset($_SESSION['username'])) {?>
                    <a class="navbutton" href="../php/logout.php">log out</a>
                    <a class="navbutton" href="#"> <i class="fa-solid fa-user"></i> <?php echo $_SESSION['username'] ?>
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

        <?php
            $db = mysqli_connect("localhost", "group6", "beadyshown", "group6");
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            
            
            $query = "SELECT * FROM Posts P WHERE P.pid=? LIMIT 1";
            $stmt = mysqli_prepare($db, $query);

            mysqli_stmt_bind_param($stmt, "i", $pid);
            $pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_ADD_SLASHES);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            $post = mysqli_fetch_assoc($result);

            $karma = $post[post_karma];

            $authorquery = "SELECT P.user_id, P.publish_date FROM Publishes P WHERE P.post_id=" . $post[pid] . " LIMIT 1";
            $authorrow = mysqli_fetch_assoc(mysqli_query($db, $authorquery));
            $authorid = ($authorrow)[user_id];
            $date = ($authorrow)[publish_date];
            $author = (mysqli_fetch_assoc(mysqli_query($db, "SELECT U.username FROM Users U WHERE U.uid=" . $authorid . " LIMIT 1")))[username];

            $title = $post[post_title];
            $content = $post[post_content];

            $query = mysqli_query($db, "SELECT * FROM Sightings S WHERE S.pid=" . $post[pid]);

            $sightrow = mysqli_fetch_assoc($query);

            $count = mysqli_num_rows($query);
            $issighting = $count > 0;
            $address = $sightrow[city] . "," . " " . ucwords($sightrow[country]);

        ?>

        <div class="d-flex justify-content-center align-items-center">
            <div class="post">
                <div class="votes">
                    <div id="upvote">
                        <a href="#"><i class="fa-solid fa-arrow-up"></i></a>
                    </div>
                    <div id="karma">
                        <?php
                            echo $karma;
                        ?>
                    </div>
                    <div id="downvote">
                        <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                    </div>
                </div>
                <div class="postcontent">
                    <div class="authordate">
                        <?php
                            if ($issighting)
                            {
                                echo '<i class="fa-solid fa-eye" id="eye"></i>';
                            }
                        ?>
                        <span class="author">
                            by
                            <?php
                                if ($issighting)
                                {
                                    echo $author . "<i>" . " at " . $address  . "</i>";
                                }
                                else 
                                {
                                    echo $author;
                                }
                            ?>
                        </span>
                        <span class="date">
                            on
                            <?php
                                echo $date;
                            ?>
                        </span>
                    </div>
                    <div class="symboltitle">
                        <span class="title">
                            <?php
                                echo $title;
                            ?>
                        </span>
                    </div>

                    <div class="contentpreview">
                        <span class="content">
                            <?php
                                echo $content;
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</main>

</html>