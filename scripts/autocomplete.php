<?php 
                $db = mysqli_connect("localhost", "group6", "beadyshown", "group6");
                if (mysqli_connect_errno())
                {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                } 
                $query = "SELECT username FROM Users";
    ?>

$(function () {
    var userNames;
    $('.searchbar').keyup(function(e) {
        userNames = [];
        
       <?php
                $result = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc( $result )) {
                    ?>
                    userNames.push('<?php echo $row["username"]; ?>');
                    <?php
                } ?>;
                
        console.log(userNames);

        $(".searchbar").autocomplete({
            source: userNames,
        });
         
    });

    $('.selectpicker').selectpicker({
        dropupAuto: false
    });

  
});
