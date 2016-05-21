<?php
include 'header.php';


 $topic_id= $_GET["t"];

//1. get the topic row from the db
 $sql = sqlBuildSelect('topics').sqlBuildWhere(['id' => $topic_id]); 
 $topics = query($sql);
//1.2 get the topic from the array $topics
 $topic = $topics[0]['topic']; 
 $id = $topics[0]['id'];
 //pre($topics);
//2. get the username from the  $topics array ==> from the `users` table 
  $user_id = $topics[0]['user_id']; //from the `topic`
  $sql= sqlBuildSelect('users').sqlBuildWhere(['id'=>$user_id]); //from the `users` 
  $author= query($sql);
  $author = $author[0]['login'];
//  pre($author);
//3. get the time from the  $topics array
  $create_time=$topics[0]['create_time'];
//4. get the content from the $topics array
  $content=$topics[0]['content'];    
//5. get the list of comments
 $sql = sqlBuildSelect('comments').sqlBuildWhere(['topic_id' => $topic_id]);
 $comments = query($sql);
//6. get number of commnets
 $sql = 'select count(*) as comment_number from `comments`'.sqlBuildWhere(['topic_id' => $topic_id]);
 $comment_number=query($sql);
 $comment_number=$comment_number[0]['comment_number'];
 


?>
   <script type="text/javascript" src="JS/nicEdit.js"></script>
   <script type="text/javascript"> bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); </script>
   <script>
       
        $(document).ready(function(){
          
        /*EDIT POST*/              
        $('.ajax-edit-post').click(function(e){
            e.preventDefault();
            $(this).hide();
            $('#topic-content').hide();
            $('.form-toggle').show();
        });
        
       
        
      /*DELETE COMMENT*/     
        $('a.ajax').click(function(e){
                e.preventDefault();
                 var comment_id = $(this).parent().attr('id');
                     comment_id = comment_id.replace('comment-', '');
                 console.log(comment_id);
                 $.post('delete_comment.php', {data:comment_id}, function(callback){
                     callback = $.parseJSON(callback);
                     var delete_id = callback.delete_id;
                     var topic_id =  callback.topic_id;
                  console.log(delete_id);
                  console.log(topic_id);
                  var comment_id='#comment-'+delete_id;
                  console.log(comment_id);
                  $(comment_id).parent().parent().parent().remove();
             
              });
            });
   
        });
    </script>


<div id="topic">
    <div class="container">
        <div class="topic_item">
            <div class="topic_header">
                <h2 class = "topic_header_h2"><?=$topic?></h2>
                
            </div>
            <div class="topic_info">
            <ul>
                 <li>
                    <i class="fa fa-user"></i>
                    <span><?=$author?></span>
                </li>
                <li><i class="fa fa-pencil"></i>
                    <span><?=$create_time?></span>
                </li>
                <!--<li>-->
                <!--    <i class="fa fa-comments"></i>-->
                <!--    <span>Comments</span>-->
                <!--</li>-->
                <?php if (is_admin()): ?>
                 <li>
                      <a href="delete_post.php?t=<?= $id ?>&f=<?=$_GET['f']?>">Delete Post</a>
                 </li>
                  <?php endif; ?>
                  <?php if (is_login() && $_SESSION['name']==$author):?>
                  <li>
                      <a href="#" class="ajax-edit-post">Edit Post</a>
                 </li>
                 <?php endif; ?>
                 
            </ul>
            </div>
            <div class=clear></div>
            
            <div class="topic_cont">
            <div id="topic-content"><?=$content?></div>    
            
            <div class="form-toggle invisible">
                <form id="edit_topic" action="edit_topic.php" method="POST">
                    <input type="hidden" name="t" value="<?=$_GET['t']?>" />
                    <input type="hidden" name="f" value="<?=$_GET['f']?>" />
                     <textarea id="edited_topic" style="width: 500px; height:300px;"name="content"><?=$content?></textarea>
                     <input type="submit" class="submit-btn" id="edit">
                </form>
            </div>
 
  <div style="clear: both;"></div>
 
        </div>
        <div id="comments">
       <!--Add New Comment-->
            <div class="new-comment">
       <?php if (is_login() && !is_admin()):?>
      
        <!--<a href='#'>Add a Comment</a>-->
       <h2>Add comment</h2>
        <form action="add_comment.php" method="post">
            <textarea name="content" style="width: 500px; height: 100px;" id="user-<?=$_SESSION['user']?>" >
            </textarea>
            <input type="text" name="user_id" value="user-<?=$_SESSION['user']?>" class="invisible">
            <input type="text" name="topic" value="<?=$topic?>" class="invisible">
              <input type="text" name="forum" value="<?=$_GET['f']?>" class="invisible">
            <input type="submit" id = "user-<?=$_SESSION['user']?>" value="Submit" class="submit-btn">
        </form>
        
        
        <?php endif; ?>
            </div>
            <div class="comment-block">
                <div class="comment-number">
                    <h2> <?=$comment_number?> comments<h2>
                </div>
            
            <div class="comment-all">
              
            <?php    foreach ($comments as $comment):
            $commentator = query("SELECT `login` FROM `users` where `id`='".$comment['user_id']."'");
            $commentator = $commentator[0]['login'];
            //echo pre($commentator);
            ?>
                <div class="comment-item">
                    <div class="comment-user">
                        <ul class="comment-info">
                            <li>
                                <i class="fa fa-user"></i>
                                <span><?= $commentator?></span>
                                </li>
                                <li><i class="fa fa-calendar"></i>
                                    <span><?=$comment['add_time']?></span>
                                </li>
                    <?php if (is_admin()):?> 
                
                            <li id="comment-<?=$comment['id']?>">
                                <a href="delete_comment.php" class="ajax">Delete Comment </a>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </div>
                    
                    <div class="clear"></div>
                    <div class="comment-text">
                        <p><?=$comment['text']?></p>
                    </div>
           
                 <?php endforeach; ?>      
               
               
              
              
              
              
              
              
              
           
            </div>
        </div>
        
            
    </div>        
</div>

</body>
</html>