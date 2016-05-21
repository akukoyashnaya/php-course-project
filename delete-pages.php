<?php 
session_start();
include 'db.php';

if (isset($_POST['data']))
{
  $delete_id = $_POST['data'];
  foreach ($delete_id as $id) {
     query($sql='delete from `pages` where `id`='.$id.'');
}
echo json_encode($delete_id);
}
else echo 'nooop';

//page -> user chooses which items he wants to delete -> hits submit -> delete occurs, returns ids deleted -> page removes elements which were deleted
      
  
?>