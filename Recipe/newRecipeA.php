<?php
/*
    Purpose: Demo6 - CRUD Operations
    Author: LV
    Date: October 2015
    Uses: siteCommon.php, d6Sql.php
    Action for d6add1.php
 */
require_once ("../siteCommon.php");
require_once ("recipesql.php");

// Call the addMovie method

addRecipe($_POST['recipename'],$_POST['dateadded'], $_POST['instructions'],
    (int) $_POST['categoryid'], (int) $_POST['cooktime'], $_POST['timeofday'], $_POST['timeofyear'],$_POST['userid'],$_POST['allergieid']);




displayPageHeader("New recipe {$_POST['recipename']} added");
?>

<p style="text-align: center">
    <a href="newRecipe.php">[Add another Recipe]</a>
</p>

<?php
displayPageFooter();
?>
