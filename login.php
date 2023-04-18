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
            <form action="verifica.php" method="POST">
                <input type="text" name="username" placeholder="Nome utente"><br>
                <input type="text" name="password" placeholder="Password"><br>

                <input type="submit" value="Invia">
            </form>
        </div>
    </div>
</body>
</html>