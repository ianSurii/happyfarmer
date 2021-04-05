<?php

if(isset($_POST['send'])){
   extract($_POST);
    $email="17g01abt017@anu.ac.ke";
   $subject = "Close Garage";
   $message = "Hello ian,\n\nVerify that you own iansurii.\n\nYou may be asked to enter this confirmation code:\n\n0000\n\nRegards,\nClose Garage.";
   $from = "support@androidlearning.in";
   $headers = "From: happyfarmer@mail.com" ;

   mail($email,$subject,$message,$headers);

   $response["error"] = FALSE;
   $response["message"] = "Register successful!";
   echo json_encode($response);
   
}

 ?>
 <form method="POST" action="">

 
     

 <button type="submit" name="send">Send</button>>
 </form>
