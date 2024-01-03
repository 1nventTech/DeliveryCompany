<?php
if (!isset($_POST['login']) || !isset($_POST['pass'])) {
    header("Location: singup.html");
}

if (empty($_POST['login']) || empty($_POST['pass'])) {
    die("Form cannot be empty");
}

define('host', 'localhost');
define('user', 'root');
define('pass', '');

$conn = mysqli_connect(host, user, pass);
$baza = mysqli_select_db($conn, 'firma_kurierska2023');

$login = mysqli_real_escape_string($conn, trim($_POST['login']));
$pass = password_hash(mysqli_real_escape_string($conn, trim($_POST['pass'])), PASSWORD_DEFAULT);

$kwerenda = mysqli_prepare($conn, "SELECT uLogin FROM uzytkownicy WHERE uLogin = ?");
mysqli_stmt_bind_param($kwerenda, 's', $login);
mysqli_stmt_execute($kwerenda);
mysqli_stmt_store_result($kwerenda);

if (mysqli_stmt_num_rows($kwerenda) == 1) {
    echo "Użytkownik istnieje!";
} else {
    ///////////////////////////////////////// ----------==================   REJESTRACJA UŻYTKOWNIKA   ===================--------------------- ////////////////////////////////////////////////

    $kwerenda2 = mysqli_prepare($conn, "INSERT INTO uzytkownicy (uLogin, uPass, data_rej) VALUES (?, ?, CURRENT_DATE());");
    mysqli_stmt_bind_param($kwerenda2, 'ss', $login, $pass);
    mysqli_stmt_execute($kwerenda2);

    if (mysqli_stmt_affected_rows($kwerenda2) == 1) {
        echo "<br>Pomyślnie zarejestrowano użytkownika";
    } else {
        echo "<br>nie";
    }
}

mysqli_close($conn);
?>
