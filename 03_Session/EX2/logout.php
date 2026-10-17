<?php
session_start();

// 1. Netegem l'array de la sessió
$_SESSION = array();

// 2. Destruïm completament la sessió al servidor
session_destroy();

// 3. Redirigim de nou al login
header("Location: index.html");
exit();
?>