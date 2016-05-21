<?php
include 'header.php';
  
?>
 <script type="text/javascript" src="JS/nicEdit.js"></script>
      <script type="text/javascript">
	    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
     </script>

<div id="new-page">
    

<div class="container"> 
    <div><h2>Add New Page</h2></div>
<form action="template.php" method="POST" class="contact-form-content">
            <label><span>Page Title</span></label>
            <input type="text" name="title" class="form-contact">
            
            <label><span>Page Path</span></label>
            <input type="text" name="page" class="form-contact">
            
            <div class="invisible"><label><span>Required</span></label>
            
            <input type="text" name="required"  value="0" ></div>
            
              <label><span>Page Header</span></label>
             <input type="text" name="header" class="form-contact">
            
            <textarea name="content"  style="height:250px;" class="form-contact"></textarea>
            
            <input type="submit" name="submit" class="submit_btn">
        </form>    
</div>
</div>
</body>
</html>

 

