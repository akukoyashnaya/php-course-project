<?php 
session_start();
include 'db.php';

 if(!is_admin()) {
    header('Location: index');
 }

 if (isset($_POST["data"]))
 {

 $delete_id=($_POST['data']);
 
$delete_id=($_POST['data']);
 
$sql='SELECT `topic_id` from `comments` where `id`='.$delete_id.'';
 $topic_id=query($sql);
 $topic_id = $topic_id[0]['topic_id'];
 
 
 $sql='delete from `comments` where `id`='.$delete_id.'';
 query($sql);
 $callback = array ('delete_id' => $delete_id, 'topic_id' => $topic_id);

echo json_encode($callback);

//header ('Location: topic.php?t='.$topic_id.'');
  
 }
