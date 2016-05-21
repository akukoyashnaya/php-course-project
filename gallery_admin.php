<?php
include 'header.php';
 $sql="select * from `gallery` order by `img_order`";
 $images = query($sql);
 $sql="select count(*) as `counter` from `gallery`";
 $counter = query($sql);
?>

<script>
  $(document).ready(function() {
   
     var img_id;
     var prev;
     var current;
     
    
      $(".order").focus(function() {
           console.log('ccc');
        img_id=$(this).attr('id');
        img_id = img_id.replace('input-','');
        prev = $(this).val();
        console.log(img_id);
        console.log(prev);
          $('.apply').show();
      });
      
      $(".apply").click(function() {
         var active_row_class = '#input-'+ img_id;
         console.log(active_row_class);
         current = $(active_row_class).val();

            console.log(current);
   
       var data={"prev": prev, "current": current, "img_id": img_id};
       $(this).hide();   
      
        $.post("order_update.php", {data:data}, function(callback){
       
        callback = $.parseJSON(callback);
         var passive_id=callback.id;
         var passive_img_order=callback.img_order;
        
        console.log(passive_id);
        console.log(passive_img_order);
        
      $('#input-'+passive_id).val(passive_img_order); 
      
          
       });
      
      });
      
 //delete img
 
     var myCheckboxes = new Array();
      
     $(".ajax-delete").click(function(e){
     e.preventDefault(); 
     $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
       });
      
     $.post('delete_img.php', {data:myCheckboxes}, function(callback){
      myCheckboxes=[];
      callback=jQuery.parseJSON(callback);
      var arr = jQuery.makeArray(callback); 
      var length=arr.length;
     
      for (var i=0; i<length; i++){
        $('tr#row-'+callback[i]).remove(); 
   
     
     }
    });  
    
    });
 
 
 
  });
</script>


<div id="gallery_admin">
<div class="container">

<div><h2>Gallery Admin<h2></div>

<div class="img-upload"> 
 
  <form method="post" action="gallery_upload.php" enctype="multipart/form-data">
    <input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" />
    <input type="submit" value="Upload" class="submit-btn">
  </form>
</div>
 <table class="admin-gallery-table" cellpadding="5" >
    <tr><th>ID</th>
       <th style=>Image</th>
       <th>Name</th>
       <th>Order </th>
       <th> <a href="#" class="ajax-delete">Delete</a></th>
    </tr>
     </div>
   
   <?php foreach ($images as$image):?>
    <tr id="row-<?=$image['id']?>"> 
      <td><?=$image['id']?></td>
      <td  style="width:25%;"><img src="gallery/<?=$image['img_name']?>" class="img_admin"></td>
      <td><?=$image['img_name']?></td>
      <td>
        <input type = "text" name = "img_order" size = "4" value = "<?=$image['img_order']?>" class="order" id="input-<?=$image['id']?>">
        <button class="apply" style="display:none" value="<?=$image['id']?>"> Apply </button>
      </td>
      <td>  <input type="checkbox" class="ajax" name="myCheckboxes[]" id="myCheckboxes" value="<?=$image['id']?>"> </td>
     </tr>
   <?php endforeach?>
    
  </table>
</div> 
</div> 
</body>
</html>