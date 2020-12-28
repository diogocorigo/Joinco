<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Joinco - Login</title>
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="img/joinco_icon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/login.js" type="text/javascript"></script>
  </head>
  <body>
    <div class="opacity">
      <main id="main">
        <img
          src="img/joinco-logo.png"
          alt="Logotipo"
          width="390"
          class="logo"
        />

        <label id="error_vazio"></label><br />

        <label for="inputEmail">Email address</label>
        <input
          type="email"
          id="inputEmail"
          placeholder="Email/Username"
          required
          autofocus
        />
        <label for="inputPassword">Password</label>
        <input
          type="password"
          id="inputPassword"
          placeholder="Password"
          required
        />
        <button id="signin">Sign in</button>
      </main>
    </div>
  </body>
</html>
