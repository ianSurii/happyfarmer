<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_GET['delete'])){
    extract($_GET);
    $delete_crop=$execute->delete("regions","Where id='$delete'");
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
        
         
       

        
?>
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content ">
<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                              <h2 class="pageheader-title"><image src="assets/images/icon.png"  width="60px" height="50px">Happy Farmer </h2> 
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
 </div>
 

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">




<!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> -->
                            <!-- <div class="card">
                               
                                <div class="card-body"> -->
                                                                  <!-- Full texts 	id 	name 	latitude 	longtitude 	place_details 	date_added 	admin   -->

                                            <?php
                                            $places=$execute->selectAll("regions");
                                            if($places==true){
                                               foreach($places as $place){
                                                   echo"
                                                   <div class='card' value='Show-Hide' '>
                                                                           <div class='card-body'>
                                                                              

<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                                                               <table class='table table-hover'>
                                        <thead>
                                            <tr>

                                            <th scope='col'>#</th>
                                            <th scope='col'>Name</th>
                                            
                                            <th scope='col'>latitude</th>
                                            <th scope='col'>Longtude</th>
                                            <th scope='col'>Details</th>
                                            <th scope='col'>Date</th>
                                            <th scope='col'>Editor 1</th>
                                            <th scope='col'>Edit</th>
                                                                           </tr>
                                                                       </thead>
                                                                       
                                                                       <tbody>





                                            <tr>
                                                <th scope='row'>".$place['id']."</th>
                                                <td >".$place['name']."</td>
                                                <td>".$place['latitude']."</td>
                                                <td>".$place['longtitude']."</td>
                                                <td>".$place['place_details']."</td>
                                                <td>".$place['date_added']."</td>
                                                <td>".$place['admin']."</td>
                                                <td>
                                                <a  class='badge badge-success' href='?delete=".$place['id']."'><span class='fas fa-trash-alt'><span></a>
                                               
                                                </tr>


                                                </tbody>
                                    </table>
                                            
                                    </div>
                                    </div>
                                       </div>";
                                               }}
                                            ?>
                                            
                                        
                                <!-- </div>
                            </div> -->
                        <!-- </div> -->

                                         <!-- <button type="submit" class="btn btn-danger btn-lg btn-block" name="create">CREATE</button> -->
                                     </form>

                                     <?php
                                       require ('includes/footer.php');
            
}else{
    header('Location:index.php');
}
?>