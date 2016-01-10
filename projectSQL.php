<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'dbConnExec.php';


function mostRecentPublic()
{
    $query = <<<STR
            SELECT TOP 10 *
            FROM Recipe r
            Where r.IsPublic = 1
            ORDER BY RecipeID
            
STR;
     //WHERE public = 
    
    return executeQuery($query);

}

function getCategories()
{
    $query = <<<STR
Select categoryid, categoryname
From category
Order by categoryid
STR;

    return executeQuery($query);
}

function getAllergie()
{
    $query = <<<STR
Select allergieID, allergiename
From allergies
Order by allergieID
STR;
    
    return executeQuery($query);
}       
            
function getTimeOfYear()
{
    $query = <<<STR
            Select timeofyear
            From recipe
            order by timeofyear
STR;
    return executeQuery($query);
    
}
            
function searchForRecipe($userID, $recipename, $timeOfYear, $categoryID, $allergieID)
{
    $cat = 'OR';
    if (!isset($_SESSION['userinfo'])) {
        $userID = 52;
    }
    if ($categoryID!=3) {
        $cat = 'AND';
    }
    if ($allergieID!=1) {
        $aller = 'AND';
    } else {
        $aller = "OR";
    }
    
    $query = <<<STR
            Select * 
            From Recipe r INNER JOIN Allergies a
            ON r.AllergieID=a.AllergieID
              INNER JOIN Category c
	    ON r.CategoryID=c.CategoryID
            Where (r.IsPublic=1 OR r.userID=$userID)
              AND (recipename LIKE '%$recipename%')
              AND r.timeOfYear LIKE '%$timeOfYear%'
              $cat r.CategoryID=$categoryID
              $aller r.AllergieID=$allergieID
STR;
    return executeQuery($query);
}

function getACategory($categoryPK) {
    $query = <<<STR
            Select categoryname
            From category
            Where categoryid = $categoryPK
STR;
    return executeQuery($query);
}

function getAAllergie($allergieID) {
    $query = <<<STR
            Select allergiename
            From allergies
            Where allergieid = $allergieID
STR;
    return executeQuery($query);
}
            
?>