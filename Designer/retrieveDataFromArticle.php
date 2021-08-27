<?php


// get the q parameter from URL

$q = $_REQUEST["q"];
$w = $_REQUEST["w"];

$articleNameID = $q;
include 'requirements.php';


$response = "";


function getValueFromArticle($article,$value){
  $articleData = importArticleData($article);
  $result = $articleData[$value];
  return $result;
}
// lookup all hints from array if $q is different from ""

$response = getValueFromArticle($q,$w);

// Output "no suggestion" if no hint was found or output correct values
echo $response === "" ? "error" : $response;
?>