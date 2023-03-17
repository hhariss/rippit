<?php 
    session_start();


    $sort = array(
        "date" => array("new", "fa-solid fa-clock"),
        "karma" => array("karma", "fa-solid fa-fire")
    );
    $filter = array(
        "general" => array("all", "fa-solid fa-file-lines"), 
        "sightings" => array("sightings", "fa-solid fa-eye")
    );
    $defaultSort = "date";
    $defaultFilter = "general";

    $selectedSort = $defaultSort;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selectedSort = $_POST['postsort'];
    }

    $selectedFilter = $defaultFilter;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selectedFilter = $_POST['postfilter'];
    }
?>


<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8" />
      <title>Rippit</title>
      <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
      <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
      <link rel="icon" type="image/png" href="img/whiteclaws.png" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
            crossorigin="anonymous" />
      <script src="https://kit.fontawesome.com/6ba144ce88.js" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

      <link rel="stylesheet" href="styles/style.css" />
</head>

<main>

      <body>
            <header>
                  <nav class="navbar justify-content-between align-items-end">
                        <a href="index.php">
                              <img alt="Logo" src="img/whiteclaws.png" width="150" />
                        </a>

                        <div>
                              <?php 
              if (isset($_SESSION['username'])) {?>
                              <a class="navbutton" href="php/logout.php">log out</a>
                              <a class="navbutton" href="#"> <i class="fa-solid fa-user"></i>
                                    <?php echo $_SESSION['username'] ?>
                              </a>
                              <?php
              }
              else { ?>
                              <a class="navbutton" href="input-forms/register_page.php">register</a>
                              <a class="navbutton" href="input-forms/login_page.php">log in</a>
                              <?php } ?>


                        </div>
                  </nav>
            </header>


            <div class="d-flex flex-column justify-content-center align-items-center">
                  <div class="d-flex w-100 justify-content-between m-1">
                        <div class="filter">
                              <form class="d-flex me-auto p-2" style="gap:4px; width: 60%;"
                                    action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
                                    <label for="postsort"></label>
                                    <select name="postsort" id="postsort" class="selectpicker"
                                          onchange="this.form.submit()">
                                          <?php 
                    
                foreach($sort as $value => $name) {
                    echo $name[1];
                    if ($value == $selectedSort) {
                        echo "<option data-icon='$name[1]' selected value=".$value.">".$name[0]."</option>";
                    } else {
                        echo "<option data-icon='$name[1]' value=".$value.">".$name[0]."</option>";
                    }
                }
            ?>
                                    </select>
                                    <label for="postfiler"> </label>
                                    <select name="postfilter" id="postfilter" class="selectpicker"
                                          onchange="this.form.submit()">
                                          <?php 
                foreach($filter as $value => $name) {
                    if ($value == $selectedFilter) {
                        echo "<option data-icon='$name[1]' selected value=".$value.">".$name[0]."</option>";
                    } else {
                        echo "<option data-icon='$name[1]' value=".$value.">".$name[0]."</option>";
                    }
                }
            ?>
                                    </select>
                              </form>
                        </div>
                        <div>
                              <form class="form-inline align-self-end search me-auto p-2"
                                    action=<?php echo "input-forms/user_info.php" ?>>
                                    <div class="input-group">
                                          <input class="form-control searchbar"
                                                style="border-radius: 0px; color: white;" type="text"
                                                placeholder="search" name="uname">
                                    </div>
                              </form>
                        </div>
                  </div>
                  <div id="allposts" class="gap-4 mt-1">
                        <?php 
                $db = mysqli_connect("localhost", "group6", "beadyshown", "group6");
                $fil = ($selectedFilter == "general") ? "Posts" : "Sightings";
                if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                if ($selectedSort == "date") {
                    $query = "SELECT * FROM ". $fil." Po, Publishes Pub WHERE Po.pid = Pub.post_id ORDER BY Pub.publish_date";
                }
                elseif ($selectedSort == "karma") {
                    $query = "SELECT * FROM ".$fil. " P ORDER BY P.post_karma DESC";
                }
            
                $result = mysqli_query($db, $query);

                while($row = mysqli_fetch_array( $result )) {
                    
                    $karma = $row["post_karma"];
                    $post_title = $row["post_title"];
                    $post_content = $row["post_content"];
                    $pid = $row["pid"];

                    $authorquery = "SELECT P.user_id, P.publish_date FROM Publishes P WHERE P.post_id=" . $pid . " LIMIT 1";
                    $authorrow = mysqli_fetch_assoc(mysqli_query($db, $authorquery));
                    $authorid = ($authorrow)[user_id];
                    $date = ($authorrow)[publish_date];
                    $author = (mysqli_fetch_assoc(mysqli_query($db, "SELECT U.username FROM Users U WHERE U.uid=" . $authorid . " LIMIT 1")))[username];
                    $query = mysqli_query($db, "SELECT * FROM Sightings S WHERE S.pid=" . $pid);
                    $count = mysqli_num_rows($query);
                    $issighting = $count > 0;

                    $sightrow = mysqli_fetch_assoc($query);
                    $address = $sightrow[city] . "," . " " . ucwords($sightrow[country]);
                ?>
                        <a href=<?php echo "input-forms/post_details.php?pid=$pid" ?>>
                              <div class="post">
                                    <div class="votes">
                                          <div id="upvote">
                                                <i class="fa-solid fa-arrow-up"></i>
                                          </div>
                                          <div id="karma"> <?= $karma; ?> </div>
                                          <div id="downvote">
                                                <i class="fa-solid fa-arrow-down"></i>
                                          </div>
                                    </div>
                                    <div class="postcontent">
                                          <div class="authordate">
                                                <?php 
                        if ($issighting){
                            echo '<i class="fa-solid fa-eye" id="eye"></i>';
                        }
                    ?>
                                                <span class="author">by
                                                      <?php
                          if ($issighting){
                                      echo $author . "<i>" . " at " . $address  . "</i>";
                          } else {
                                      echo $author;
                          }
                        ?>
                                                </span>
                                                <span class="date">on <?= $date; ?> </span>
                                          </div>
                                          <div class="symboltitle">
                                                <span class="title">
                                                      <?php
                            if (strlen($post_title) > 25){
                               echo substr($post_title, 0, 25) . "...";
                            } else {
                               echo $post_title;
                            }
                         ?>
                                                </span>
                                          </div>
                                          <div class="contentpreview">
                                                <span class="content">
                                                      <?php
                            if (strlen($post_content) > 65) {
                               echo substr($post_content, 0, 65) . "...";
                            } else {
                               echo $post_content;
                            }
                        ?>
                                                </span>
                                          </div>
                                    </div>
                              </div>
                        </a>
                        <?php } ?>
                        <div class="navbar justify-content-center gap-4 footer">
                              <a href="imprint.html"> imprint page </a>
                              <a href="maintenance.php"> maintenance page </a>
                              <a href="experimental.php"> experimental page </a>
                        </div>
                  </div>
            </div>
            <script type="text/javascript" src="scripts/autocomplete.php"> </script>
      </body>
</main>

</html>