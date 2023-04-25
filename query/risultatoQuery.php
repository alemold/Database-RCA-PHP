<?php
$con = "mysql:host=localhost;dbname=rca";
$user = "root";
$psw = "";

try {
    $db = new PDO($con, $user, $psw);
} catch (PDOException $e) {
    echo "Impossibile collegarsi al database";
}

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

echo '<br><a href="../index.php">Torna alla Home</a>';
$sql = $_POST["query"];
echo "<br>Query scritta: " . $sql . "<br>";
$result = $db->query($sql)->fetchAll();
foreach ($result as $row) {
    echo "<br>" . $row[0] . "<br>";
    echo $row[1] . "<br>";
    echo $row[2] . "<br>";
    echo $row[3] . "<br>";
}
?>

