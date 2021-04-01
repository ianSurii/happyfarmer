<?php
include 'classes/AfricasTalkingGateway.php';
$at=new  AfricasTalkingGateway();
if(isset($_POST['send'])){
   extract($_POST);
     $options[] = array();

   $send=$at->sendMessage("254701291383","46083",$bulkSMSMode_ = 1);
}

 ?>
 <form method="POST" action="AfricasTalkingGateway.php">

 


 <<button type="submit" name="send">Send</button>>
 </form>
