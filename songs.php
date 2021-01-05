<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/songs.css">
    <title>Songs</title>
  </head>

  <body id="top">
    <header>
      <img id="logo" src="./img/logo.png" width="128">
      <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="songs.php">Songs</a></li>
          <li><a href="playlists.html">Playlists</a></li>
          <li><a href="my_account.html">My Account</a></li>
        </ul>
      </nav>
    </header>

    <main>
      <h1>Top 10 Most listened songs at this moment</h1>
      <?php
        include "php\db_connect.php";

        echo "<ul>";
        include "php\show_all_songs.php";
        echo "</ul>"
      ?>

    </main>


    <footer>
      <a href="#top">Back to top</a>
    </footer>
  </body>
</html>