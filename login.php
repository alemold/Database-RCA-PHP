<?php

?>

<html>
    <head>
        <title>Login Session</title>
	    <link rel="stylesheet" href="menu.css">
</head>
<body>
    <div class="container">
        <div class="box">
            Accesso al sistema<br>
            Inserisci le tue credenziali:
            <form action="verifica.php" method="POST">
                <input type="text" name="username" placeholder="Nome utente" required><br>
                <input type="password" name="password" placeholder="Password" required><br>

                <input type="submit" value="Invia">
            </form>
            <a href="index.php">Home</a>
        </div>
    </div>
</body>
</html>