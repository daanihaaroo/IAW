<?php
if (
    isset ($_POST["euros"])
) {
    $euro = $_POST["euros"];
    $dolar = $_POST["euros"]*1.14;
    echo "El canvi a $euro € es $dolar $ ";
}
?>