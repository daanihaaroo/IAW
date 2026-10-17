<?php
session_start();

// Si l'usuari clica a confirmar la compra, netegem la cistella i simulem el pagament
$comprat = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {
    $_SESSION['cistella'] = null;
    $comprat = true;
}

// Comprovem si la cistella està buida o no
$cistella = $_SESSION['cistella'] ?? null;
?>
<!DOCTYPE html>
<head>
    <title>Resum de la Compra</title>
</head>
<body>
    <h1>Resum de la teva Cistella</h1>

    <?php if ($comprat): ?>
        <p style="color: green; font-weight: bold; font-size: 18px;">¡Gràcies per la teva compra! El pagament s'ha completat amb èxit.</p>
        <a href="index.php">Tornar a la botiga</a>
    <?php elseif ($cistella === null): ?>
        <p>No hi ha cap cistella activa o la compra ja s'ha finalitzat.</p>
        <a href="index.php">Tornar a la botiga</a>
    <?php else: ?>
        <table border="1" cellpadding="10" style="border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <th>Producte</th>
                <th>Preu Unitari</th>
                <th>Quantitat</th>
                <th>Total</th>
            </tr>
            <?php 
            $preuTotalGlobal = 0;
            $hi_ha_productes = false;

            foreach ($cistella as $nom => $detalls) {
                if ($detalls['quantitat'] > 0) {
                    $hi_ha_productes = true;
                    $subtotal = $detalls['preu'] * $detalls['quantitat'];
                    $preuTotalGlobal += $subtotal;
                    echo "<tr>
                            <td>$nom</td>
                            <td>{$detalls['preu']} €</td>
                            <td>{$detalls['quantitat']}</td>
                            <td>$subtotal €</td>
                          </tr>";
                }
            }
            ?>
        </table>

        <?php if (!$hi_ha_productes): ?>
            <p>La teva cistella està buida.</p>
            <br>
            <a href="index.php">Tornar a comprar</a>
        <?php else: ?>
            <h2>Preu Total: <?php echo $preuTotalGlobal; ?> €</h2>

            <!-- Botó per confirmar i pagar -->
            <form action="resum.php" method="POST">
                <button type="submit" name="confirmar" style="background-color: #008CBA; color: white; padding: 10px 15px; font-size: 16px; cursor: pointer;">Confirmar i pagar</button>
            </form>
            <br>
            <a href="index.php">Continuar comprant</a>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>