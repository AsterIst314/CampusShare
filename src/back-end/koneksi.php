<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_campusshare";

$conn = new mysqli($servername, $username, 
		$password, $dbname);

if ($conn->connect_error) {
  die("Koneksi Gagal: " . $conn->connect_error);
}
?>