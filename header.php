<?php
session_start();
include 'db.php';
$page=$_SERVER['SCRIPT_NAME'];
$page=str_replace('/','', $page);
$sql = 'SELECT `title` from `pages` where `page`="'.$page.'"';

$title = query($sql);
$title = $title[0]['title'];
//pre($title);
$sql = 'SELECT * from `pages` WHERE `required`=0';
$pages = query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <script language="JavaScript" type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600,600italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="grid.css"> 
    <link rel="stylesheet" type="text/css" href="style.css"> 
   
    
  
</head>

<script>
 $(document).ready(function(){
  
 
  
  /*MENU*/
   $('.dropdown-toggle').hover(function(){
    $('.dropdown-menu').show();
   });
   
 
   $('.dropdown-menu').mouseleave(function(){
    $(this).hide();
   });
   
    
  
 })
</script>

<body>
 <div id="header">
  <div class="logo">
      <img src="images/logo.png">
  </div>
  <div>
  <div id="navigation">
      <ul>
          <!--REQUIRED MENU-->
          <li class='active'><a href="index.php">Home</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="show_forum.php">Forum</a></li>
          <li><a href="contacts.php">Contact Us</a></li>
         
          <!--CUSTOM MENU-->
          <?php foreach ($pages as $page) :?>
          <?php if($page['menu']==1) :  ?>
          
          <li><a href="template.php?page=<?=$page['page']?>"><?=$page['title']?></a></li>
          <?php endif?>
          <?php endforeach?>
          

          <!--ADMIN MENU-->
           <?php if (is_admin()): ?>
          <li> 
            <a href="#" class="dropdown-toggle">Admin  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu"> 
                 <li><a href="users.php" class="admin-menu">Users</a></li>
                 <li><a href="gallery_admin.php" class="admin-menu">Gallery admin</a></li>
                 <li><a href="show_contacts.php" class="admin-menu">Messages</a></li>
                 <li><a href="pages.php" class="admin-menu">Pages</a></li>
            </ul>
            </li>
          <?php endif; ?>
      </ul>        
  </div>
  <div id="sign_in">
       <?php if (is_login()): ?>
 <!-- show Sign In if user is not logged in       -->
        <!--<a href="login.php">Sign In</a>-->
         <a href="logout.php">Logout</a>
        <?php else: ?>
       <a href="login.php">Sign In</a>
        <?php endif; ?>
        
        
        
         
        
        
        
        
   </div>
  </div>
 </div>
 <div class="clear"></div>
