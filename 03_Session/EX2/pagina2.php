<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Segona Pàgina Protegida</title>
</head>
<body>
    <!-- Part superior amb el nom i el botó de desconnexió -->
    <div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <p style="margin: 0;">Usuari connectat: <strong><?php echo htmlspecialchars($_SESSION['usuari']); ?></strong></p>
        <a href="logout.php" style="color: red; text-decoration: none; font-weight: bold;">Tancar sessió (Logout)</a>
    </div>

    <h1>Segona Pàgina d'Informació</h1>
    <p>La sessió es manté i pots tancar-la des d'aquí o tornar a l'inici.</p>
    
    <br>
    <a href="login_ampl.php">Torna a la primera pàgina</a>
</body>
</html>