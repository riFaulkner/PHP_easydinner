<?php
/* 
    Purpose: Demo6 - CRUD Operations
    Author: LV
    Date: October 2015
    
    Uses: d6Sql.php
 */

require_once ("recipesql.php");

// if $_POST has a filmpk element, call the update method

if (isset($_POST['recipeid']))
{
    updateRecipe($_POST['recipename'],$_POST['dateadded'], $_POST['instructions'],
    (int) $_POST['categoryid'], (int) $_POST['cooktime'], $_POST['timeofday'], $_POST['timeofyear'],$_POST['userid'],$_POST['allergieid']);
    
}
else //call the add method
{
   addRecipe($_POST['recipename'],$_POST['dateadded'], $_POST['instructions'],
    (int) $_POST['categoryid'], (int) $_POST['cooktime'], $_POST['timeofday'], $_POST['timeofyear'],$_POST['userid'],$_POST['allergieid']);

    
}

header("Location: ../home/home.php");
exit;

?>
