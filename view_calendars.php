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
        $calendars=$execute->selectAll("farm_calendars");
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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Calendars</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">All calendars</li>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>
 

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">




<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- <div class="card"> -->
                               
                                <!-- <div class="card-body"> -->
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>

<!-- editor	calendar_name	period	id	crop	variety	region1	region2	region3 	 -->
                                                <th scope="col">#</th>
                                                <th scope="col">Calendar</th>
                                                
                                                <th scope="col">Period</th>
                                                <th scope="col">Editor</th>
                                                <th scope="col">Crop</th>
                                                <th scope="col">Variety</th>
                                                <th scope="col">Region 1</th>
                                                <th scope="col">Region 2</th>
                                                <th scope="col">Region 3</th>
                                                <th scope="col">Edit</th>
                                            </tr>
                                        </thead>
                                        <style>
                                        .hide{

                                                visibility: hidden

                                                }
                                        </style>
                                        <tbody>
                                            <?php
                                               foreach($calendars as $calendar){
                                                   echo"
                                            <tr>
                                                <th scope='row'>".$calendar['id']."</th>
                                                <td >".$calendar['calendar_name']."</td>
                                                <td>".$calendar['period']."</td>
                                                <td>".$calendar['editor']."</td>
                                                <td>".$calendar['crop']."</td>
                                                <td>".$calendar['variety']."</td>
                                                <td>".$calendar['region1']."</td>
                                                <td>".$calendar['region2']."</td>
                                                <td>".$calendar['region3']."</td>
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