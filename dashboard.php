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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/dashboard.css"> -->
    <title>Dashboard - <?php echo getLogName(); ?></title>
</head>
<style>
    body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #333;
}

#left_panel {
    width: 30%;
    height: 100vh;
    background-color: #000;
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

#left_panel img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-bottom: 10px;
}

h1 {
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
}

h1 i {
    margin-right: 10px;
}

form {
    margin-top: 10px;
}

.user_nav {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.user_nav div {
    width: 100%;
}

.user_nav p {
    padding: 10px;
    margin: 0;
    cursor: pointer;
    border-bottom: 1px solid #444;
}

.user_nav p:last-child {
    border: none;
}

#settings {
    margin-top: 20px;
}

.fa-user {
    border: 1px solid white;
    padding: 30px;
    font-size: 40px;
    border-radius: 50%;
}

</style>
<body>
<!-- <i class="fa-solid fa-user-shield"></i> -->        <!--    Admin ico      -->
    <div id="left_panel">
        <div>
            <i class="fa-solid fa-user"></i>
            <h1><?PHP echo getLogName(); ?></h1 >
            <!-- <hr> -->
            <form action="" method="post">
                <input name="logout" type="submit" value="Wyloguj">
            </form>
        </div>
        <div class="user_nav">
            <div>
                <p><i class="fa-solid fa-warehouse"></i> Dane Oddziału</p>
                <p><i class="fa-solid fa-users"></i> Pracownicy Serwisu</p>
                <p><i class="fa-solid fa-users-line"></i> Klienci servisu</p>
                <p><i class="fa-solid fa-folder-open"></i> Kartoteka</p>
                <p><i class="fa-solid fa-filter"></i> Opcje</p>
            </div>
            <div>
                <p id="settings"><i class="fa-solid fa-gear"></i>Settings</p>
            </div>
        </div>
    </div>
</body>
</html>
<!-- <i class="fa-solid fa-skull"></i> -->              <!-- skul iz cul  -->
<!-- <i class="fa-solid fa-flask"></i> -->              <!--    poison    -->
<?php
    if (isset($_SESSION['login'])) {
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: index.html");
            exit("Wylogowywanie...");
        }
    }
?>