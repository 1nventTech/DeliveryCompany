<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/panels.css" />
    <title>Login Panel</title>
  </head>
  <body>
    <style>
      p{
        color:red;
      }
    </style>
    <div class="form">
      <h2>Login</h2>
      <form action="signin.php" method="POST">
        <label for="login">Username:</label>
        <input type="text" id="login" name="login" required /><br />

        <label for="pass">Password:</label>
        <input type="password" id="pass" name="pass" required />
        <p><?php if(isset($_COOKIE["message"])) echo "<p style='color:red'>".$_COOKIE['message']."</p>" ?></p>

        <button type="submit">Login</button>
      </form>
    </div>
  </body>
</html>
