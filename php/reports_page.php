<html>

<head>
    <title>Post page results</title>
</head>

<body>
    <?php
            $conn = mysqli_connect("localhost", "group6admin", "SucceedChange", "group6");
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $query = "INSERT INTO Tickets (tid, kind) VALUES 
            (NULL, 2)";
            if (!mysqli_query($conn, $query))
            {
                die('Error: ' . mysqli_error($conn));
            }

            $tid = mysqli_insert_id($conn);
            $query = "INSERT INTO Reports (ticket_id, report_target, report_content) VALUES 
            ( $tid, '$_POST[user]', '$_POST[reasoning]'  )";
            if (!mysqli_query($conn, $query))
            {
                die('Error: ' . mysqli_error($conn));
            }

            echo "<p>1 record added successfully</p>";
            echo '<a href="../maintenance.php">maintenance</a>';
        ?>
</body>

</html>