<?php  
session_start();
if (isset($_SESSION["username"])) {
	echo "Benvenuto" . " " . $_SESSION["username"];
	echo '<a href="auth/logout.php">    Logout</a>'; 
} else {
	echo '<a href="login.php">Login</a>'; 
}
?>


<html>
<head>
	<title>Creazione Database</title>
	<link rel="stylesheet" href="menu.css">
</head>
<body>
	<nav>
		<div class="container">
			<div class="box">
				<h2>Scegli la pagina per creare i dati</h2>
				<p>Qui puoi scegliere di creare un database, inserire un proprietario o inserire un'auto.</p>
			<ul>
				<li><a href="creazioneDatabase.php">Crea Database</a></li>
				<li><a href="proprietario.php">Inserimento Proprietario</a></li>
				<li><a href="auto.php">Inserimento Auto</a></li>
				<li><a href="query/query.php">Inserimento Query</a></li>
				<li><a href="cercaAuto.php">Cerca auto</a></li><br>
				<a href="login.php">Accedi</a><br>
				Non sei registrato?
				<a href="registrazione.php">Registrati</a>
			</ul>
	</nav>
			</div>
			<div class="box2">
				

			</div>
		</div>

	<style>
		a {
			text-decoration: none;
		}
	</style>
</body>
</html>