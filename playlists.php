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
    <title>Playlists</title>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PJRJ496LSC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-PJRJ496LSC');
    </script>
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

    </main>

    <footer>
      <a href="#top">Back to top</a>
    </footer>
  </body>
</html>
