<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_POST['addRegion'])){
    extract($_POST);
    $editor=$_SESSION['username'];
// Full texts 	id 	name 	latitude 	longtitude 	place_details 	date_added 	admin 	
    $date = new DateTime();
    // $id=$date->getTimestamp();
    $column="name,latitude,longtitude,place_details,date_added,admin";
    $values="'$name','$latitude','$longtitude','$details',CURRENT_DATE,'$editor'";
    // $_SESSION['id']=$id;
    $create=$execute->insert('regions',$column,$values);
    if($create==true){
        
            header('Location:regions.php');
           
        
       
    }else{
        echo "<script>window.alert('try again')</script>";
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
                                            <li class="breadcrumb-item"><a href="regions.php" class="breadcrumb-link">Regions</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                                            <li class="breadcrumb-item active" aria-current="page">New</li>
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_region.php'>Add New Region <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
<div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Place Name</label>
                                                 <input type="int" class="form-control" required="" name="name" id="" placeholder="Example Mwea" >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Latitude</label>
                                                 <input type="int" class="form-control" required="" name="latitude" id="" placeholder="0.63623872" >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Longitude</label>
                                                 <input type="int" class="form-control" required="" name="longtitude" id="" placeholder="37.2389232" >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                    </div>
                                            
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Details</label>
                                                 <textarea rows="8" cols="70" name="details"> </textarea>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="addRegion"><span class="fas fa-pencil-alt"></span>ADD</button>
                                     </form>
    
                                     <?php
                                       require ('includes/footer.php');
 
}else{
    header('Location:index.php');
}
?>