<?php 
include 'header.php';

$sql = 'SELECT * from `pages`';
$pages = query($sql);
?>

<script>
    $(document).ready(function(){
       var page_id;
    /*CHANGE PAGE TITLE*/ 
       $(".order").focus(function() {
         page_id=$(this).attr('id');
         page_id = page_id.replace('input-','');
         console.log(page_id);
          $(this).next().show();
      });
      
      $(".apply").click(function() {
         var active_row_class = '#input-'+ page_id;
         console.log(active_row_class);
         var current = $(active_row_class).val();

            console.log(current);
   
       var data={"current": current, "page_id":page_id};
       $(this).hide();   
      
        $.post("change_title.php", {data:data}); //function(callback){

    });
      
      
    /*DELETE PAGE*/  
   
    var myPages = new Array();
      
     $("a.ajax-delete").click(function(e){
     e.preventDefault(); 
     
     $("input:checked.delete").each(function() {
           myPages.push($(this).val());
       console.log(myPages);
         
     });
      
     $.post('delete-pages.php', {data:myPages}, function(callback){
      myPages=[];
      callback=jQuery.parseJSON(callback);
      var arr = jQuery.makeArray(callback); 
      console.log(arr);
      var length=arr.length;
      console.log(arr, length);
     
     
      for (var i=0; i<length; i++){
        $('tr#row-'+callback[i]).remove(); 
       console.log($('tr#'+callback[i]));
     }
    });  
    
    });
  
    var inMenu = new Array();
      
     $("a.ajax-menu").click(function(e){
      e.preventDefault(); 
     $("input:checked.delete").each(function() {
           myPages.push($(this).val());
       console.log(myPages);
         
     });
      
     $.post('delete-pages.php', {data:myPages}, function(callback){
      myPages=[];
      callback=jQuery.parseJSON(callback);
      var arr = jQuery.makeArray(callback); 
      console.log(arr);
      var length=arr.length;
      console.log(arr, length);
     
     
      for (var i=0; i<length; i++){
        $('tr#row-'+callback[i]).remove(); 
       console.log($('tr#'+callback[i]));
     }
    });  
    
    });
  
      
    /*MENU TOGGLE*/ 
    
    $(".ajax-menu-toggle").click (function(ev) { 
        var selectedPages=[];
        
$('.in-menu:checked').each(function() { selectedPages.push($(this).val()); } );

    page_id=$(this).attr('value');
    
        
      $.post("update-menu.php", {inMenu:selectedPages });
    
    
          });
  
    });  
</script>


<div id="pages">
<div class="container">
<div><h2>Site Pages</h2></div>
    <div id="container">
      <?php if (!is_admin()) {header("Location: index.php");}?>
    <div class="add_new_page">
      <a href="add_page.php" id="add-page" >Add new Page</a>
       
    </div>
      
        
        
<table class="admin-table" cellpadding="5" >
    <tr><th> Page</th>
       <th>  Title</th>
       <th>  <a href="#" class="ajax-menu-toggle">In Menu</a> </th>
       <th>  <a href="#" class="ajax-menu">Required</a></th>
       <th>  <a href="#" class="ajax-delete">Delete</a> </th>
    </tr>
   
   <?php foreach ($pages as$page):?>
   
    <?php if(!is_admin()){header ('Location:index.php');}  ?>

    <tr id="row-<?=$page['id']?>"> 
      <td>
          <?php if($page['required']==1) { ?>
          <a href="<?=$page['page']?>"><?=$page['page']?></a>
         <?php } else { ?>
         <a href="template.php?page=<?=$page['page']?>"><?=$page['page']?></a>
         <?php } ?>
      </td>
      
      <td><input type="text" value="<?=$page['title']?>" class="order" id="input-<?=$page['id']?>">
       <button class="apply" style="display:none" value="<?=$page['id']?>"> Apply </button>
      </td>
      
      
     
       <?php if($page['required']==1) { ?> 
      <td><input type="checkbox" class="ajax" name="inMenu[]" id="inMenu" <?php echo ($page['menu']==1 ? 'checked disabled' : '');?>></td>
       <?php } else { ?>
       <td><input type="checkbox" class="ajax in-menu" name="inMenu[]" id="inMenu" value="<?=$page['id']?>" <?php echo ($page['menu']==1 ? 'checked' : '');?>></td>
       <?php } ?>
      
     <td> <input type="checkbox" class="ajax" name="required[]" id="required" <?php echo ($page['required']==1 ? 'checked disabled' : 'disabled');?>>
      </td>
      
     
     
      <?php if($page['required']==1) { ?> 
      <td>  <input type="checkbox" class="ajax delete" name="myPages[]" id="myPages" value="<?=$page['id']?>" disabled> </td>
      <?php } else { ?>
      <td>  <input type="checkbox" class="ajax delete" name="myPages[]" id="myPages" value="<?=$page['id']?>"> </td> 
       <?php } ?>
     
     </tr>
   <?php endforeach?>
    
  </table>

</div>
</div>