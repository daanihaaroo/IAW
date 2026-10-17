<?php
session_start();

// Si rebem dades del formulari per POST, validem
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuari_ingresat = trim($_POST['usuari'] ?? '');
    $pwd_ingresada = trim($_POST['contrasenya'] ?? '');

    if (!empty($usuari_ingresat) && $usuari_ingresat === $pwd_ingresada) {
        $_SESSION['usuari'] = $usuari_ingresat;
    } else {
        header("Location: index.html");
        exit();
    }
}

// Si no hi ha sessió iniciada, fora
if (!isset($_SESSION['usuari'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pàgina Principal Protegida</title>
</head>
<body>
    <!-- Part superior amb el nom i el botó de desconnexió (logout) -->
    <div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <p style="margin: 0;">Benvingut/da, <strong><?php echo htmlspecialchars($_SESSION['usuari']); ?></strong></p>
        <a href="logout.php" style="color: red; text-decoration: none; font-weight: bold;">Tancar sessió (Logout)</a>
    </div>

    <h1>Pàgina d'Informació 1</h1>
    <p>Aquesta és la primera pàgina de contingut protegit amb opció de desconnexió.</p>
    
    <br>
    <a href="pagina2.php">Ves a la segona pàgina d'informació</a>
</body>
</html>