<?php 
session_start();
include 'db.php';


if (isset($_POST['data'])) {
   
   $data = $_POST['data'];
 
    
    $current=$data['current'];
    $page_id=$data['page_id'];
    
    $sql="UPDATE `pages` SET `title`='$current' where `id`=$page_id";
  
    query($sql);
   
    
    
    echo 'ok';
    
    
    
     
    
}
else echo 'nooo';
?>