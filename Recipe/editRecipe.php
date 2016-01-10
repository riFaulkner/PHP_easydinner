
<?php
session_start();


include_once '../siteCommon.php';
displayPageHeader('Edit A Recipe');
?>
<html>
    <link href="../stylesCommon.css" rel="stylesheet" type="text/css"/>
    <form id="editRecipe">
   <label for="dishtitle">Dish Title</label>   
   <input type="text" name="recipename" id="recipename" maxlength="100" autofocus="autofocus" required="required" pattern="^[a-zA-Z0-9][\w\s\&,]*[a-zA-Z0-9\!\?\.]$" title="Movie title has invalid characters"/>
   <label for="name">Your Name</label>         
   <input type="text" name="name" id="name" maxlength="100" required="required" pattern="^[a-zA-Z0-9][\w\s\&,]*[a-zA-Z0-9\!\?\.]$" title="Tag line has invalid characters" />
   <label for="category">Type of Cuisine</label>
   <select name="category" id="rating"/>
 
    <body>
  <input type="button" id="edit" value="Submit"/>
    </body>
   </html>
  <?php
    displayPageFooter()
  ?>
