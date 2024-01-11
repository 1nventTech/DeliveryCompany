<?php
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');
    
    $street = $_POST["ulica"];
    if(!isset($_POST['nazwaOddzialy'])) $name = $_POST["nazwaOddzialu"];
    $apartmentNumber = $_POST["nrDomu"];
    $localeNumber = $_POST["nrLokalu"];
    $postalCode = $_POST["kodPocztowy"];
    $city = $_POST["miejscowosc"];
    $phone = $_POST["tel"];
    $email = $_POST["mail"];
    
    $conn = mysqli_connect(host, user, pass);
    $baza = mysqli_select_db($conn, 'firma_kurierska2023');
    $query = mysqli_prepare($conn, "INSERT INTO oddzial_firmy(nazwa_oddzialu,ulica_oddzialu,nr_domu_oddzialu,nr_lokalu_oddzialu,kod_oddzialu,miasto_oddzialu,tel_oddzialu,email_oddzialu) 
    VALUES (?,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($query, 'ssssssss',$name,$street,$apartmentNumber,$localeNumber,$postalCode,$city,$phone,$email );
    mysqli_stmt_execute($query);
    
    include("dashboard.php");
?>