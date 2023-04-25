<?php
session_start();
if (isset($_SESSION["username"])) {
	echo "Benvenuto" . " " . $_SESSION["username"];
	echo '<a href="auth/logout.php">    Logout</a>'; 
} else {
	echo '<a href="login.php">Login</a>'; 
}

$con = "localhost";
$user = "root";
$psw = "";
$dbname = "rca";

$conn = new mysqli($con, $user, $psw, $dbname);
if ($conn->connect_error) {
    die("Connessione Fallita: " . $conn->connect_error);
}
$sql = "SELECT codiceFiscale FROM proprietario";
$result = $conn->query($sql);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<title>Inserimento dati proprietario e auto</title>
</head>
<body>
    <div id="container">
        <h2 class="testo">Dati Proprietario</h2>

        <form action="risultato.php" method="POST">
            <?php
                if($result->num_rows > 0) {
                    echo "<select name='cfProp' id='cfProp'>";
                    echo "<option value='invalid'>Scegli codice fiscale</option>";
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["codiceFiscale"] . "'>" . $row["codiceFiscale"] . "</option>";
                    }
                    echo "</select><br>";
                } else {
                    echo "0 proprietari presenti. Non è possibile cercare un auto senza proprietario.";
                }
                $conn->close();
            ?>

            <input type="submit" value="Invia">

            <br>
            <a href="index.php">Torna alla home</a>
	    </form>
    </div>
</body>
</html>