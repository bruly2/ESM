<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location:http://www.esmontgeron-athle.fr");
?>
