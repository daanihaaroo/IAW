<?php
if (
    isset ($_POST["iva"]) &&
    isset ($_POST["euros"]) 
    ){
    $euros = $_POST["euros"];
    $iva = $_POST["iva"];

    if ($iva == "General (21%)"){
        echo "el preu final es " . ($euros *1.21) . "€"; 
    }
    if ($iva == "Reduït (10%)"){
        echo "el preu final es " . ($euros *1.1) . "€";
    }
    if ($iva == "Superreduït (4%)"){
        echo "el preu final es " . ($euros *1.04) . "€";
    }
   }
    ?>