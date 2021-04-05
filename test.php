<?php
$current_date = date("2021-04-05");

echo $current_date;


$task_deadline=date('Y-m-d', strtotime($current_date .'+6 day'));
   
 echo $task_deadline ;
?>