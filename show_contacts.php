<?php
include 'header.php'; //contains session_start()

   $sql="select * from `contacts` ";
   $contacts = query($sql);

 
?>



<script>
    $(document).ready(function(){
    var myCheckboxes = new Array();
      
     $("a.ajax-delete").click(function(e){
     e.preventDefault(); 
     $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
       });
      
     $.post('delete_message.php', {data:myCheckboxes}, function(callback){
      myCheckboxes=[];
      callback=jQuery.parseJSON(callback);
      var arr = jQuery.makeArray(callback); 
      console.log(arr);
      var length=arr.length;
      console.log(arr, length);
     
     
      for (var i=0; i<length; i++){
        $('tr#row-'+callback[i]).remove(); 
    //  $('#'+47).remove();
       console.log($('tr#'+callback[i]));
     //    alert("Row"+data[i]+" is deleted");
     }
    });  
    
    });
    
     
   
    })
    
    
    
    
</script>

 



 <div id="show-contacts">
  <div class="container">
  <div class="contacts-menu">
    <div class="contacts-page-header">
      <h2>Messages from users</h2>
      </div>
    <div class="contacts-actions">
     <a href="#" class="ajax-delete">Delete</a> </div>
    <div class="clear"></div>
   </div>
   <table  class="admin-table">
   <tr><th>Id</th>
    <th>Name</th>
       <th>Surname</th>
       <th>Phone</th>
       <th>Email</th>
       <th>Message</th>
    </tr>
   <!--<!--form method="post" action="#">-->
   <?php foreach ($contacts as $contact):?>
    <tr id="<?='row-'.$contact['id']?>">
     <td><?=$contact['id']?> </td>
     <td><?=$contact['name']?> </td>
     <td><?=$contact['surname']?></td>
      <td><?=$contact['phone']?> </td>
      <td><?=$contact['email']?> </td>
     <td class="contact-message"><?=$contact['message']?></td>
    <td align="center">
     <input type="checkbox" class="ajax" name="myCheckboxes[]" id="myCheckboxes" value="<?=$contact['id']?>"> 
    </td>
    </tr>
  <?php  endforeach;?>
  </table>
  <!--</form>-->
  </div>
  </div>

</body>

</html>    
