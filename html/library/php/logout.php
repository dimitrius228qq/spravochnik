<?php 
setcookie('user', $userlog,time() - 3600*24*30*12, "/");
header('Location: /');
?>