<?php
// 1. Iniciem la sessió (sempre a dalt de tot)
session_start();

// 2. Si venim d'enviar el formulari (mètode POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuari_ingresat = trim($_POST['usuari'] ?? '');
    $pwd_ingresada = trim($_POST['contrasenya'] ?? '');

    // Permet accedir amb qualsevol nom (comprocant que l'usuari no estigui buit i la contrasenya sigui igual)
    if (!empty($usuari_ingresat) && $usuari_ingresat === $pwd_ingresada) {
        // Guardem el nom d'usuari introduït a la sessió
        $_SESSION['usuari'] = $usuari_ingresat;
    } else {
        // Si no coincideixen o està buit, redirigim al formulari
        header("Location: index.html");
        exit();
    }
}

// 3. Si no hi ha cap sessió iniciada, el tirem fora cap al login
if (!isset($_SESSION['usuari'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pàgina de Contingut</title>
</head>
<body>
    <!-- A la part superior ha d'aparèixer el nom de l'usuari -->
    <div style="background-color: #f0f0f0; padding: 10px; margin-bottom: 20px;">
        <p>Benvingut/da, <strong><?php echo htmlspecialchars($_SESSION['usuari']); ?></strong></p>
    </div>

    <h1>Pàgina d'Informació Protegida</h1>
    <p>Aquesta informació només la poden veure els usuaris loguejats correctament.</p>
    
    <br>
    <a href="pagina2.php">Ves a la segona pàgina d'informació</a>
</body>
</html>