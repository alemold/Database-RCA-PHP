<?php
session_start();

$con = "mysql:host=localhost;dbname=rca";
$user = "root";
$psw = "";

try {
    $db = new PDO($con, $user, $psw);

    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["usernameSession"] = $_POST["username"];
    $_SESSION["passwordSession"] = $_POST["passwordSession"];

    echo $username . $password;

    echo "Dati session: " . $_SESSION["usernamePassword"] . $_SESSION["passwordSession"];

} catch (PDOException $e) {
    echo "Errore " . $e->getMessage();
}

?>