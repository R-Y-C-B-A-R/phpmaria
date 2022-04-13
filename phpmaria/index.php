<?php
error_reporting(E_ALL);


$host     = "{{.db.host}}"; // MySQL-Hostname
$user     = "{{.db.user}}"; // Username für MySQL-Datenbank Vorbelegung
$database = "{{.db.name}}"; // Name der MySQL-Datenbank
$pass     = "{{.db.password}}"; // Passwort als Vorbelegung
 
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
