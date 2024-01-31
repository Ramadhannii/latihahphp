<?php
session_start();

// $_SESSION = [];
// session_unset(); memastikan supaya sessionnya hilang

// mengahpus session
session_destroy();

//mengahpus cookie 
setcookie('id', '', time() - 3600);
setcookie('id', '' , time() - 3600);

header("Location: login.php");
exit;
?>