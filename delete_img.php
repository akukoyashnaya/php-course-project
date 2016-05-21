<?php 
session_start();
include 'db.php';

if (isset($_POST['data']))
{
  $delete_id = $_POST['data'];
  foreach ($delete_id as $id) {
     $sql = 'SELECT `img_name` from `gallery` where `id`='.$id.'';
     $filename = query($sql);
     $filename =  $filename[0]['img_name'];
     unlink('gallery/'.$filename);
     
     query($sql='delete from `gallery` where `id`='.$id.'');
}
echo json_encode($delete_id);
}
else echo 'nooop';

//page -> user chooses which items he wants to delete -> hits submit -> delete occurs, returns ids deleted -> page removes elements which were deleted
      
  
?>