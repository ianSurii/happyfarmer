<?php
include('classes/DbFunctions.php');



$conf = "if(confirm('Please confirm you want to update profile')){ return true;}else{return false;}";
$execute=new dbFunction();
if(isset($_POST['update'])){
    extract($_POST);
    ///updateformat SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
    //WHERE CustomerID = 1;
    $last_used_username=$_SESSION['username'];
    $table="user_records";
    $setColumnValue="SET `first_name`='$first_name',`last_name` = '$last_name', user_name='$username', email='$email', residence='$residence', phone_number='$phone'";
    $condition=" user_name='$last_used_username'";

    $update=$execute->update($table,$setColumnValue,$condition);
    if($update){
        $_SESSION['username']=$username;
        header('Location:profile.php');
    }
}else{

}
   if(isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
  $table="user_records";
  $condition="WHERE user_name='$username'";
    $user_data=$execute->select($table,$condition);
    if($user_data==true){
        


        require 'includes/header.inc';
        require 'includes/navbar.inc';
        include 'includes/sidemenu.php';
?>
<div class="dashboard-wrapper">

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
                                         
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">First Name</label>
                                                 <input type="text" class="form-control" required="" name="first_name" id="validationCustom03" value="<?php echo $user_data[0]['first_name'];?>" required="">
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Last Name</label>
                                                 <input type="text" class="form-control" required="" name="last_name" id="" value="<?php echo $user_data[0]['last_name'];?>" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Username</label>
                                                 <input type="text" class="form-control" required="" name="username" id="validationCustom03" value="<?php echo $user_data[0]['user_name'];?>" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Username.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">email</label>
                                                 <input type="email" class="form-control" required="" name="email" id="validationCustom04" value="<?php echo $user_data[0]['email'];?>" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Email.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Residence</label>
                                                 <input type="text" class="form-control" required="" name="residence" class="form-control" id="validationCustom03" value="<?php echo $user_data[0]['residence'];?>" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Residence.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Phone</label>
                                                 <input type="tel" class="form-control" required="" name="phone" id="validationCustom04" value="<?php echo $user_data[0]['phone_number'];?>" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Phone Number.
                                                 </div>
                                             </div>
                                           
                                            
                                             <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                 <div class="form-group">
                                                     <div class="form-check">
                                                         <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                                         <label class="form-check-label" for="invalidCheck">
                                                             Agree to terms and conditions
                                                         </label>
                                                         <div class="invalid-feedback">
                                                             You must agree before submitting.
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div> -->
                                            
                                         </div>
                                         <button  onClick="<?php echo $conf ?>"type="submit" class="btn btn-danger btn-lg btn-block" name="update">UPDATE</button>
                                     </form>
    </div>
                                     <?php
 }else{

 }
}else{
    header('Location:index.php');
}
?>