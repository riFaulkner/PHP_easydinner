<?php
/*
 Title: Easy Dinner Project
 Purpose: Methods to render Common Site Header and Footer
 Author: Rick Faulkner
 Date: January 2016
 */

//Home Page to Easy Dinner
session_start();
include_once 'siteCommon.php';
include_once 'projectSQL.php';
displayPageHeader(Home);

$logFName = (isset($_SESSION['userInfo']))? $_SESSION['userInfo']['username'] : "";
if(!empty($logFName))
{
	echo "<p>Welcome back to Easy Dinner, $logFName!</p>";
}
else
{
	echo "<p>Hello, and welcome to the home of Easy Dinner, it's dinner made easy!</p>";
}
//echo "These are the last recipies added, try them out!";
//$recipeList = nulll; // mostRecentPublic();
//echo "$recipeList";
//$recipeNum = 0;
//$output = '<h1> These are the most recent recipes added, check them out!</h1> <br>';

// if ($recipeList != null)
// {
// 	foreach ($recipeList as $recipe)
// 	{
// 		extract($recipe);
// 		$recipeNum ++;
// 		$dateAdded = date_format(new DateTime($dateAdded), "F j, Y");
// 		$output .= <<<ABC
//         <tr id='recipename'>
//             <td>
//                 $recipeNum: $RecipeName
//             </td>
//         </tr>
//         <tr>
//             <td>
//                 Cook Time: $Cooktime
//             </td>
//             <td>
//                Released: $dateAdded
//             </td>
//             <td>
//                 Time of Year: $TimeOfYear
//             </td>
//             <td>
//                 Time of Day: $TimeOfDay
//             </td>
//         </tr>
//         <br>
//         <br>
// ABC;
// 	}
// }
//echo "$output";
displayPageFooter();
?>