<?php 
session_start();
include 'db.php';

if (isset($_POST['id']))
{
    $user_id = $_POST['id'];
    $status = $_POST['status'];
 
    $sql="UPDATE `users` SET `active`=$status WHERE `id`=$user_id";
    query($sql);
    echo 'ok';
}
else
    echo 'noop';
?>