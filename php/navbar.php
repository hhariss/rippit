<nav class="navbar justify-content-space-between">
          <a href=ROOT."/index.php">
            <img alt="Logo" src=ROOT."/img/whiteclaws.png" width="150" />
          </a>
          <div>
            <?php 
              session_start();
              if (!isset($_SESSION['loggedin'])) {
                  $_SESSION['loggedin'] = false;
                  unset($_SESSION['username']);
              }
              if ($_SESSION['loggedin'] == true) {?>
                <a class="navbutton" href=ROOT."/php/logout.php">log out</a>
                <a class="navbutton" href="#"> <i class="fa-solid fa-user"></i> <?php echo $_SESSION['username'] ?> </a>
              <?php
              }
              else { ?>
                <a class="navbutton" href=ROOT."/input-forms/register_page.html">register</a>
                <a class="navbutton" href=ROOT."/php/login_page.php">log in</a>
              <?php } ?>     
          </div>
        </nav>