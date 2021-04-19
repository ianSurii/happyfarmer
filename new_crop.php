<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_POST['new_crop'])){
    extract($_POST);
    
    $column="crop_name,crop_variety,crop_locations";
    $values="'$name','$variety','$locations'";
    // <!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
  
    $create=$execute->insert('crops',$column,$values);
    if($create==true){
       
            header('Location:crops.php');
           
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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Calendars</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                                            <li class="breadcrumb-item active" aria-current="page">New</li>
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<div class="row">
                                         
                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Crop Name</label>
                                                 <input type="text" class="form-control" required="" name="name" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
   </div>
                                            
                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Variety Name</label>
                                                 <input type="text" class="form-control" required="" name="variety" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
   </div>
                                             
                                             
                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Locations</label>
                                                 <input type="text" class="form-control" required="" name="locations" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
   </div>
                                             
   </div>
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="new_crop">ADD</button>
                                     </form>
    </div>
                                     <?php
                                       require ('includes/footer.php');
 
}else{
    header('Location:index.php');
}
?>