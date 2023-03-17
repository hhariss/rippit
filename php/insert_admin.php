<html>

<head>
    <title>PHP Test</title>
</head>

<body>
    <?php
   $conn = mysqli_connect("localhost", "group6admin", "SucceedChange", "group6");
   if (mysqli_connect_errno())
   {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

   $timezone = date_default_timezone_get();
   date_default_timezone_set($timezone);
   $date = date('Y/m/d');
   $ip_adr = $_SERVER['REMOTE_ADDR'];

   $sql = "INSERT INTO Users
             VALUES ( NULL ,
                      \"". $_POST["username"]  . "\",
                      \"". $_POST["password"]    . "\",
                           0                     ,
                       '". $date            .  "',
                      \"". $ip_adr          . "\")";


                      if (!$conn->query($sql)) {
                        echo "Error: " . $sql . "<br>" . '$conn->error';
                        }

   $sql = "INSERT INTO Admins
             VALUES (   ". mysqli_insert_id($conn) .    ",
                      \"". $_POST["username"]    . "\",
                      \"". $_POST["password"]      . "\",
                        ". 0   . ",
                       '". $date   . "',
                      \"". $ip_adr      . "\",
                        ". $_POST["permission"]   . ")";

   
                        if (!$conn->query($sql)) {
                          echo "Error: " . $sql . "<br>" . '$conn->error';
                          }
                          echo "<p>1 record added successfully</p>";
                        echo '<a href="../maintenance.php">maintenance</a>';


   $conn->close();
   ?>
</body>

</html>