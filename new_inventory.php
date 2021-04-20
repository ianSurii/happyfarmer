<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_POST['add_inventory'])){
    extract($_POST);
    $editor=$_SESSION['username'];
    $date = new DateTime();
    $id=$date->getTimestamp();
    $column="farm_id,Name,Cost,Quantity";
    $values="'$farm','$name','$cost','$quantity'";
    // <!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
    $_SESSION['id']=$id;
    $create=$execute->insert('inventory',$column,$values);
    if($create==true){
  
    // echo "<script>window.alert('fill details')</script>";
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
                              <h2 class="pageheader-title"><image src="assets/images/icon.png"  width="60px" height="50px">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Inventory</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                                            <li class="breadcrumb-item active" aria-current="page">New</li>
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='inventory.php'> <span class="fas fa-undo">Go Back</span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
<p>Create a new Inventory.
<div class="form-row">
                                             
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">NAME</label>
                                                 <input type="text" class="form-control" required="" name="name" id=""  >
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

                                         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">COST</label>
                                                 <input type="number" class="form-control" required="" name="cost" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Quantity</label>
                                                 <input type="number" class="form-control" required="" name="quantity" id=""  >
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
                                          
                                         
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="add_inventory">CREATE</button>
                                     </form>
    </div>
                                     <?php
                                       require ('includes/footer.php');
 
}else{
    header('Location:index.php');
}
?>