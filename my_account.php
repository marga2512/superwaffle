<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /registration/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: /registration/login.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <title>My Account</title>
  </head>

  <body id="top">
    <header>
      <img id="logo" src="./img/logo.png" width="128">
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="songs.php">Songs</a></li>
          <li><a href="playlists.php">Playlists</a></li>
          <li><a href="my_account.php">My Account</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <div class="header">
        <h2>My account</h2>
      </div>
      <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
            <h3>
              <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
              ?>
            </h3>
          </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
          <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
          <p> <a href="my_account.php?logout='1'" style="color: red;">logout</a> </p>
        <?php endif ?>
      </div>

    </main>

    <footer>
      <a href="#top">Back to top</a>
    </footer>
  </body>
</html>
