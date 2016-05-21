<?php 
session_start();
include 'db.php';

if (isset($_POST['content'])){

$content = $_POST['content'];
$topic =  $_POST['t'];
$forum =  $_POST['f'];
$sql = 'UPDATE `topics` SET `content`="'.$content.'" WHERE `id`="'.$topic.'"';
query($sql);
header('Location: topic.php?t='.$topic.'&f='.$forum.'');
    
}
else 'no';

?>
