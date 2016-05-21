<?php 
include 'header.php';
/*Template is shown after page is created*/
if (isset($_POST['title'])) {

 $title = $_POST['title'];
 $path = $_POST['page'];
 $required = $_POST['required'];
 $header= $_POST['header'];
 
 $content = $_POST['content'];


 $sql= 'INSERT INTO `pages`(`page`, `title`, `required`, `header`,`content`) VALUES ('."'$path'".','. "'$title'".','."' $required'".','."' $header'".','."'$content'".')';
  $new_id = query($sql);

 }
/*template is shown from the link in the menu and page.php*/ 
 else {
if (isset($_GET['page'])){     
     $page = $_GET['page'];
     $sql = 'SELECT * from `pages` WHERE `page`= '."'$page'".''; 
     $page = query($sql);
      $title = $page[0]['title']; 
     $path = $page[0]['page'];
     $required = $page[0]['required'];
     $header = $page[0]['header'];
     $content = $page[0]['content'];
 }
     
 }
 
?>
<!--Display dynamic page from db-->
<div id="template">
    <div class="container">
    <h2><?=$header?></h2>
    <div>
        <?=$content?>
    </div>
    
    </div>
</div>  
</body>
</html>