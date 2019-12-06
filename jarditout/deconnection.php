<?php
/*
-------------------------------PAGE DE DECONNEXION------------------

->un script pour deconnecté toute les sessions
-> renvoi a l'index
*/
session_start();
session_unset(); 
    session_destroy(); 
    session_write_close(); 
    setcookie(session_name(),'',0,'/'); 
    session_regenerate_id(true); 
header('Location: index.php');
exit;
?>
