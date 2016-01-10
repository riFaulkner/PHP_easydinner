
<?php
session_start();
include_once '../siteCommon.php';
include_once 'dishForm.php';
displayPageHeader("Search for a recipe by Name");

$output= <<<STR
<section>
   <form action="searchResults.php" method = "post" name="SearchByRecipe" id="SearchByRecipe">
      <label for="recipeName">Dish Title</label>
      <input type="text" name="recipeName" id ="recipeName" maxlength="50" />
      <label for="Type
      <label for="Ingredients">Ingredients</label>
      <input type="text" name="ingredients" id ="ingredients" maxlength="50" />
      <label for="
      <p>
         <input type="submit" value="Search" name="search" />
      </p>
   </form>
</section>
STR;
//
//echo $output;

dishFormSearch();

displayPageFooter();
?>

