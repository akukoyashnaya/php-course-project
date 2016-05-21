<?php 
session_start();
include 'db.php';


 if (isset($_POST["user_id"]))
 {

  $user_id=$_POST["user_id"];
  $user_id=str_replace('user-','',$user_id);
  $content=$_POST["content"];
  $forum_id=$_POST["forum"];
  echo $forum_id;
  $topic=$_POST["topic"];
 
    $sql='SELECT `id` from `topics` where `topic`="'.$topic.'"';
    $topic_id = query($sql);
    $topic_id = $topic_id[0]['id'];
  
   $sql = 'INSERT INTO `comments`(`topic_id`, `user_id`, `text`) VALUES ("'.$topic_id.'","'.$user_id.'","'.$content.'")';
   query($sql);
  header ('Location: topic.php?t='.$topic_id.'&f='.$forum_id.'');
  
 }
