<?php
include 'classes/DbFunctions.php';
$execute=new dbFunction();

$select_crops=$execute->conditionSelect("count(crop_name) as crops_count","crops");
if($select_crops==true){
 foreach($select_crops as $crop){
  print_r($select_crops);
  echo count($select_crops); 
  echo $crop['crops_count'];
 }
  
}

?>
