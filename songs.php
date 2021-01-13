<?php

// Constanten (connectie-instellingen databank)
define ('DB_HOST', 'localhost');
define ('DB_USER', 'soundifyCo');
define ('DB_PASS', 'co-Working_123');
define ('DB_NAME', 'Soundify_Co-working_db');


date_default_timezone_set('Europe/Brussels');

// Verbinding maken met de databank
try {
    $db = new PDO('mysql:host=' . DB_HOST .';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindingsfout: ' .  $e->getMessage();
    exit;
}

// Opvragen van alle taken uit de tabel tasks
$stmt = $db->prepare('SELECT * FROM songs_table ORDER BY rating DESC');
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/common.css">
    <link rel="stylesheet" type="text/css" href="/css/songs.css">
    <title>Songs</title>


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PJRJ496LSC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-PJRJ496LSC');
    </script>

    <script src="https://unpkg.com/@lyket/widget@latest/dist/lyket.js?apiKey=f2fc8fafa55af59aec90839cd00041"></script>
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
      <h1>Top 10 Most listened songs at this moment</h1>

<?php   if (sizeof($items) > 0) { ?>

      <table>
          <tr>
              <th></th>
              <th>Artist</th>
              <th>Title</th>
              <th>Genre</th>
              <th>Rating</th>
          </tr>

          <?php foreach ($items as $item) { ?>

          <tr>
              <td>
                <audio controls="audio" src="<?php echo htmlentities($item['Link']); ?>">
                  <div
                    data-lyket-type="like"
                    data-lyket-namespace="songs"
                    data-lyket-template="twitter"
                  ></div>
                </audio>
              </td>
              <td><?php echo htmlentities($item['Artist']); ?></td>
              <td><?php echo htmlentities($item['Title']); ?></td>
              <td><?php echo htmlentities($item['Genre']); ?></td>
              <td><?php echo htmlentities($item['Rating']); ?></td>
          </tr>

          <?php } ?>

      </table>


<?php
      } else {
          echo '<p>0 songs.</p>' . PHP_EOL;
      }
?>
    </main>


    <footer>
      <a href="#top">Back to top</a>
    </footer>
  </body>
</html>
