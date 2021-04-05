<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_GET['delete'])){
    extract($_GET);

    $delete=$execute->delete("farmer_calendars","where id=$delete");
    unset($_POST);
}

   if(isset($_SESSION['username'])) {
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
                            <h2 class="pageheader-title">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Farms</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">All Farms</li>
                                        </ol>
                                    </nav>
                                </div>
                                <style>
                                .hide{
                                    display:none;

                                }
                                .myDIV:hover + .hide {
                                display: block;
                                color: red;
                                }
                                </style>
                                <!-- <div class="myDIV">
                                <a class="badge badge-secondary" href='new_employees.php'>Add Employee<span class="fas fa-calendar-plus"></span></a> </div> -->
                                <a class="badge badge-info" href='farm_calendar.php'>Add Calendar<span class="fas fa-calendar-plus"></span></a> 
                                <a class="badge badge-success" href='new_farm.php'>Add Employee<span class="fas fa-calendar-plus"></span></a> </div>
                            </div>
                           
                        
 </div>
 

<form  action="" id="validationform" data-parsley-validate="" novalidate="">






                   
<?php
$username=$_SESSION['username'];
$user_id=$_SESSION['user_id'];
 $farms=$execute->select("farms","where owner='$username'");
 if($farms==true){
  
        


    

 foreach($farms as $farm){
    $result = "farm".$farm['id'];
    $id=$farm['id'];


    $cardname=str_replace(' ', '',$result);

            
             
                
                    echo    "
                    <script type='text/javascript' language='javascript'>
                    function ".$cardname."() {
                        var ele = document.getElementById(".$farm['id'].");
                        if(ele.style.display == 'block') {
                                ele.style.display = 'none';
                          }
                        else {
                            ele.style.display = 'block';
                        }
                    }

                    </script>";
                  
                    echo"
                            <div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                <div class='card-body'>
                                    <div class='d-inline-block'>
                                       
                                        <h2 class='mb-0'>". strtoupper($farm['name'])."</h2>
                                    </div>
                                    <div class='float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1'>
                                        <i class='fa fa-eye fa-fw fa-sm text-info'></i>
                                    </div>
                                    
                                    <div id='".$farm['id']."' style='display:none;'>
                                    <table class='table table-hover'>
                                    <thead>
                                        <tr>


                                        <th scope='col'>Crop</th>
                                            <th scope='col'>Duration(weeks)</th>
                                            <th scope='col'>Activities</th>
                                            <th scope='col'>Progress</th>
                                            <th scope='col'>Ending</th>
                                            <th scope='col'>View</th>
                                        
                                        </tr>
                                    </thead>
                        
                                    <tbody>";
                                
                                        $farm_calendars=$execute->select("farmer_calendars","where user_name='$username' && farm_id='$id'");
                                        if($farm_calendars==true){
                                        
                                
                                            foreach($farm_calendars as $calendar){  
                                                $calendar_id=$calendar['calendar_id'];
                                                $calendar_end_date=$calendar['calendar_end_date'];
                                            $task=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                                            $task_completed=$execute->conditionSelect("count(id) as task","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && farm_id='$id' && calendar_end_date='$calendar_end_date'");
                                            $complted=$task_completed[0]['task'];
                                            $total_tasks=$task[0]['task'];
                                        
                                            $progrees=($complted*100)/$total_tasks;
                                    echo"
                                    
                                   
                                   
                                           
                                            <tr>
                                            <th scope='col'>".$calendar['calendar_name']."</th>
                                            <th scope='col'>".$task[0]['task']."</th>
                                            <th scope='col'>".$calendar['calendar_name']."</th>
                                            
                                            <th class='border-0'><div class='progress'>
                                            <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='".$progrees."' aria-valuemin='0' aria-valuemax='100' style='width:".$progrees."%'></div>

                                        </div>".$progrees." % Completed</th>
                                            <th scope='col'>".$calendar['calendar_end_date']."</th>
                                            <th  class='btn btn-outline-danger' scope='col'><div><a href='view_calendar.php'><span class='fas fa-eye'></span></a>
                                            <a href='?delete=".$calendar['id']."'><span class='fas fa-trash-alt'></span></a>
                                            </div></th>
                                                </tr>
                                          
                                             
                                      

                                 ";}
                                }else{

                                    echo    "
                                    
                                                            <tr>
                                                            Empty
                                                                <tr>
                                                          
                                                             
                                                            
                                                        </tbody>
                                                    </table>
                
                                                 
                                                   
                                                
                                                
                                            ";
                                    }
                                
                                   
                                
                                    echo "
                                          
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            ";
                     
                                //my last inser else
                            //Firs foreach
                         }
                            }
                            
 else{
    echo   "
    <div class='card' value='Show-Hide' onclick='return showHide();'>
                               <div class='card-body'>
                                   <div class='d-inline-block'>
                                      
                                       <h2 class='mb-0'>No Farms Recorded</h2>
                                   </div>
                                   <div class='float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1'>
                                       <i class='fa fa-eye fa-fw fa-sm text-info'></i>
                                   </div>
                                   <div id='showHideDiv' style='display:none;'>
                                   <a href='#'>add new </a>
                               
                               </div>
                               </div>
                           </div>";

 }
                            ?>
                     

<!-- <p><input type="button" value="Show-Hide" onclick="return showHide();" /></p> -->



                        </div>

                                         <!-- <button type="submit" class="btn btn-danger btn-lg btn-block" name="create">CREATE</button> -->
                                     </form>
    </div>
                                     <?php
            
}else{
    header('Location:index.php');
}
?>