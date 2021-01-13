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
      <?php include '/php/search.php';?>
    </header>

    <main>
      <h1>Songs</h1>

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
                <audio controls="audio" src="<?php echo htmlentities($item['Link']); ?>"></audio>
                <!-- LikeBtn.com BEGIN -->
                <span class="likebtn-wrapper" data-theme="custom" data-btn_size="32" data-f_size="16" data-icon_size="24" data-icon_l="hrt6-o" data-icon_l_c="#dc5ca0" data-icon_l_c_v="#fb0505" data-icon_d_c="#af4060" data-icon_d_c_v="#fb0505" data-label_c="#000000" data-label_c_v="#000000" data-f_family="Verdana" data-rich_snippet="true" data-identifier="Song_<?php echo htmlentities($item['ID']); ?>" data-show_like_label="false" data-counter_clickable="true"></span>
                <script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
                <!-- LikeBtn.com END -->
              </td>
              <td><?php echo htmlentities($item['Artist']); ?></td>
              <td><?php echo htmlentities($item['Title']); ?></td>
              <td><?php echo htmlentities($item['Genre']); ?></td>
              <td><?php echo htmlentities($item['Rating']); ?></td>
          </tr>

          <?php } ?>

      </table>

                <div data-lyket-type="like" data-lyket-id="my-first-post"></div>

<?php
      } else {
          echo '<p>0 songs.</p>' . PHP_EOL;
      }
?>
    </main>


    <footer>
      <a href="#top">Back to top</a>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/sort.js"></script>
  </body>
</html>
