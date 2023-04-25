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
        <title>Query</title>
	    <link rel="stylesheet" href="../menu.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <form action="risultatoQuery.php" method="POST">
                Inserisci la query:
                <input type="text" name="query" placeholder="Query" required><br>

                <input type="submit" value="Invia"><br>
                <a href="../index.php">Torna alla home</a>
            </form>
        </div>
    </div>
</body>
</html>  