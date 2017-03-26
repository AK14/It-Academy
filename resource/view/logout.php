<?php
  session_start();
  session_destroy();
//  session_unset();
//  setcookie(session_name(), '');
header("Location: http://new/");
exit();
?>


