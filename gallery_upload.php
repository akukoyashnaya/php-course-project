<?php 
session_start();
include 'db.php';


$file = $_FILES['filesToUpload'];


$total = count($_FILES['filesToUpload']['name']);
//print_r($file['error'][0]);

//get maximum image order from db
$sql = 'SELECT max(`img_order`) as max_order from `gallery`';
$max_order = query($sql);
$max_order = $max_order[0]['max_order']+1;
//pre ($max_order);
echo'<br>';
/*CHECK AND UPLOAD*/
 for ($i=0; $i<$total;$i++){
        if($file['error'][$i] > 0) {
         header("Location: gallery_admin.php");
    }
        if(!is_uploaded_file($file['tmp_name'][$i])) {
         header("Location: gallery_admin.php");
    }
    
       $newName = uniqid('', true);
       $newName = str_replace('.', '', $newName);
       $ext = pathinfo($file['name'][$i], PATHINFO_EXTENSION);
       $newName .= '.'.$ext;
      // print_r ($newName.'<br>');
       
       move_uploaded_file($file['tmp_name'][$i], 'gallery/'.$newName);
       ++$max_order;
       //echo $max_order;
       $sql="INSERT INTO  `gallery`  (`img_name`, `img_order` ) VALUES ('$newName', $max_order)";
       //echo $sql;
       query($sql);
    
}


