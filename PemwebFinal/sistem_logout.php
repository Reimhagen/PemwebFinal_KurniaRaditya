<?php 

setcookie("shinobu", null , time() - 99999);
header("Location: index_g.php");