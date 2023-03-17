<html>

<head>
    <title>Makes page result</title>
</head>

<body>
    <?php
        require 'connect.php';
    
    $query = "INSERT INTO Makes (ticket_id, user_id) VALUES 
            ('$_POST[ticket]', '$_POST[user]')";
            
            if (!mysqli_query($conn, $query))
            {
                die('Error: ' . mysqli_error($db));
            }
            echo "<p>1 record added successfully</p>";
            echo '<a href="../maintenance.php">maintenance</a>';
    ?>
</body>

</html>