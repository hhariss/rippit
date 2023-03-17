<html>

<head>
    <title>Post page results</title>
</head>

<body>
    <?php
            $db = mysqli_connect("localhost", "group6admin", "SucceedChange", "group6");
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $query = "INSERT INTO Posts (pid, post_karma, post_title, post_content) VALUES 
            (NULL, 0, '$_POST[title]', '$_POST[content]')";
            
            if (!mysqli_query($db, $query))
            {
                die('Error: ' . mysqli_error($db));
            }
            echo "<p>1 record added successfully</p>";
            echo '<a href="../maintenance.php">maintenance</a>';
        ?>
</body>

</html>