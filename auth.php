<?php
include 'db.php';

$data = [
    $login=>$_POST['login'],
    $password=>$_POST['password'],
   ];

 //$users = query(sqlBuildSelect('users')); 

if ($login) {

 $sql = sqlBuildSelect('users').sqlBuildWhere($data);
  $user = query($sql);
    

  if(!empty($user)) {
        $_SESSION['login'] = 'yes';
        $_SESSION['type'] = $user[0]['admin'] == 1 ? 'admin' : 'user';
    }
}

 

header('Location: index.php?login="yes"');
    die;  
    print_r($user);


?>