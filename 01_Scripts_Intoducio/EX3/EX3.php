<?php
date_default_timezone_set("Europe/Madrid"); 
if (date("H") >= 5 && date("H") < 14 ) 
    {echo "Son les " . date("H:i:s") , " Bon dia";}
elseif ( date("H") >=  14 && date("H") < 19 )
    {echo "Son les " . date("H:i:s"), " Bon tarda";}

else {echo "Son les " . date("H:i:s"), " Bon nit";}

?>