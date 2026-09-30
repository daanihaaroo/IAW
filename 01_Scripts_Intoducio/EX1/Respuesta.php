<?php
if (
    isset($_POST["name"]) &&
    isset($_POST["cognom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["missatge"])
){
    $nom = $_POST["name"];
    $cognom = $_POST["cognom"];
    $email = $_POST["email"];
    $Missatge = $_POST["missatge"];
    
    echo "Missatge rebut, $nom $cognom. Gracies per contactar. Et respondrem $email.";
}
?>