<?php
$con = "mysql:host=localhost;dbname=rca";
$user = "root";
$psw = "";

try {
    $db = new PDO($con, $user, $psw);
    echo "Sei collegato al database rca" . "<br>";

    $tableProprietario = "CREATE TABLE proprietario (
        codiceFiscale VARCHAR(16) PRIMARY KEY,
        nome VARCHAR(50) NOT NULL,
        cognome VARCHAR(50) NOT NULL
        )";

    // $tableAuto = "CREATE TABLE auto (
    //     targa VARCHAR(7) PRIMARY KEY,
    //     marca VARCHAR(50) NOT NULL,
    //     modello VARCHAR(50) NOT NULL,s
    //     FOREIGN KEY (codiceFiscale) REFERENCES proprietario(codiceFiscale)
    //     )";

    $db->exec($tableProprietario);

    // if ($db->query($tableAuto) === TRUE) {
    //     echo "Tabella AUTO creata senza nessun tipo di problema" . "<br>";
    // } else {
    //     echo "Errore durante la creazione della tabella AUTO" . "<br>";
    // }

    
    

} catch(PDOException $e) {
    echo "Errore: " . $e->getMessage();
}

?>