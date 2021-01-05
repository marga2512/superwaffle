<?php

$sql = "SELECT ID, Artist, Title, Duration, Genre, Link, Rating FROM songs_table";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<li>" . "Song_ID: " . $row["ID"] . " Artist: " . $row["Artist"] . " Title: " . $row["Title"] . " Length: " . $row["Duration"] . " Genre: " . $row["Genre"] . " Rating: " . $row["Rating"] . "</li>";
    sleep(0.1);
  }
} else {
  echo "0 results";
}

$mysqli->close();
