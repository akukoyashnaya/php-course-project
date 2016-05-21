<?php
 session_start();
 session_destroy();
  $_SESSION['login']=null;
  $_SESSION['type']=null;
  $_SESSION['user']=null;
  $_SESSION['name']=null;
 header('Location: index.php');
?>