<?php
    if (!isset($_POST['login']) || !isset($_POST['pass'])) {
        header("Location: registraction_panel.html");
    }

    if ($_POST['login'] == "" || $_POST['pass'] == "") {
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
        // Sprawdzenie czy użytkownik istnieje w bazie danych
        $check_query = mysqli_prepare($conn, "SELECT COUNT(*) FROM uzytkownicy WHERE uLogin=?");
    
        if (!$check_query) {
            die('Check query preparation failed: ' . mysqli_error($conn));
        }
    
        mysqli_stmt_bind_param($check_query, 's', $login);
        $check_execute = mysqli_stmt_execute($check_query);
    
        if (!$check_execute) {
            die('Check query execution failed: ' . mysqli_error($conn));
        }
    
        mysqli_stmt_bind_result($check_query, $count);
        mysqli_stmt_fetch($check_query);
        mysqli_stmt_close($check_query);
    
        if ($count > 0) {
            // Użytkownik istnieje, sprawdzenie hasła
            $login_query = mysqli_prepare($conn, "SELECT uLogin, uPass FROM uzytkownicy WHERE uLogin=?");
    
            if (!$login_query) {
                die('Login query preparation failed: ' . mysqli_error($conn));
            }
    
            mysqli_stmt_bind_param($login_query, 's', $login);
            $login_execute = mysqli_stmt_execute($login_query);
    
            if (!$login_execute) {
                die('Login query execution failed: ' . mysqli_error($conn));
            }
    
            mysqli_stmt_bind_result($login_query, $uLogin, $uPass);
            mysqli_stmt_fetch($login_query);
            mysqli_stmt_close($login_query);
    
            // Sprawdzenie hasła
            if (password_verify($pass, $uPass)) {
                $_COOKIE['message'] = "";
                echo "Login i hasło zgodne<br>";
                $_SESSION['login'] = $uLogin;
                header("Location: dashboard.php");
            } else {
                $_COOKIE['message'] = "Błędne hasło";
                session_destroy();
                include("signin_panel.php");
            }
        } else {
            // Użytkownik nie istnieje
            $_COOKIE['message'] = "Użytkownik o podanym loginie nie istnieje<br>";
            session_destroy();
            include("signin_panel.php");
        }
    }
     
?>
