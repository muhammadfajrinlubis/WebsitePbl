<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stunting";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari request POST
$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];

list($berat) = sscanf($berat, "Berat:%fkg");
list($tinggi) = sscanf($tinggi, "Tinggi:%ft");
// Menyimpan data ke database
$sql = "INSERT INTO sensor_data (berat, tinggi) VALUES ('$berat', '$tinggi')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>