<html>

<head>
    <title>Publishes page result</title>
</head>

<body>
    <?php
        require 'connect.php';

        $timezone = date_default_timezone_get();
        date_default_timezone_set($timezone);
        $date = date('Y/m/d');
    
        $query = "INSERT INTO Publishes (publish_date, post_id, user_id) VALUES 
                ('$_POST[date]', '$_POST[post]', '$_POST[user]')";
                
                if (!mysqli_query($conn, $query))
                {
                    die('Error: ' . mysqli_error($conn));
                }
                echo "<p>1 record added successfully</p>";
                echo '<a href="../maintenance.php">maintenance</a>';
    ?>
</body>

</html>