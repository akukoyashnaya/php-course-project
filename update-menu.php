<?php 
session_start();
include 'db.php';

if (true) //isset($_POST['inMenu']))
{
  $page_ids = $_POST['inMenu'];
  query("update pages set menu=0 where required<>1");
  foreach ($page_ids as $page_id)
    query("update pages set menu=1 where id=$page_id");
  pre($page_ids); die("bye");
    $page_id = $_POST['id'];
    $status = $_POST['status'];
 
    $sql="UPDATE `pages` SET `menu`=$status where `id`=$upage_id";
    query($sql);
    echo 'ok';
}
else
    echo 'noop';
?>