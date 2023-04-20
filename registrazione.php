<?php

?>

<html>
    <head>
        <title>Login Session</title>
	    <link rel="stylesheet" href="menu.css">
        <script src="check.js"></script>
</head>
<body>
    <div class="container">
        <div class="box">
            <form action="verifica.php" method="POST" onsubmit="return checkPassword()">
                <input type="text" name="usernameReg" placeholder="Nome utente"><br>
                <input type="password" id="pass1" name="passwordReg" placeholder="Password"><br>
                <input type="confermaPassword" id="pass2" name="passwordConf" placeholder="Conferma Password"><br>
                <p id="passDiversa"></p>

                <input type="submit" value="Invia">
            </form>
        </div>
    </div>
</body>
</html>     