<?php
session_start();

// Si no està loguejat, fora
if (!isset($_SESSION['usuari'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Segona Pàgina</title>
</head>
<body>
    <div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 20px;">
        <p>Usuari connectat: <strong><?php echo htmlspecialchars($_SESSION['usuari']); ?></strong></p>
    </div>

    <h1>Segona Pàgina d'Informació</h1>
    <p>La sessió es manté activa entre diferents pàgines del lloc web gràcies al Session ID.</p>
    
    <br>
    <a href="login.php">Torna a la primera pàgina</a>
</body>
</html>