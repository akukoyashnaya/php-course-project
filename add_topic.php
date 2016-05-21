<?php
include 'header.php';

 $forum_id = $_GET['f'];
 $author = $_SESSION['user'];

if (!isset($_POST['new-topic'])) {
    
 $sql = 'select forum from `forums` where `id`='.$forum_id.'';
 $forum = query($sql);
 $forum = $forum[0]['forum'];
 
  
?>
 <script type="text/javascript" src="JS/nicEdit.js"></script>
      <script type="text/javascript">
	    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
     </script>

<div id="new-topic">
    

<div class="container"> 
    <div><h2>Add New Topic to forum <?=$forum?></h2></div>
<form action="#" method="POST" class="contact-form-content">
            <label><span>Title</span></label>
            <input type="text" name="new-topic" class="form-contact">
            <textarea name="content"  style="height:250px;" class="form-contact"></textarea>
            <input type="submit" name="submit" class="submit_btn">
        </form>    
</div>
</div>
</body>
</html>

<?php
} else {

 $topic = $_POST['new-topic'];
 $content = $_POST['content'];
 $sql= 'INSERT INTO `topics`(`topic`, `forum_id`, `user_id`, `content`) VALUES ('."'$topic'".','.$forum_id.','.$author.','."'$content'".')';
 $new_id = query($sql);
 

 
 header('Location: topic.php?t='.$new_id.'');
}
?>

