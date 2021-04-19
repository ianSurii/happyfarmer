<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();
if(isset($_GET['delete'])){
    extract($_GET);
    $delete_crop=$execute->delete("crops","Where id='$delete'");
    if($delete_crops==true){
        echo "<script>window.alert('delete')</script>";
    }
}



   if(isset($_SESSION['username']) ) {
    // && !empty($_SESSION['id']=$id)
  $username=$_SESSION['username'];


  
//   unset($_SESSION["products"])
        require 'includes/header.inc';
        require 'includes/navbar.inc';
        include 'includes/sidemenu.php';
        $places=$execute->selectAll("crops");
        if($places==true){
         
       

        
?>
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content ">
<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="pageheader-title"><image src="assets/images/icon.png"  width="60px" height="50px">Happy Farmer </h2>                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="crops.php" class="breadcrumb-link">Crops</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">View</li>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='new_crop.php'>New Crops <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>
 

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">




                           

                                            <?php
                                               foreach($places as $place){


                                                echo   "
                                                <div class='card' value='Show-Hide' '>
                                                                           <div class='card-body'>
                                                                              

<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                                                               <table class='table table-hover'>
                                        <thead>
                                            <tr>

                                                                               <th scope='col'>#</th>
                                                                               <th scope='col'>Name</th>
                                                                               
                                                                               <th scope='col'>variety</th>
                                                                               <th scope='col'>Regions</th>
                                                                               
                                                                           </tr>
                                                                       </thead>
                                                                       
                                                                       <tbody>
                                                                                
                                                                                  
                                                                               <tr>
                                                                               <th scope='row'>".$place['id']."</th>
                                                                               <td >".$place['crop_name']."</td>
                                                                               <td>".$place['crop_variety']."</td>
                                                                               <td>".$place['crop_locations']."</td>
                                                                               
                                                                               <td><a  class='badge badge-success' href='?delete=".$place['id']."'><span class='fas fa-trash-alt'><span></a>
                                                                               <a  class='badge badge-success' href='?calendaredit_id=".$place['id']."'><span class='fas fa-pencil-alt'><span></a>
                                                                               </td>

                                                                               </tr>
                                                                                               
                                                                                </tbody>
                                                                                </table>
                                                                              </div>
                                                                             
                                                                               
                                                                              
                                                                           </div>
                                                                           </div>
                                                                    ";



                                                 
                                               }}

                                            }else{
                                                echo"
                                            <tr>
                                                There is no Crops recorded
                                            ";

                                               ?>
                                        
                                </div>
                            </div>
                        
              <?php
                                 

    header('Location:index.php');
}
require ('includes/footer.php');
?>