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
                                            <li class="breadcrumb-item active" aria-current="page">All calendars</li>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>
 






<!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> -->
                            <!-- <div class="card"> -->
                            
                                <!-- <div class="card-body"> -->
                                <?php
                                $calendars=$execute->selectAll("farm_calendars");
                                if($calendars==true){
                                 
                                  foreach($calendars as $calendar){
                                      $cardname="mycli".$calendar['id'];
                                      $div_id=$calendar['id'];
                                    $calendar_id=trim($calendar_id['id']);
                               echo"  
                                    
                                                                 
                                                                 
                               <script type='text/javascript' language='javascript'>
                                  function ".$cardname."(){
                                      var ele = document.getElementById(".$div_id.");
                                      if(ele.style.display == 'none') {
                                              ele.style.display = 'block';
                                      }
                                      
                                  }

                                  </script>
                                  <div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                  <div class='card-body'>
                                     
                                         
                                    
                                    <table class='table table-hover'>
                                        <thead>
                                            <tr>


                                                <th scope='col'>#</th>
                                                <th scope='col'>Calendar</th>
                                                
                                                <th scope='col'>Period</th>
                                                <th scope='col'>Editor</th>
                                                <th scope='col'>Crop</th>
                                                <th scope='col'>Variety</th>
                                                <th scope='col'>Region 1</th>
                                                <th scope='col'>Region 2</th>
                                                <th scope='col'>Region 3</th>
                                                
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                           
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
                                                
                                            </tbody>
                                               </table>
                                           
                                  
                                               <div class='float-right icon-circle-medium  icon-box-md  bg-danger-light mt-1'>
                                                   <i class='fa fa-eye fa-fw '></i>
                                               </div>
                                               <div id='".$div_id."' style='display:none;'>";
                                               echo"
                                               <table class='table table-hover'>
                                                <thead>
                                                <tr>
                                                <th scope='col'>#</th>
                                                <th scope='col'>Activitites</th>
                                                <th scope='col'>Title</th>
                                                <th scope='col'>Week</th>
                                                <th scope='col'>Edit</th>
                                                </tr>";
                                             
                                               $tasks=$execute->select("task","where calendar_id='".$calendar['id']."'");
                                         if($tasks==true){
                                               foreach($tasks as $task){
                                                   $task_id=$task['id'];
                                                   $activities=$execute->conditionSelect("count(activity) as activity","activity where task_id='".$task['id']."'");
                                                echo"
                                                
                                         <tr>
                                         
                                             <td >".$task['week']."</td>
                                             <td>".$activities[0]['activity']."</td>
                                             <td>".$task['task_title']."</td>
                                             <td>".$task['week']."</td>
                                             <td><a  class='badge badge-danger' href=' edit_calendar_task.php?task_id=".$task['id']."'>Edit</a></td>
                                             </tr>
                                             
                                         ";
                                            }

                                         echo"
                                         <thead>
                                         </tbody>
                                    </table>";
                                        }else{
                                                echo "No Task Available";
                                            }



                                              echo"
                                               </div>
                                               </div>
                                               
                                               </div>";
                                               }}else{

                                                echo"
                                                
                                                ";

                                               }
                                               
                                            ?>
                                            
                                        
                                     <?php
                                     include 'includes/footer.php';
            
}else{
    header('Location:index.php');
}
?>