<?php 
session_start();
include 'db.php';

 
 if (isset($_POST['name']))
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = trim($_POST['email']);
    $message = trim(htmlspecialchars($_POST['message']));
   // print_r($email);
  //  print_r($email);
 
    // $sql="INSERT INTO `contacts` (`id`, `name`, `surname`, `phone`, `email`, `message`) VALUES (NULL, $name, $surname, $phone, $email,  $message)";
   
        $sql=" INSERT INTO `c9`.`contacts` (`id`, `name`, `surname`, `phone`, `email`, `message`) VALUES (NULL,'".$name."', '".$surname."', '".$phone."', '".$email."', '".$message."')";
  echo $sql;
   query($sql);
    
}
else
    echo 'noop';
?>