<?php
    session_start();

    function getLogName() {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login']; 
        } else { 
            header("Location: index.html"); 
            return "";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/dashboard.css">
    <title>Dashboard - <?php echo getLogName(); ?></title>
</head>
<body>
    <div id="left_panel">
        <div>
            <img src="" alt="">
            <h1><?PHP echo getLogName(); ?></h1 >
            <!-- <hr> -->
            <form action="" method="post">
                <input name="logout" type="submit" value="Wyloguj">
            </form>
        </div>
        <div class="user_nav">
            <div>
                <p>Dane Oddziału</p>
                <p>Klienci servisu</p>
                <p>Pracownicy Serwisu</p>
                <p>Kartoteka</p>
                <p>Opcje</p>
            </div>
            <div>
                <p id="settings">Settings</p>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    if (isset($_SESSION['login'])) {
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: index.html");
            exit("Wylogowywanie...");
        }
    }
?>