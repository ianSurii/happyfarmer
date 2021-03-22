<?php


include('classes/DbFunctions.php');

// require 'includes/header.inc';
// include 'includes/navbar.inc';
// include 'includes/sidemenu.php';


$execute=new dbFunction();

if(isset($_POST['add_employee'])){
    extract($_POST);

    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }

 $password=implode($pass);
 $emp_username=$first_name.$last_name;
 $encrypted_password=md5($password);

   $table="user_records";
   $column="first_name,last_name,user_name,email,`password`,residence,user_type,phone_number,county";
   $values="'$first_name','$last_name','$emp_username','$email','$encrypted_password','$residence','1','$phone','Kenya'";
   $add_employee=$execute->insert($table,$column,$values);
   if($add_employee==true){
      
       $employee_id=$execute->select("user_records","where user_name='$emp_username'");
       if($employee_id==true)
      $employer_id= $_SESSION['user_id'];
      $emp_id= $employee_id[0]['id'];
    //   echo "<script>window.alert('Please fill the form and try again.Password must equal Cornfirm password')</script>"; 

       $record=$execute->insert("employees",'farms,employer,employee_id',"'$farm','$employer_id','$emp_id'");
       if($record==true){
           $mail="Congrats!! user this ".$username." and ".$password." to login";
        //    Send the Employee Login Credentials 
        $to = $email;
        $subject = "Congrats";
        
        $message = $mail;
        
        $header = "From:noreply@happyfarmer.com \r\n";
        $header .= "Cc:ianmuthuri254@gmail.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail($to,$subject,$message,$header);
        
        if( $retval == true ) {
           echo "Message sent successfully...";
        }else {
           echo "Message could not be sent...";
        }
        header("Location:employees.php");
       }else{
        echo "<script>window.alert('Please fill the form and try again.Password must equal Cornfirm password')</script>"; 
       }


   }



}else{

}

   if(isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
  

        require 'includes/header.inc';
        require 'includes/navbar.inc';
        include 'includes/sidemenu.php';

        
?>
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content ">
<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="pageheader-title">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Employees</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">New</li>
                                            
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <!-- <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a> -->
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
<p>
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">First Name</label>
                                                 <input type="text" class="form-control" required="" name="first_name" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Last Name</label>
                                                 <input type="text" class="form-control" required="" name="last_name" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">First Name</label>
                                                 <input type="text" class="form-control" required="" name="name" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div> -->
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Email</label>
                                                 <input type="email" class="form-control" required="" name="email" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div> 
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Phone</label>
                                                 <input type="text" class="form-control" required="" name="phone" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Residence</label>
                                                 <input type="text" class="form-control" required="" name="residence" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Farm</label>
                                                 <select type="text" class="form-control" required=""  name="farm" id="validationCustom04">
                                                     <?php
                                                     $username=$_SESSION['username'];
                                                     $farms=$execute->conditionSelect('name,id',"farms where owner='$username'");
                                                     if($farms==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($farms as $farm){
                                                         echo"<option value=".$farm['id']." >".$farm['name']."</option>";
                                                     }}
                                                     else{
                                                        echo"<option value='' selected='selected'>No crops Available</option>";
                                                     }

                                                     ?>
                                                     
                                       
                                                     </select>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Email.
                                                 </div>
                                            
                                         </div>
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="add_employee">ADD</button>
                                     </form>
    </div>
                                     <?php
 
}else{
    header('Location:index.php');
}
?>
