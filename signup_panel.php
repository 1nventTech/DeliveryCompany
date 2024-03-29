<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/panels.css">
    <title>Rejestracja</title>
</head>
<body>
    <div class="form">
        <h2>Rejestracja</h2>
        <form action="signup.php" method="post">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required><br>

            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" required>
            <p>
                <?php
                if (isset($_COOKIE['message'])) {
                    if ($_COOKIE["message"] == "Pomyślnie zarejestrowano użytkownika" || $_COOKIE["message"] == "Użytkownik istnieje!") {
                        echo "<p style='color:green'>".$_COOKIE['message']."</p>";
                    } else {
                        echo "<p style='color:red'>".$_COOKIE['message']."</p>";
                    }
                }
                ?>
            </p>

            <button type="submit">Rejestruj</button>
        </form>
    </div>
</body>
</html>
