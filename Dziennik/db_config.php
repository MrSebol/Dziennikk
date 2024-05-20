<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";


$conn = new mysqli('localhost', 'root', '', 'dziennik');


if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
?>
