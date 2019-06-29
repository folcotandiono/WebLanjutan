<?php
require 'emitter.php';

// $emitter = new League\Event\Emitter();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_lanjutan";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $nama = $_POST['nama'];
    $skor = $_POST['skor'];

    $sql = "insert into tabel_skor (nama, skor) values ('$nama', '$skor')";
    mysqli_query($conn, $sql);
    $emitter->emit('haha');
    echo json_encode(array());
?>