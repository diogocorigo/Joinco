<?php
include('includes/_server.php')
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Joinco - Login</title>
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/joinco_icon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script>
</head>

<body>
    <script src="db/users.js" type="text/javascript"></script>
    <script src="js/login.js" type="text/javascript"></script>

    <div class="opacity">

        <main id="main">
            <img src="img/joinco-logo.png" alt="Logotipo" width="390" class="logo">
            
            <label class="error" id="errorName">Username not found</label><br>
            <label class="error" id="errorCompatible">Username and password do not correspond</label><br>
            
            <label for="inputEmail">Email address</label>
            <input type="email" id="inputEmail" placeholder="Email/Username" required autofocus>
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" placeholder="Password" required>
            <button id="signin" onclick=checkUser()>Sign in</button>
        </main>

    </div>



</body>

</html>