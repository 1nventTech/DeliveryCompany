<?php
    session_start();
    if(!isset($_COOKIE['message'])) setcookie('message',"",time() + 60);
    
    if (isset($_SESSION['login']) && isset($_POST['logout'])) {
        session_destroy();
        header("Location: index.html");
        exit("Wylogowywanie...");
    }

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
    <link rel="stylesheet" href="style/dashboard.css">
    <title>Dashboard - <?php echo getLogName(); ?></title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #333;
        display:flex;
    }

    #right_panel {
        align-items: center;
        text-align:center;
        justify-content: center;
    }
    input[type="text"] {
        padding:10px;
        margin:10px;
        border-radius:10px;
    }
    input[type="submit"] {
        background-color: #ffad33;
        margin-top: 25px;
        color: #333;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 80%;
    }
    label {
        color:white;
    }
    #branchTable {
        display:flex;
    }
    table {
        background-color: #ffad33;
        border-collapse: collapse;
        width: 80%;
        align-self: start;
        margin: 20px auto;
        margin-top: 20%;
    }
    tr,td {
        padding:10px;
    }
    #oddzRejHeader {
        color:white;
        display:block;
        margin:10px;
        font-family:monospace;
    }
</style>
<body>
<!-- <i class="fa-solid fa-user-shield"></i> -->        <!--    Admin ico      -->
    <div id="left_panel">
        <div>
            <div>
                <i class="fa-solid fa-user"></i>
                <h1><?PHP echo getLogName(); ?></h1 >
                <hr>
            </div>
            <div class="user_nav">
                <form action="" method="post">
                    <input name="logout" type="submit" value="Wyloguj">
                </form>
            </div>
        </div>
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
    <div id="right_panel">
        <h1 id="oddzRejHeader">Rejstracja Oddziału</h1>
        <form action="register_branch.php" method="post">
            <label>Nazwa Oddziału:</label>
            <input type="text" name="nazwaOddzialu">
            <label>Ulica:</label>
            <input type="text" name="ulica">
            <label>Numer Domu:</label>
            <input type="text" name="nrDomu">
            <label>Numer Lokalu:</label>
            <input type="text" name="nrLokalu"><br>
            <label>Kod Pocztowy:</label>
            <input type="text" name="kodPocztowy">
            <label>Miejscowość:</label>
            <input type="text" name="miejscowosc">
            <label>Telefon:</label>
            <input type="text" name="tel">
            <label>E-Mail:</label>
            <input type="text" name="mail"><br>
            <input type="submit" value="Zarejstruj odzział">
        </form>
        <div id="branchTable">
            <?php
                $host = "localhost";
                $user = "root";
                $pass = "";

                $conn = new mysqli($host,$user,$pass);
                $conn->select_db('firma_kurierska2023');
                $sql = "SELECT * FROM oddzial_firmy";
                $result = $conn->query($sql);

                // Display data in HTML table
                if ($result->num_rows > 0) {
                    echo "<table border='1'>";
                    echo "<tr><th>ID</th><th>Nazwa Oddziału</th><th>Ulica</th><th>Nr Domu</th><th>Nr Lokalu</th><th>Kod Pocztowy</th><th>Miasto</th><th>Telefon</th><th>Email</th></tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["id_oddzialu"]."</td>";
                        echo "<td>".$row["nazwa_oddzialu"]."</td>";
                        echo "<td>".$row["ulica_oddzialu"]."</td>";
                        echo "<td>".$row["nr_domu_oddzialu"]."</td>";
                        echo "<td>".$row["nr_lokalu_oddzialu"]."</td>";
                        echo "<td>".$row["kod_oddzialu"]."</td>";
                        echo "<td>".$row["miasto_oddzialu"]."</td>";
                        echo "<td>".$row["tel_oddzialu"]."</td>";
                        echo "<td>".$row["email_oddzialu"]."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <div class="settings">
        <div class="bg">
            <div class="info">
                <!-- Treść -->
                <button class="close-btn">Zamknij</button>
            </div>
        </div>
    </div>
    <script src="./dashboard.js"></script>
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