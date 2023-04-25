<?php  
session_start();  
if(isset($_SESSION["username"]))  
{  
    echo '<h3>Accesso effettuato! Benvenuto '.$_SESSION["username"].'</h3>';  
    echo '<h3>Ruolo: '.$_SESSION["ruolo"].'</h3>';  
    echo '<br /><br /><a href="../index.php">Home</a>';   
    echo '<br /><br /><a href="../auto.php">Aggiungi auto</a>';  
    echo '<br /><br /><a href="../proprietario.php">Aggiungi Proprietario</a>';  
    echo '<br /><br /><a href="logout.php">Logout</a>'; 
}  
else  
{  
    header("location:../login.php");  
}  
?> 