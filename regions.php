<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();



   if(isset($_SESSION['username']) ) {
    // && !empty($_SESSION['id']=$id)
  $username=$_SESSION['username'];


  
//   unset($_SESSION["products"])
        require 'includes/header.inc';
        require 'includes/navbar.inc';
        include 'includes/sidemenu.php';
        $calendars=$execute->selectAll("regions");
        if($calendars==true){
         
       

        
?>
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content ">
<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="pageheader-title">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Regions</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View</li>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_region.php'>Add new Region <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>
 

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">




<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- <div class="card">
                               
                                <div class="card-body"> -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                            <!-- Full texts 	id 	name 	latitude 	longtitude 	place_details 	date_added 	admin   -->
<!-- editor	calendar_name	period	id	crop	variety	region1	region2	region3 	 -->
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                
                                                <th scope="col">latitude</th>
                                                <th scope="col">Longtude</th>
                                                <th scope="col">Details</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Editor 1</th>
                                                <th scope="col">Edit</th>
                                            </tr>
                                        </thead>
                                        <style>
                                        .hide{

                                                visibility: hidden

                                                }
                                        </style>
                                        <tbody>
                                                                                    <!-- Full texts 	id 	name 	latitude 	longtitude 	place_details 	date_added 	admin   -->

                                            <?php
                                               foreach($calendars as $calendar){
                                                   echo"
                                            <tr>
                                                <th scope='row'>".$calendar['id']."</th>
                                                <td >".$calendar['name']."</td>
                                                <td>".$calendar['latitude']."</td>
                                                <td>".$calendar['longtitude']."</td>
                                                <td>".$calendar['place_details']."</td>
                                                <td>".$calendar['date_added']."</td>
                                                <td>".$calendar['admin']."</td>
                                                <td><a  class='badge badge-info' href='view_task.php?calendar_id=".$calendar['id']."'>Edit</a></td>
                                                </tr>
                                            ";
                                               }}
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                <!-- </div>
                            </div> -->
                        </div>

                                         <!-- <button type="submit" class="btn btn-danger btn-lg btn-block" name="create">CREATE</button> -->
                                     </form>
    </div>
                                     <?php
            
}else{
    header('Location:index.php');
}
?>