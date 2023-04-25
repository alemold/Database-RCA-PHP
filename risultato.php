<?php
$con = "mysql:host=localhost;dbname=rca";
$user = "root";
$psw = "";

try {
    $db = new PDO($con, $user, $psw);
} catch (PDOException $e) {
    echo "Impossibile collegarsi al database";
}

//Risultato ricerca auto
if (isset($_POST["cfProp"])) {
    $cf = $_POST["cfProp"];
    $contatore = 1;
    $data = $db->query("SELECT auto.* FROM auto INNER JOIN proprietario USING(codiceFiscale) WHERE codiceFiscale='$cf'")->fetchAll();
    echo "Veicoli di: " . $cf;
    foreach ($data as $row) {
        echo "<br>Veicolo numero: " . $contatore . "<br>"; 
        echo "Targa: " . $row['targa'] . "<br>";
        echo "Marca: " . $row['marca'] . "<br>";
        echo "Modello: " . $row['modello'] . "<br>";
        $contatore++;
    }
    
    echo "<br><br><a href='index.php'>Torna alla home</a>";
}

?>