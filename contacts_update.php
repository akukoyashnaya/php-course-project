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
   
        $sql=" INSERT INTO `c9`.`contacts` (`id`, `name`, `surname`, `phone`, `email`, `message`) VALUES (NULL,'".$name."', '".$surname."', '".$phone."', '".$email."', '".$message."')";
   query($sql);
    
}
else
    echo 'noop';
?>