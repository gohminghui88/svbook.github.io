<?php 
session_start();
session_destroy();
redirect("/Test/QSBI/login.php");
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
?>