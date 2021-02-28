<?php
include('classes/DbFunctions.php');

$execute=new dbFunction();
   if(isset($_POST['register'])) {
    extract($_POST);
    if($password==$cpassword){
    $encrypted_password=md5($password);
    // Full texts 	id 	first_name 	last_name 	user_name 	email 	password 	residence 	user_type 	phone_number 	country 
    $check=$execute->select("user_records","WHERE user_name='$username' or email='$email'");
    if ($check==false) {
        $register=$execute->insert("user_records","first_name,last_name,user_name,email,`password`,residence,user_type,phone_number,county ","'$first_name','$last_name','$username','$email','$encrypted_password','$residence','001','$phone','Kenya'");
        if($register==true){
            $_SESSION['username']=$username;
        
            header('Location:worker.php');
        }
        else{
            echo "<script>window.alert('Please fill the form and try again')</script>";
        }
      
    }else{
        echo "<script>window.alert('Please fill the form and try again.Password must equal Cornfirm password')</script>"; 
    }
    }else{
        echo "<script>window.alert('Please fill the form and try again')</script>"; 
    }
    }
    if(isset($_POST['login'])){
        extract($_POST);
        $encry_password=md5($userpassword);
        $login=$execute->select("`user_records`" ,"WHERE user_name='$user_name' && `password`='$encry_password'");
        // $usertype=$execute->select("user_records `","WHERE user_name='$user_name' && `password`='$encry_password'");
        if($login==true){
            $_SESSION['username']=$user_name;
            $usertype=$login[0]['user_type'];
            // echo "<script>window.alert('".$usertype."')</script>";
            $_SESSION['usertype']=$usertype;
            if($login[0]['user_type']==1){
                
            header('Location:worker.php');
             }elseif($login[0]['user_type']==11){
                header('Location:farmer.php');

            }else if($login[0]['user_type']==111){
                
                header('Location:admin.php');

          }

        }
        else{
            echo "<script>window.alert('Invalid Credentials')</script>"; 
        }

    }

?>  

<!DOCTYPE html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link href="assets/custom.css" rel="stylesheet" type="text/css">
    <title>HappyFarmer</title>
</head>
<body>
  

<div class="wrapper">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="c-nav">
                                    <h3 class="section-title">The Happy Farmers System</h3>
                                    <p>Login or register to manage your farms in all regions in one click</p>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card ">
                                    <div class="card-header tab-regular">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                            <li class="nav-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" >
                                                <a class="nav-link active" id="card-tab-1" data-toggle="tab" href="#card-1" role="tab" aria-controls="card-1" aria-selected="true">Sign Up</a>
                                            </li>
                                            <li class="nav-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                                <a class="nav-link" id="card-tab-2" data-toggle="tab" href="#card-2" role="tab" aria-controls="card-2" aria-selected="false">Sign In</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6" id="card-1" role="tabpanel" aria-labelledby="card-tab-1">
                                          
                                        <form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
                                         
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">First Name</label>
                                                 <input type="text" class="form-control" required="" name="first_name" id="validationCustom03" placeholder="John" required="">
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Last Name</label>
                                                 <input type="text" class="form-control" required="" name="last_name" id="" placeholder="Doe" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Username</label>
                                                 <input type="text" class="form-control" required="" name="username" id="validationCustom03" placeholder="JohnDoe" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Username.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">email</label>
                                                 <input type="email" class="form-control" required="" name="email" id="validationCustom04" placeholder="State" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Email.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Residence</label>
                                                 <input type="text" class="form-control" required="" name="residence" class="form-control" id="validationCustom03" placeholder="Meru,Mitunguu" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Residence.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Phone</label>
                                                 <input type="tel" class="form-control" required="" name="phone" id="validationCustom04" placeholder="Phone" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Phone Number.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                                 <!-- //data-parsley-pattern="/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/" -->
                                                 <label for="validationCustom03">Password</label>
                                                 <input type="password" id="pass"class="form-control" required="" data-parsley-minlength="6"  name="password" placeholder="********" >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Password.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Confirm Password</label>
                                                 <input type="password" class="form-control" name="cpassword" required="" data-parsley-equalto="#pass" placeholder="********" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid CPassword.
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
                                         <button type="submit" class="btn btn-success btn-lg btn-block" name="register">Sign In</button>
                                     </form>
                                          </div>
                                            <div class="tab-pane fade col-xl-12 col-lg-12 col-md-12 col-sm-6 col-6" id="card-2" role="tabpanel" aria-labelledby="card-tab-2">
                                              <!-- Regsister tab -->
                                              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                               
                                <div class="card-body">
                                <form method="POST" action="" >
                                                  <div class="form-group">
                                                      <input class="form-control form-control-lg" id="username" name="user_name" type="text" placeholder="Username" required autocomplete="off">
                                                  </div>
                                                  <div class="form-group">
                                                      <input class="form-control form-control-lg" id="password" name="userpassword" type="password" placeholder="Password">
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="custom-control custom-checkbox">
                                                          <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                                                      </label>
                                                  </div>
                                                  <button type="submit" class="btn btn-success btn-lg btn-block" name="login">Sign in</button>
                                        </form>
                                   
                                </div>
                            </div>
                        </div>
                                                <!-- ============================================================== -->
                                                <!-- end valifation types -->
                                          </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
include 'includes/footer.php';
?>