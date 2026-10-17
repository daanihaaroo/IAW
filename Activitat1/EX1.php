<?php
// 1. GESTIÓ DE LA COOKIE DE VISITES (Només sumem si NO s'ha enviat el formulari)
$contador = 1;

if (isset($_COOKIE['contador'])) {
    $contador = (int)$_COOKIE['contador'];
}

// Només incrementem si no s'acaba de prémer el botó de comprar (mètode POST)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $contador++;
    setcookie('contador', $contador, time() + 3600);
}

// Missatge si s'ha enviat el formulari
$missatge = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codi = $_POST['codi'] ?? '';
    $missatge = "Has intentat comprar amb el codi: " . htmlspecialchars($codi);
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Comptador de Visites</title>
</head>
<body>
    <h1>Comptador de Visites</h1>
    
    <!-- Mostrem el nombre de visites -->
    <p>Has visitat aquesta pàgina <strong><?php echo $contador; ?></strong> vegades.</p>

    <!-- Missatge del formulari si s'ha enviat -->
    <?php if (!empty($missatge)): ?>
        <p style="color: blue;"><?php echo $missatge; ?></p>
    <?php endif; ?>

    <!-- 2. MISSATGES DE DESCOMPTE -->
    <?php if ($contador >= 10): ?>
        <p>Oferta exclusiva sols per a tu! Utilitza el codi <strong>BOTIGA50</strong> per obtenir un 50% de descompte en les teves primeres compres a la botiga</p>
    <?php elseif ($contador >= 5): ?>
        <p>Oferta exclusiva! Utilitza el codi <strong>BOTIGA20</strong> per obtenir un 20% de descompte en les teves primeres compres a la botiga</p>
    <?php endif; ?>

    <!-- 3. FORMULARI -->
    <form action="EX1.php" method="POST">
        <label>Codi de descompte:</label>
        <input type="text" name="codi">
        <button type="submit">Comprar</button>
    </form>
</body>
</html>