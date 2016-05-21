<?php
session_start();
include 'db.php';


if (isset($_POST['data'])) {
   
   $data = $_POST['data'];
 
    //id:   img_order_old       img_order_new 
    // 1:   1             ==>   5 // - active (changed by user) img_order prev=1, current=5
    // 5:   5  (0)        ==>   1 // - passive (changed automatically)
    $current=$data['current'];
    $prev=$data['prev'];
    
    $sql="SELECT * from  `gallery` where `img_order`= $current";
    $passive_row = query($sql);
    $sql="SELECT * from  `gallery` where `img_order`= $prev";
    $active_row = query($sql);
    
    $passive_id = $passive_row[0]['id'];
    $active_id = $active_row[0]['id'];
    
    $a="UPDATE `gallery` SET `img_order`='0' where `id`=$passive_id";
  
    $a=query($a);
   // $a=$sql;
    
    $b="UPDATE `gallery` SET `img_order`='$current' where `id`=$active_id";
    $b=query($b);
    
    $c="UPDATE `gallery` SET `img_order`='$prev' where `id`=$passive_id";
    $c=query($c);
    
    $data=['id' => $passive_id, 'img_order' =>$prev ];
    
    echo json_encode($data);
    
    
    
     
    
}
else echo 'nooo';
?>