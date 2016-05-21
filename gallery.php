<?php
include 'header.php';
 $sql="select * from `gallery` order by `img_order`";
 $images = query($sql);
 
?>

<!doctype html>
<html lang="en">
<div id="gallery">
    <div class="container">
    <div class="gallery-header">
    </div>
   <div class="section group gallery-content">

	<?php foreach ($images as $image):?>
		
		<div class="overlay-wrapper col span_1_of_4 gallery-item">
	    <img src="gallery/<?=$image['img_name']?>">
	    <div class="overlay">
	       <!-- <label>Old number</label>-->
	        <label></label>
	    </div>
	</div>
	
	<?php endforeach?>

</div>
    
    </div>
</div>
    
</body>
</html>
