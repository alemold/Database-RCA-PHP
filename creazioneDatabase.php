<?php
$con = "mysql:host=localhost;dbname=rca";
$user = "root";
$psw = "";


try {
    $db = new PDO($con, $user, $psw);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<a href='index.php'>Torna alla home</a><br><br>";

    $tableProprietario = "CREATE TABLE IF NOT EXISTS proprietario (
        codiceFiscale VARCHAR(16) PRIMARY KEY,
        nome VARCHAR(50) NOT NULL,
        cognome VARCHAR(50) NOT NULL
        )";

    $tableAuto = "CREATE TABLE IF NOT EXISTS auto (
        targa VARCHAR(7) PRIMARY KEY,
        marca VARCHAR(50) NOT NULL,
        modello VARCHAR(50) NOT NULL,
        codiceFiscale VARCHAR(16) NOT NULL,
        FOREIGN KEY (codiceFiscale) REFERENCES proprietario(codiceFiscale)
        )";

    $db->exec($tableProprietario);
    $db->exec($tableAuto);

} catch(PDOException $e) {
    echo "Errore: " . $e->getMessage();
}

// DATI PROPRIETARIO
if(isset($_POST["nome"]) and isset($_POST["cognome"]) and isset($_POST["cf"])) {
    $nomeProprietario = $_POST["nome"];
    $cognomeProprietario = $_POST["cognome"];
    $codiceFiscale = $_POST["cf"];

    echo "DATI PROPRIETARIO: <br> Nome: <strong>" . $nomeProprietario . "</strong><br> Cognome: <strong>" . $cognomeProprietario . "</strong><br> Codice Fiscale: <strong>" . $codiceFiscale . "</strong>";

    try {
        $datiProprietario = "INSERT INTO proprietario (codiceFiscale, nome, cognome)
        VALUES ('$codiceFiscale', '$nomeProprietario', '$cognomeProprietario')";

        $db->exec($datiProprietario);
        echo "<br><br>Dati registrati correttamente!";
    } catch (PDOException $e) {
        echo "<br>Errore: " . $e->getMessage();
    }
}


// DATI AUTO
if (isset($_POST["targa"]) and isset($_POST["marca"]) and isset($_POST["modello"]) and isset($_POST["cfProp"])) {
    $targa = $_POST["targa"];
    $marca = $_POST["marca"];
    $modello = $_POST["modello"];
    $cfProprietario = $_POST["cfProp"];

    echo "DATI AUTO: <br> Targa: <strong>" . $targa . "</strong><br> Marca: <strong>" . $marca . "</strong><br> Modello: <strong>" . $modello . "</strong>";
    echo "<br> Codice Fiscale del proprietario: <strong>" . $cfProprietario . "</strong>";

    try {
        $datiAuto = "INSERT INTO auto
        VALUES ('$targa', '$marca', '$modello', '$cfProprietario')";

        $db->exec($datiAuto);
        echo "<br><br>Dati registrati correttamente!";
    } catch (PDOException $e) {
        echo "<br>Errore: " . $e->getMessage();
    }
}

?>