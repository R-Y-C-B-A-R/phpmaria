<?php
error_reporting(E_ALL);

$host     = "db433892073.db.1and1.com"; // MySQL-Hostname
$user     = "dbo433892073"; // Username für MySQL-Datenbank Vorbelegung
$database = "db433892073"; // Name der MySQL-Datenbank
$pass     = "opaline35"; // Passwort als Vorbelegung
 
$mysqli = new mysqli($host, $user, $pass, $database);
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
else
{
    echo "Connection successful<br><br>\n";
}

/* Select queries return a resultset */
if ($result = $mysqli->query("SHOW TABLES")) {
    printf("Select returned %d rows.<br><br>\n", $result->num_rows);

  while($cRow = mysqli_fetch_array($result))
  {
    echo $cRow[0]."<br>\n";
  }

    /* free result set */
    $result->close();
}

$mysqli->close();
?>
