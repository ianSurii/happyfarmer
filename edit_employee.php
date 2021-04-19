<?php


include('classes/DbFunctions.php');

// require 'includes/header.inc';
// include 'includes/navbar.inc';
// include 'includes/sidemenu.php';


$execute=new dbFunction();
if(isset($_POST['update'])){
    extract($_POST);
    


$table="user_records";
// $column="first_name,last_name,user_name,email,`password`,residence,user_type,phone_number,county";
// $values="'$first_name','$last_name','$emp_username','$email','$encrypted_password','$residence','1','$phone','Kenya'";

$update_records=$execute->update($table,"SET first_name='$first_name',last_name='$last_name',email='$email',residence='$residence',phone_number='$phone'"," id='$id'");

//    echo "<script>window.alert('Please fill the form and try again.Password must equal Cornfirm password')</script>"; 
$update_employee=$execute->update("employees","SET farms='$farm'"," employee_id='$id'");
if($update_employee && $update_records==true){
       header('Location:employees.php');

}
}



        if(isset($_GET['edit'])){
            extract($_GET);

            $select_records=$execute->select("employees ","where employee_id =$edit");
            $select_user_records=$execute->select("user_records","where id=$edit");
            if($select_records==true){
        
            
         
               
    
   if(isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    
}else{
    header('Location:index.php');
}
          require 'includes/header.inc';
          require 'includes/navbar.inc';
          include 'includes/sidemenu.php';    
        
?>
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content ">
<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="pageheader-title"><image src="assets/images/icon.png"  width="60px" height="50px">Happy Farmer </h2>                                <div class="page-breadcrumb">
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
                                                 <input type="text" class="form-control" required="" value="<?php echo $select_user_records[0]['first_name'];?>" name="first_name" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Last Name</label>
                                                 <input type="text" class="form-control" required="" value="<?php echo $select_user_records[0]['last_name'];?>" name="last_name" id=""  >
                                                 <input type="hidden" value="<?php echo $edit;?>" name="id" id=""  >
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
                                                 <input type="email" class="form-control" value="<?php echo $select_user_records[0]['email'];?>" required name="email" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div> 
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Phone</label>
                                                 <input type="text" class="form-control" required="" value="<?php echo $select_user_records[0]['phone_number']?>" name="phone" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Residence</label>
                                                 <input type="text" class="form-control" required="" value="<?php echo $select_user_records[0]['residence']?>" name="residence" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Farm</label>
                                                 <select type="text" class="form-control" required="" name="farm" id="validationCustom04">
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
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="update">Update</button>
                                     </form>
    </div>
                                     <?php
                              
                            }
        
        
        
        }else{

                                    }
 



?>
