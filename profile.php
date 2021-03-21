<?php

require 'includes/header.inc';

include('classes/DbFunctions.php');
include 'includes/navbar.inc';
include 'includes/sidemenu.php';





$execute=new dbFunction();
   if(isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
  $table="user_records";
  $condition="WHERE user_name='$username'";
    $user_data=$execute->select($table,$condition);
    if($user_data==true){
        

      
?>  
 <div class="dashboard-wrapper">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Profile</h5>
                                <div class="card-body">
                                    <form class="needs-validation" novalidate>
                                          <!-- <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom01">First name</label>
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustom02">Last name</label>
                                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <label for="validationCustomUsername">Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-row">
                                            
                                                <style>
                                                    #edit{
                                                        margin-left:200px;
                                                    }
                                                    #edit2{
                                                        margin-left:200px;
                                                    }
                                                </style>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom04">Firstname:</label><strong> <?php echo $user_data[0]['first_name'];?></strong>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Lastname:</label><strong> <?php echo $user_data[0]['last_name'];?></strong>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom04">Username:</label><strong> <?php echo $user_data[0]['user_name'];?></strong>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Email:</label><strong> <?php echo $user_data[0]['email'];?></strong>
                                               
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom04">Residence:</label><strong> <?php echo $user_data[0]['residence'];?></strong>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Phone:</label><strong><?php echo $user_data[0]['phone_number'];?></strong>
                                               
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="validationCustom04">County:</label><strong> <?php echo $user_data[0]['county'];?></strong>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom04">Password:</label><strong> <?php echo "***********";?></strong>
                                               
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
                                        <a type="submit" class="btn btn-warning btn-lg btn-block fas fa-pencil" name="edit_profile" href="edit.php">Edit</a>
                                        <a type="submit" class="btn btn-danger btn-lg btn-block fas fa-pencil" name="edit_profile" href="change_pass.php">Change Password</a>
                                        <a type="submit" class="btn btn-info btn-lg btn-block fas fa-pencil" name="edit_profile" href="new_farm.php">Add Farms</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                                                </div>
<?php
 }else{
    header('Location:index.php');

 }
}else{
    header('Location:index.php');
}
include 'includes/footer.php';
?>
