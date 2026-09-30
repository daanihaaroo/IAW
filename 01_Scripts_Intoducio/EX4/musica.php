<?php
if (
    isset ($_POST["musica"]) 
){
    $musica = $_POST["musica"];
    if ($musica == "Pop"){
        echo "Felicitat a mi tambe m'agrada la musica Pop";
    }
    if ($musica == "Bachata"){
        echo "Felicitat a mi tambe m'agrada la musica Bachata";
    }
    if ($musica == "Rock"){
        echo "Felicitat a mi tambe m'agrada la musica Rock";
    }
    if ($musica == "Reggeaton"){
        echo "Felicitat a mi tambe m'agrada la musica Reggeaton";
    }
        }
        ?>