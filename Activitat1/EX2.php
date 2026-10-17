<?php
// 1. SI SE ENVÍA EL FORMULARIO, CREAMOS LAS COOKIES
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    setcookie('majoredat', $_POST['majoredat'] ?? 'no', time() + 3600);
    setcookie('idioma', $_POST['idioma'] ?? 'catala', time() + 3600);
    setcookie('moneda', $_POST['moneda'] ?? 'euros', time() + 3600);

    // Recargamos el propio archivo actual dinámicamente
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// 2. SI EL USUARIO QUIERE CAMBIAR PREFERENCIAS, BORRAMOS LAS COOKIES
if (isset($_GET['recurs'])) {
    setcookie('majoredat', '', time() - 3600);
    setcookie('idioma', '', time() - 3600);
    setcookie('moneda', '', time() - 3600);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// 3. RECUPERAMOS EL VALOR DE LAS COOKIES
$majoredat = $_COOKIE['majoredat'] ?? null;
$idioma = $_COOKIE['idioma'] ?? 'catala';
$moneda = $_COOKIE['moneda'] ?? 'euros';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Bodega Online</title>
</head>
<body>
    <h1>Botiga de Vins</h1>

    <?php if ($majoredat === null): ?>
        <!-- FORMULARIO DE CONFIGURACIÓN -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <fieldset>
                <legend>Configuració de l'usuari</legend>
                
                <p>Ets major d'edat?</p>
                <label><input type="radio" name="majoredat" value="si" required> Sí</label>
                <label><input type="radio" name="majoredat" value="no"> No</label>

                <p>Selecciona l'idioma:</p>
                <select name="idioma">
                    <option value="catala">Català</option>
                    <option value="espanyol">Español</option>
                    <option value="angles">English</option>
                </select>

                <p>Selecciona la moneda:</p>
                <select name="moneda">
                    <option value="euros">Euros (€)</option>
                    <option value="lliures">Lliures (£)</option>
                    <option value="dolars">Dòlars ($)</option>
                </select>

                <br><br>
                <button type="submit" name="guardar">Guardar preferències</button>
            </fieldset>
        </form>

    <?php else: ?>
        <!-- RESULTADO SEGÚN LAS COOKIES -->
        <hr>
        <?php if ($majoredat === 'no'): ?>
            <!-- MENOR DE EDAD -->
            <p style="color: red; font-weight: bold;">
                <?php 
                if ($idioma === 'catala') echo "No et podem vendre alcohol si ets menor d'edat.";
                elseif ($idioma === 'espanyol') echo "No podemos venderte alcohol si eres menor de edad.";
                else echo "We cannot sell you alcohol if you are underage.";
                ?>
            </p>
        <?php else: ?>
            <!-- MAYOR DE EDAD -->
            <h2>Productes disponibles:</h2>
            <p>
                <?php 
                // Definir precio y símbolo según moneda
                $preu = 39;
                $simbol = "€";
                if ($moneda === 'lliures') { $preu = 34; $simbol = "£"; }
                elseif ($moneda === 'dolars') { $preu = 42; $simbol = "$"; }

                // Textos según idioma
                if ($idioma === 'catala') {
                    echo "T'oferim el vi \"Les Terrasses\" a un preu de $preu $simbol.";
                } elseif ($idioma === 'espanyol') {
                    echo "Te ofrecemos el vino \"Les Terrasses\" a un precio de $preu $simbol.";
                } else {
                    echo "We offer you the wine \"Les Terrasses\" at a price of $preu $simbol.";
                }
                ?>
            </p>
        <?php endif; ?>

        <br>
        <!-- BOTÓN PARA CAMBIAR CONFIGURACIÓN -->
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?recurs=reset">Canviar preferències</a>
    <?php endif; ?>
</body>
</html>