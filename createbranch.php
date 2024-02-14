<?php
define('host', 'localhost');
define('user', 'root');
define('pass', '');

// Odbieranie danych JSON
$json_data = file_get_contents("php://input");

// Dekodowanie danych JSON do tablicy asocjacyjnej PHP
$data = json_decode($json_data, true);

// Przypisanie danych do zmiennych
$name = $data["nazwaOddzialu"];
$street = $data["ulica"];
$apartmentNumber = $data["nrDomu"];
$localeNumber = $data["nrLokalu"];
$postalCode = $data["kodPocztowy"];
$city = $data["miejscowosc"];
$phone = $data["tel"];
$email = $data["mail"];

$conn = mysqli_connect(host, user, pass);
$baza = mysqli_select_db($conn, 'firma_kurierska2023');

// Wstawienie danych do bazy danych
$query = mysqli_prepare($conn, "INSERT INTO oddzial_firmy(nazwa_oddzialu,ulica_oddzialu,nr_domu_oddzialu,nr_lokalu_oddzialu,kod_oddzialu,miasto_oddzialu,tel_oddzialu,email_oddzialu) 
    VALUES (?,?,?,?,?,?,?,?)");
mysqli_stmt_bind_param($query, 'ssssssss', $name, $street, $apartmentNumber, $localeNumber, $postalCode, $city, $phone, $email);
$result = mysqli_stmt_execute($query);

// Sprawdzenie, czy dane zostały pomyślnie zarejestrowane
if ($result) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
?>
