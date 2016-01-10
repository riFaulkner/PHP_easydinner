
<?php
session_start();
require_once ("../siteCommon.php");
require_once ("../projectSQL.php");
displayPageHeader("Search for a recipe by ingredients Results");

// $_POST is an associative array of the values passed via the HTTP POST method

$recipename = $_POST['recipename'];
$categoryID = $_POST['category'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];
$prepTime = $_POST['preptime'];
$cookTime = $_POST['cooktime'];
$allergieID = $_POST['allergieid'];
$timeOfYear = $_POST['timeOfYear'];

if ($categoryID != '')
{
    $category = getACategory($categoryID);
    if (count($category) == 1)
    extract($category[0]);
//    print_r($category);
}
if ($allergieID != '')
{
    $allergie = getAAllergie($allergieID);
    if (count($allergie) == 1)
        extract($allergie[0]);
//    print_r($category);
}


// call the displayPageHeader method in siteCommon.php

$heading = <<<ABC
You searched for:<br />
Recipe title: '$recipename' <br />
Recipe Category: '$categoryname' <br />
Ingredients: '$ingredients' <br />
Instructions: '$instructions' <br /> 
Cook Time: '$cookTime' <br />
Allergies: '$allergiename' <br />
Time of Year: '$timeOfYear' <br /> 
ABC;
// Just for the header information
echo $heading;
//print_r($_SESSION);
//echo $timeOfYear;
$userID = $_SESSION['userInfo']['userid'];
//echo 'U' . $userID;
$recipeList = searchForRecipe($userID, $recipename, $timeOfYear, $categoryID, $allergieID);

$matchingRecords = count($recipeList);

echo "<section>";

if ($matchingRecords == 0)
{
   echo "<h3>No matches found for the search term(s)</h3>";
}
else
{   
// prepare the output using heredoc syntax

$output = <<<ABC
<table>
   <caption>$matchingRecords Recipies found</caption>
   <tbody>
ABC;
    $recipeNum = 0;
    foreach ($recipeList as $recipe)
    {
//        print_r($recipe);
        extract($recipe);
        $recipeNum ++;
        $dateAdded = date_format(new DateTime($dateAdded), "F j, Y");
        $output .= <<<ABC
        <tr>
            <td>$recipeNum: $RecipeName<br />
                Category: $CategoryName <br />
                
                
            </td>
            <td>Time Of Year: $TimeOfYear <br />
                Cook Time: $CookTime <br />
            <td>
               Added: $dateAdded <br />
               Allergies: $AllergieName
            </td>
        </tr>
        <tr>
            <td colspan="3">
               Ingredients: $Ingredients <br />
               Instructions: $Instructions <br />
            </td>
        </tr>
ABC;
    }
    
    $output .= "<tbody></table>";
}
$output .= <<<ABC
<p style="text-align: center">
    <a href="searchRecipe.php">[Back to Search Page]</a>
</p></section>
ABC;

// display the output

echo $output;

// call the displayPageFooter method in siteCommon.php

displayPageFooter();
?>