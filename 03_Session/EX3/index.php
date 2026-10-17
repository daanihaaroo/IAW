<?php
session_start();

// Si no existeix la cistella a la sessió, la creem buida
if (!isset($_SESSION['cistella'])) {
    $_SESSION['cistella'] = [
        'Vi Les Terrasses' => ['preu' => 39, 'quantitat' => 0],
        'Vi Cepa 21' => ['preu' => 22, 'quantitat' => 0]
    ];
}

// Si l'usuari clica per afegir un producte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['afegir'])) {
    $producte = $_POST['producte'];
    $quantitat = (int)$_POST['quantitat'];

    if ($quantitat > 0 && isset($_SESSION['cistella'][$producte])) {
        // Acumulem la quantitat si ja n'havia afegit abans
        $_SESSION['cistella'][$producte]['quantitat'] += $quantitat;
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Botiga - Cistella de Compra</title>
</head>
<body>
    <h1>Botiga de Vins Online</h1>
    <p>Selecciona la quantitat de productes que vols afegir a la cistella:</p>

    <!-- Producte 1 -->
    <form action="index.php" method="POST" style="margin-bottom: 15px; border: 1px solid #ccc; padding: 10px; width: 300px;">
        <h3>Vi Les Terrasses</h3>
        <p>Preu: 39 €</p>
        <input type="hidden" name="producte" value="Vi Les Terrasses">
        <label>Quantitat:</label>
        <input type="number" name="quantitat" value="1" min="1" style="width: 50px;">
        <button type="submit" name="afegir">Afegir a la cistella</button>
    </form>

    <!-- Producte 2 -->
    <form action="index.php" method="POST" style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px; width: 300px;">
        <h3>Vi Cepa 21</h3>
        <p>Preu: 22 €</p>
        <input type="hidden" name="producte" value="Vi Cepa 21">
        <label>Quantitat:</label>
        <input type="number" name="quantitat" value="1" min="1" style="width: 50px;">
        <button type="submit" name="afegir">Afegir a la cistella</button>
    </form>

    <hr>
    <!-- Botó per anar al resum de la compra -->
    <a href="resum.php" style="font-size: 18px; font-weight: bold; background-color: #4CAF50; color: white; padding: 10px 15px; text-decoration: none;">Finalitzar compra (Veure Cistella)</a>
</body>
</html>