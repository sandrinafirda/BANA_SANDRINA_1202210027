<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "MODUL4_WAD";
// 
$conn = new mysqli($servername, $username, $password, $database);

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
// 
 
?>