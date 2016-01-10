<?php
   /* 
    Title: Easy Dinner Project
    Purpose: Methods to render Common Site Header and Footer
    Author: Rick Faulkner
    Date: January 2016
     */
      

function displayPageHeader($pageTitle)

{
   $output = <<<ABC
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <title>Easy Dinner</title>
      <link rel="stylesheet" href="../stylesCommon.css" type="text/css" />
     
   </head>

   <body>
      <header>
        <div class=image>
         <img src="../TheCoverPhoto.jpg" alt="pots and Pans"/>
           <h2><span>Easy Dinner: </br></br> $pageTitle</span class="spacer"></h2>
           </div>
      </header>
      <nav>
         <ul>
            <li><a href="../home.php" target="_self">Home</a></li>
           	<ul id="Recipes">
	            <li><a href="../Login_Register/loginForm.php" target="_self"</a></li>
	            <li><a href="../Recipe/searchRecipe.php" target="_self">Search Recipies</a></li>
	            <li><a href="../Recipe/newRecipe.php" target="_self">Add A Recipe<a/></li>
	            <li><a href="../Recipe/editRecipe.php" target="_self">Edit Recipe</a></li>  
           	<ul>
  <body>
           <div id="bg-right"></div>
           <div id="bg-left"></div>
</body> 
ABC;


$logStatus = (isset($_SESSION['userInfo']));

// if the user is authenticated, display "Log Out", else Log In"

    if ($logStatus)
    {
        $permission = $_SESSION['userInfo']['userrolefk'];
        if($permission == 1){
            $output .= '<li><a href="../Login_Register/admin.php">Admin</a></li>';
        }
        $output .= '<li><a href="../Login_Register/logout.php">Log Out</a></li>';
    }
    else
    {
        
//        echo $_SESSION['userInfo']['UserRoleFK'];
        $output .= '<li><a href="../Login_Register/loginform.php">Log In</a></li>';
    }
  
    $output .= "</ul></nav>";

   echo $output;
}
   
function displayPageFooter()
{
   $year = date('Y');
   $output = <<<ABC
   <footer>
      <address>
         &copy $year Easy Dinner Project
      </address>
   </footer>   
 </body>
</html>
ABC;
   echo $output;
}



?>