<?php
session_start();

$con = "mysql:host=localhost;dbname=rca";
$user = "root";
$psw = "";

try {
    $db = new PDO($con, $user, $psw);

} catch (PDOException $e) {
    echo "Errore " . $e->getMessage();
}

//REGISTRAZIONE
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


//CONTROLLO LOGIN CON DATI DAL DATABASE
if (isset($_POST["username"]) and $_POST["password"]) {
    $userLogin = $_POST["username"];
    $pswLogin = $_POST["password"];

    try {
        $query = "SELECT username, password FROM utenti WHERE username = :username AND password = :password";  
        $statement = $db->prepare($query);  
        $statement->execute(  
                        array(  
                            'username'     =>     $_POST["username"],  
                            'password'     =>     $_POST["password"],
                        )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  {  
                    $_SESSION["username"] = $_POST["username"];  

                    $nomeUtente = $_POST["username"];
                    $data = $db->query("SELECT ruolo FROM utenti WHERE username='$nomeUtente'")->fetchAll();
                    foreach ($data as $row) {
                        $ruolo = $row['ruolo'];
                    }
                    if ($ruolo == "Admin") {
                        $_SESSION["ruolo"] = "Admin";
                    } else {
                        $_SESSION["ruolo"] = "Utente";
                    }
                    
                    header("location:auth/login_success.php");  
                }  
                else  {  
                    echo "Nome utente o password non corretti, <a href='login.php'>accedi</a> di nuovo: ";
                }
    } catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
    }
}

?>