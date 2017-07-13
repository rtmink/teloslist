<?php
session_start();
session_destroy();
setcookie("handsomeBoy","",time()-7884000);
header('Location: /');
exit();
?>