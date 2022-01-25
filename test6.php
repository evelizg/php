<?php
$str=getString("exitoso");
function getString($n){    
    if($n=="fallido") return "red";    
    return "black";
}
?>
<span style='color:<?=$str?>'>Text</span>