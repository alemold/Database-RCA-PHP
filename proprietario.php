<?php  
session_start();
if (isset($_SESSION["username"])) {
	echo "Benvenuto" . " " . $_SESSION["username"];
	echo '<a href="auth/logout.php">    Logout</a>'; 
} else {
	echo '<a href="login.php">Login</a>'; 
}

if($_SESSION["ruolo"] !== 'Admin') {
    header("Location:auth/notAdmin.html");
}
?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="check.js"></script>
	<title>Inserimento dati proprietario e auto</title>
</head>
<body>
    <div id="container">
        <h2 class="testo">Dati Proprietario</h2>

        <form action="creazioneDatabase.php" method="POST" onsubmit="return invia(this)">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" required><br><br>

            <label for="cf">Codice fiscale:</label>
            <input type="text" id="cf" name="cf" required><br><br>
            <div id="cfInvalid"></div>

            <input type="submit" value="Invia">

            <br>
            <a href="index.php">Torna alla home</a>
	    </form>
    </div>
</body>
</html>
<style>
		a {
			text-decoration: none;
		}
</style>
