<?php


include('classes/DbFunctions.php');

// require 'includes/header.inc';
// include 'includes/navbar.inc';
// include 'includes/sidemenu.php';


$execute=new dbFunction();

if(isset($_POST['add_produce'])){
    extract($_POST);
    $user_id=$_SESSION['user_id'];
    $farms_id=$execute->select("employees","where employer='$user_id'");
    
   
    if($transaction=="CREDIT"){
        $status="0";
    }else{
        $status="1";
        
    }

    $insert_records=$execute->insert("produce","farm_id,cost,buyer,trasnsaction,status,contact,name,unit","'$farm','$cost','$buyer','$transaction','$status','$contact','$details','$unit'");
    if($insert_records==true){
        echo "<script>window.alert('".$id."Added Successfully')</script>";
        if($usertype==111){
            header('Location:produce.php');
        }elseif($usertype==11){
            header('Location:farmer_produce.php');
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
                                                 <label for="validationCustom03">Buyer</label>
                                                 <input type="text" class="form-control" required="" name="buyer" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Cost</label>
                                                 <input type="text" class="form-control" required="" name="cost" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Unit</label>
                                                 <input type="text" class="form-control" required="" name="unit" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Details</label>
                                                 <input type="email" class="form-control" required="" name="details" id=""  >
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
                                                 <label for="">Transaction</label>
                                                <select type="text" class="form-control" required="" name="transaction" id=""  >
                                                <option value="CREDIT">CREDIT</option>
                                                <option value="CASH">CASH</option>
                                                 </select>
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
                                             <!-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Residence</label>
                                                 <input type="text" class="form-control" required="" name="residence" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                              -->
                                            
                                        
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="add_produce">ADD</button>
                                     </form>
  
                                     <?php
                                       require ('includes/footer.php');
 
}else{
    header('Location:index.php');
}
?>
