<?php
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
    <script src="check.js"></script>
    <title>Inserimento dati Auto</title>
</head>

<body>
    <div id="container">
        <h2 class="testo">Dati auto</h2>
        
        <form action="creazioneDatabase.php" method="POST" onsubmit="return validateSelect()">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br>

        <label for="modello">Modello:</label>
        <input type="text" id="modello" name="modello" required><br>

        <label for="targa">Targa:</label>
        <input type="text" id="targa" name="targa" required><br>
        <div id="targaInvalida"></div>

        <label for="Proprietario">Codice Fiscale del proprietario:</label>
        <?php
            if($result->num_rows > 0) {
                echo "<select name='cfProp' id='cfProp'>";
                echo "<option value='invalid'>Scegli codice fiscale</option>";
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["codiceFiscale"] . "'>" . $row["codiceFiscale"] . "</option>";
                }
                echo "</select><br>";
            } else {
                echo "0 proprietari presenti";
            }

            $conn->close();
        ?>
        <div id="cfnotvalid"></div>

        <input type="submit" value="Invia">
        </form>
    </div>

</body>
</html>

