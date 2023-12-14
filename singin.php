<?php
        if (!isset($_POST['login']) || !isset($_POST['pass'])) {
            header("Location: registraction_panel.html");
        }
    
        if (empty($_POST['login']) || empty($_POST['pass'])) {
            die("Form cannot be empty");
        }
    
        define('host', 'localhost');
        define('user', 'root');
        define('pass', '');

        $conn = mysqli_connect(host, user, pass);
        $baze = mysqli_select_db($conn, 'firma_kurierska2023');

        $login = mysqli_real_escape_string($conn, trim($_POST['login']));
        $pass = mysqli_real_escape_string($conn, trim($_POST['pass']));
            
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kwerenda = mysqli_prepare($conn, "SELECT uLogin, uPass FROM uzytkownicy WHERE uLogin=?");
            mysqli_stmt_bind_param($kwerenda, 's', $login);
            mysqli_stmt_execute($kwerenda);
            mysqli_stmt_bind_result($kwerenda, $uLogin, $uPass);
            mysqli_stmt_fetch($kwerenda);
            //////////////// ------========== SPRAWDZENIE HASŁA ==========------- ////////////////
            if (password_verify($pass, $uPass)) {
                echo "Login i haslo zgodne<br>";
                session_start();
                header("Location: dashboard.php");
            } else {
                echo "Błędne haslo<br>";
            }
        }   
?>