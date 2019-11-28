<?php
/*
-------------------------------PAGE DE DECONNEXION------------------

->un script pour deconnecté toute les sessions
-> renvoi a l'index
*/
session_start();
session_destroy();
header('Location: index.php');
exit;
?>
