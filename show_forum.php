<?php
include 'header.php';

//1. build and execute a query SELECT * from `forumes`
 $sql = sqlBuildSelect('forums'); 
 $forums = query($sql);
// $sql1 = sqlBuildSelect('topics'); 
 $sql1='select count(*) as topic_counter from topics';
 $topics= query($sql1);

 // pre ($topics); 
?>
<!--//2. show forums page-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div id="forum">
    <div class="container">
        <table class="forum-content admin-table">
            <thead>
                <tr>
                <th>Forum</th>
                <th>Topics</th>
               
                </tr>
            </thead>
            
<?php
$sql2=query('select *  from `topics`');
//print_r ($sql2);
// 2. show all forums as a table strings
  foreach ($forums as $forum) {
//3. count all topics per forum
       $count_topic=query('select count(*) topic_counter from `topics` where forum_id='.$forum['id']);   
       $count_topic=$count_topic[0]['topic_counter'];
       echo '<tr>
                <td><a href="show_topics.php?f='.$forum['id'].'" class="forum-name">'.$forum['forum'].'</a></td>
                <td>'.$count_topic.'</td>
               
            </tr>';
  
  
  }
  ?>

            </table>
    </div>
    </div>
</body>
</html>