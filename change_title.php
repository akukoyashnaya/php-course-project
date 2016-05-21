<?php 
session_start();
include 'db.php';


if (isset($_POST['data'])) {
   
   $data = $_POST['data'];
 
    
    $current=$data['current'];
    $page_id=$data['page_id'];
    
    // $sql="SELECT * from  `gallery` where `img_order`= $current";
    // $passive_row = query($sql);
    // $sql="SELECT * from  `gallery` where `img_order`= $prev";
    // $active_row = query($sql);
    
    // $passive_id = $passive_row[0]['id'];
    // $active_id = $active_row[0]['id'];
    
    $sql="UPDATE `pages` SET `title`='$current' where `id`=$page_id";
  
    query($sql);
   
    
    
    echo 'ok';
    
    
    
     
    
}
else echo 'nooo';
?>