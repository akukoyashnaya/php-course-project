<?php
include 'header.php';

 $forum_id= $_GET["f"];
//1. get forum name 
 $sql = sqlBuildSelect('forums').sqlBuildWhere(['id' => $forum_id]);
 $forum = query($sql);
 $forum = $forum[0]['forum'];
//1. build and execute a query SELECT * from `topics`
 $sql = sqlBuildSelect('topics').sqlBuildWhere(['forum_id' => $forum_id]); 
 $topics = query($sql);

//2. show topics page 
 
 ?>
<!doctype html>


    <div id="topic">
    <div><h2>Forum:  <?=$forum?></h2></div>
    <div id="container">
      <?php if (is_login() && !is_admin()):?>
    <div class="add_new_topic">
        <a href="add_topic.php?f=<?=$forum_id?>" id="add-topic" >Add new Topic </a>
       
    </div>
    <?php endif?>
    
        <table class="topic-content admin-table">
            <thead>
                <tr>
                    <th>Topics</th>
                    <th>Comments</th>
                </tr>
            </thead>
            
<?php
// 3. show all topics as a table strings
  foreach ($topics as $topic) {
//3. count all comments per topic
      $count_comment=query('select count(*) as comment_number from `comments`'.sqlBuildWhere(['topic_id' => $topic['id']]));
       echo '<tr>
                <td><a href="topic.php?t='.$topic['id'].'&f='.$forum_id.'" class="forum-name">'.$topic['topic'].'</a></td>
                <td>'.$count_comment[0]['comment_number'].'</td>
            </tr>';
  
  
  }
  ?>

            </table>
    </div>
    </div>
</body>
</html>