<?php 
session_start();
include 'db.php';


 if (isset($_POST["user_id"]))
 {


 // echo pre($data=$_POST['data']); 
 //  $topic=$data['topic'];
 //   $user_id=$data['user_id'];
 //   $content=$data['content'];
  
  
  $user_id=$_POST["user_id"];
  $user_id=str_replace('user-','',$user_id);
  //echo $user_id;
  $content=$_POST["content"];
  $forum_id=$_POST["forum"];
  echo $forum_id;
  //echo $content;
  $topic=$_POST["topic"];
  //echo $topic;
 
    $sql='SELECT `id` from `topics` where `topic`="'.$topic.'"';
    $topic_id = query($sql);
    $topic_id = $topic_id[0]['id'];
 // echo pre($topic_id);
  
   $sql = 'INSERT INTO `comments`(`topic_id`, `user_id`, `text`) VALUES ("'.$topic_id.'","'.$user_id.'","'.$content.'")';
   query($sql);
  header ('Location: topic.php?t='.$topic_id.'&f='.$forum_id.'');
  
 }
