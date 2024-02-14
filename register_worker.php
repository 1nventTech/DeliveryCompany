<?php

    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $phone = $_POST["phone"];
    $startat = $_POST["starts-at"];
    $endat = $_POST["ends-at"];
    $oddzial = (int)$_POST["oddzial"];
    
    $conn = mysqli_connect(host, user, pass);
    $baza = mysqli_select_db($conn, 'firma_kurierska2023');
    $query = mysqli_prepare($conn, "INSERT INTO kurier(imie_kr,nazwisko_kr,telefon_kr,godziny_od,godziny_do,id_oddzialu) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($query, 'sssssi',$name,$surname,$phone,$startat,$endat,$oddzial);
    mysqli_stmt_execute($query);
    
    include("workers.php");
?>