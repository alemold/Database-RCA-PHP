<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css" />
	<title>Inserimento dati proprietario e auto</title>
</head>
<body>
    <div id="container">
	<form action="creazioneDatabase.php" method="post">
        <h2 class="dati_utente">Dati Utente</h2>

        <form action="creazioneDatabase.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="cognome">Cognome:</label>
            <input type="text" id="cognome" name="cognome" required><br><br>

            <label for="cf">Codice fiscale:</label>
            <input type="text" id="cf" name="cf" required><br><br>

            <input type="submit" value="Invia">
	    </form>
    </div>
</body>
</html>

<?php

?>