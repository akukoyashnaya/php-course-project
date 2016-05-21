<?php
include 'header.php'; //contains session_start()

   $sql="select * from `users` ";
   $users = query($sql);

  print_r ($_SESSION);  
?>
<script>
    $(document).ready(function(){
    var checked;
    var user_id;
        
          $(".ajax").click (function() { 
   //             if($(this).attr('checked'))
   // {
           checked=$(this).is(':checked') ? 1 : 0;
           user_id=$(this).attr('value');
        console.log (checked);
        console.log (user_id);
        
      $.post("user_update.php", {status: checked, id:user_id });
    
  //  }
    // else
    // {
    //   //  $.get("store.php", { checked: 0, msgId: $(this).attr('value') } );
    // }
          });
        
    });  
  
</script>
<div id="users">
  <div = "container">
   <table border="1px solid black" cellpadding="5" class="admin-table">
   <tr><th>Username</th>
   <th style="align=center">Active</th>
    </tr>
   
   <?php foreach ($users as $user):?>
   <?php if(!is_admin()){header ('Location:index.php');}  ?>     
   <?php if (is_admin() and $user['admin']!=1):?>
    <tr>
     <td><?=$user['login']?> </td>
     <td align="left">
     <input type="checkbox" class="ajax" name="tag_1" id="tag_1" value="<?=$user['id']?>" <?php echo ($user['active']==1 ? 'checked' : '');?>>
    </td>
    </tr>
    <?php endif; ?>
    <?php  endforeach;?>
  </table>
  
  </div>
</div>
</body>

</html>    