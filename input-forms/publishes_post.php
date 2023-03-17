<html>

<head>
    <meta charset="utf-8" />
    <title>Publishes page result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/style.css" />
</head>

<body>
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
            elseif ($fetch['permission_level'] > 2){
                echo "access denied, no permission";
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
    <?php
        $conn = mysqli_connect("localhost", "group6admin", "SucceedChange", "group6");
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    ?>
    <form class="container col-7 font-monospace" method="post" action="../php/publishes_post_result.php">
        <div class="form-group mt-3">
            <h1>publishes</h1>
            <label>list of users</label>
            <select name="user" class="form-control">
                <?php
            $result = mysqli_query($conn, "SELECT * FROM Users");
            echo "<option value='' disabled selected hidden>choose user</option>";
            while ($row = mysqli_fetch_array($result))
            {
                echo "<option value='" . $row[uid] . "'>"
                . $row[username] . "</option>\n";
            }
        ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label>list of posts</label>
            <select name="post" class="form-control">
                <?php
            $result2 = mysqli_query($conn, "SELECT * FROM Posts");
            echo "<option value='' disabled selected hidden>choose post</option>";
            while ($row2 = mysqli_fetch_array($result2))
            {
                echo "<option value='" . $row2[pid] . "'>"
                . "[" . $row2[pid] . "]" . " - " . $row2[post_title] . "</option>\n";
            }
        ?>
            </select>
        </div>
        <div class="form-group mt-3">
            <label>select publish date</label>
            <input type="date" name="date" class="form-control">
        </div>
        <button type="submit" class="btn btn-secondary mt-4">create</button>
    </form>
</body>

</html>