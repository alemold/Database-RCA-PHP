<?php
session_start();
// $_SESSION["usernameSession"] = $_POST["username"];
// $_SESSION["passwordSession"] = $_POST["password"];

$con = "mysql:host=localhost;dbname=rca";
$user = "root";
$psw = "";

try {
    $db = new PDO($con, $user, $psw);

    // $username = $_POST["username"];
    // $password = $_POST["password"];
    // echo "Dati session: " . $_SESSION["usernameSession"] . $_SESSION["passwordSession"];

} catch (PDOException $e) {
    echo "Errore " . $e->getMessage();
}

if (isset($_POST["usernameReg"]) and $_POST["passwordReg"]) {
    $username = $_POST["usernameReg"];
    $password = $_POST["passwordReg"];
    $ruolo = "Utente";
    
    try {
        $sql = "INSERT INTO utenti (username, password, ruolo)
        VALUES ('$username', '$password', '$ruolo')";
        //proteggere da sqlinjection
        $db->exec($sql);
        echo "Registrazione effettuata senza nessun tipo di problema" . "<br>";
        echo "<a href='index.php'>Home</a>";
    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
    }
}

?>