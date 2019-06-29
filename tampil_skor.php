<?php
require 'emitter.php';
session_write_close();
ignore_user_abort(false);
set_time_limit(40);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_lanjutan";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // $sql = "SELECT * FROM tabel_skor order by skor desc";
    // $result = mysqli_query($conn, $sql);

    // $banyak = $result->num_rows;

    // while (true) {
    //     $sql = "SELECT * FROM tabel_skor order by skor desc";
    //     $result = mysqli_query($conn, $sql);

    //     $banyak1 = $result->num_rows;
    //     if ($banyak1 != $banyak) {
    //         $array = array();
    //         while($row = $result->fetch_assoc()) {
    //             $array['nama'][] = $row['nama'];
    //             $array['skor'][] = $row['skor'];
    //         }
    //         echo json_encode($array);
    //         break;
    //     }
    //     sleep(2);
    // }
    // $ada = false;
    // while(true) {
        $emitter->addListener('haha', function ( $event) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "web_lanjutan";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql = "SELECT * FROM tabel_skor order by skor desc";
            $result = mysqli_query($conn, $sql);

                $array = array();
                while($row = $result->fetch_assoc()) {
                    $array['nama'][] = $row['nama'];
                    $array['skor'][] = $row['skor'];
                }
                // $ada = true;
                echo json_encode($array);
                // break;
            
        });
        // if ($ada) break;
        // sleep(2);
    // }

?>