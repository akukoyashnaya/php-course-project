<?php 
session_start();
include 'db.php';

 if(!is_admin()) {
    header('Location: index.php');
 }

 if (isset($_GET["t"]))
 {

$delete_id=$_GET['t'];
$forum_id=$_GET['f'];
$sql='delete from `topics` where `id`='.$delete_id.'';
query($sql);

header('Location: show_topics.php?f='.$forum_id.'');
 }
 else
     echo 'noop';
