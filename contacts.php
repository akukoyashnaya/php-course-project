<?php 
session_start();
include 'header.php';
?>
<script>
    $(document).ready(function(){
    var name;
    var surname;
    var phone;
    var email;
    var message;
        
          $(".ajax").submit(function(e) { 
        
            e.preventDefault();
             
          // checked=$(this).is(':checked') ? 1 : 0;
          // user_id=$(this).attr('value');
          name=$('#name').val();
          surname=$('#surname').val();
          phone=$('#phone').val();
          email=$('#email').val();
          message=$('#message').val(); 
          
        console.log (name);
        console.log (surname);
        console.log (phone);
        console.log (email);
        console.log (message);   
       
        
        
      $.post("contacts_update.php", {name: name, surname:surname, phone:phone, email:email, message:message}, function (){
          $('.contact-form').hide(); 
          $('.success-message').show();
      });
    
  
          });
          
        
    });  
  
</script>




<div id="contacts">
    <div class="container">
    <div class="contacts-header">
    <h2>LEAVE A MESSAGE</h2>
    </div>
    <div class="success-message">
        <span>Your message has been sent successfully</span>
    </div>
    <div class="contact-form">
        <form action='contacts_update.php' method='POST' class="contact-form-content ajax">
        
         <input type="text" id="name" name="name" class="form-contact" placeholder="Name">
         
         <input type="text" id="surname" name="surname" class="form-contact" placeholder="Surame">
         
         <input type="text" id="phone" name="phone" class="form-contact" placeholder="Phone">
         
         <input type="email" id="email" name="email" class="form-contact" placeholder="Email">
        
         <textarea rows="4" cols="50" id="message" name="message" class="form-contact" >
         </textarea>     
        
         <input type="submit" class="form-contact send-message" value="Send message">
        </form>
    </div>
    </div>
</div>
    
</body>
</html>