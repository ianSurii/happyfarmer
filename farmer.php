<?php
include 'classes/DbFunctions.php';
include 'includes/header.inc';
include 'includes/navbar.inc';
include 'includes/sidemenu.php';
$execute=new dbFunction();

$user_id=$_SESSION['user_id'];

if(isset($_POST['assign'])){
    extract($_POST);
    $check=$execute->select("activity_assigned","where activity_id='$activity_id' && user_id='$to' && calendar_id='$calendar_id' && status='0' &&task_id='$task_id'");

if($check==false){
    $column="activity_id,status,user_id,calendar_id,task_id";

    $values="$activity_id,'0','$to','$calendar_id','$task_id'";

    $assigning=$execute->insert("activity_assigned",$column,$values);
    $send_message=$execute->insert("messages","to,from,message,read_status","'$to','$user_id','You have been assigned a new task','0'");
    if($assigning==true){
        header('Location:farmer.php');
        echo "<script>window.alert('success')</script>";
        unset($_POST['assign']);
        // mysqli_close($execute);
    }
}else{
    haader('Location:farmer.php');
}

}
?>
<div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                            <h2 class="pageheader-title">Happy Farmer </h2>
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                   
                        <div class="row">
                           
                        </div>
                        <div class="row">
                            
                            <div class="col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12">
                               
                            </div>
                        </div>

                        <div class="row">
                            <?php
                           
                          $select_crops=$execute->conditionSelect("count(employee_id) as employees","employees where employer='$user_id'");
                          if($select_crops==true){
                          
                          ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Employees</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php foreach($select_crops as $crops){
                                               echo "    ".$crops['employees'];
                                               }}
                                          
                                               ?>
                                                </h1>
                                        </div>
                                        </br>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end sales  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <?php
                            $calendars=$execute->conditionSelect("count(calendar_name) as count_calendar","farm_calendars");
                          if($calendars==true){
                            ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">New Customer</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php foreach($calendars as $calendar){
                                               echo "    ".$calendar['count_calendar'];}}?></h1>
                                        </div>
                                        <br>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end new customer  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- visitor  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Farms</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php
                                            $select_crops=$execute->conditionSelect("count(employee_id) as employees","employees where employer='$user_id'");
                          if($select_crops==true){
                            foreach($calendars as $calendar){
                                echo "    ".$calendar['count_calendar'];}}

                              ?></h1>

                              <br>
                              </br> 
                                        </div>
                                       
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end visitor  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Users</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">1340</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                            <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>
                        
                            
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Active Calendars</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Name</th>
                                                        <th class="border-0">Crop</th>
                                                        <th class="border-0">Farm</th>
                                                        <th class="border-0">Status</th>
                                                        <th class="border-0">Progress</th>
                                                        <th class="border-0">Start</th>
                                                        <th class="border-0">End</th>
                                                        <th class="border-0">View</th>
                                                        <!-- <th class="border-0">Customer</th>
                                                        <th class="border-0">Status</th> -->
                                                    </tr>
                                                    
                                                        <?php
                                                        $username=$_SESSION['username'];
                                                        
                                                        $calendars=$execute->select("farmer_calendars","where user_name='$username' && calendar_end_date>CURRENT_DATE && status='1'");
                                                        if($calendars==true){
                                                            foreach($calendars as $calendar){
                                                               
                                                                $calendar_end_date=$calendar['calendar_end_date'];
                                                                $calendar_id=$calendar['calendar_id'];
                                                                $farm_id=$calendar['farm_id'];
                                                                $farm=$execute->select("farms","where id='$farm_id'");
                                                                $crop=$execute->select("farm_calendars","where id='$calendar_id'");
                                                                $value=$calendar['status'];
                                                                $user_id=$_SESSION['user_id'];

                                                                $task=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                                                                $task_completed=$execute->conditionSelect("count(task_id) as task","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && farm_id='$farm_id' && completed='1'");
                                                                $complted=$task_completed[0]['task'];
                                                                $total_tasks=$task[0]['task'];
                                                            
                                                                $progrees=($complted*100)/$total_tasks;
                                                                
                                                                // $calendar_id=$calendar['calendar_id'];
                                                                // $count_task=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                                                                // $count_completed_task=$execute->conditionSelect("count(task_id) as tasks","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && id='$farm_id'");
                                                                // percentage
                                                                // $progrees=($count_task[0]['task']*$count_completed_task[0]['tasks'])/100;
                                                                if($value==1){
                                                                    $status=" <span class='mr-2'> <span class='badge-dot badge-success'></span></span>";
                                                                }else{
                                                                    $status=" <span class='mr-2'> <span class='badge-dot badge-danger'></span></span>";
                                                                }
                                                                echo"
                                                                <tr  class='border-0'>
                                                        <th class='border-0'>".$calendar['calendar_name']."</th>
                                                        <th class='border-0'>".$crop[0]['crop']."</th>
                                                        <th class='border-0'>".$farm[0]['name']."</th>
                                                        <th class='border-0'>".$status."</th>
                                                        <th class='border-0'><div class='progress'>
                                                        <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='".ceil($progrees)."' aria-valuemin='0' aria-valuemax='100' style='width:".ceil($progrees)."%'></div>
                                                    </div>
                                                    ".ceil($progrees)."% Completed</th>
                                                        <th class='border-0'>".$calendar['calendar_start_date']."</th>
                                                        <th class='border-0'>".$calendar['calendar_end_date']." </th>
                                                        <th  class='btn btn-outline-danger' scope='col'><div><a href='view_calendar.php'><span class='fas fa-eye'></span></a></div></th>
                                                    </tr>";
                                                            }}
                                                            ?>
                                                </thead>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

<?php
$user_id=$_SESSION['user_id'];

$count_task_due_this_week=$execute->conditionSelect('count(task_id) as task'," task_completion where user_id='$user_id'
&& `date`<=CURRENT_DATE && calendar_end_date>=CURRENT_DATE && completed=0 && calendar_end_date>CURRENT_DATE");
if($count_task_due_this_week==true){


                           echo"<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                           
                           <h3 class='bg-success    '>TOTAL TASK DUE THIS WEEK ".$count_task_due_this_week[0]['task']."</h3>
                           </div>";
}else{
    echo"<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                           
    <h3 class='bg-success    '>NOTHING IS FUE THIS WEEK </h3>
    </div>";
}
                            ?>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Activities</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                           
                                                    
                                                        <?php
                                                        $username=$_SESSION['username'];
                                                        
                                                        $calendars=$execute->select("farmer_calendars","where user_name='$username' && calendar_end_date>CURRENT_DATE && status=1");
                                                        if($calendars==true){
                                                            foreach($calendars as $calendar){
                                                               
                                                                $calendar_end_date=$calendar['calendar_end_date'];
                                                                $calendar_id=$calendar['calendar_id'];
                                                                $calendar_tb_id=$calendar['id'];
                                                                $calendar_start_date=$calendar['calendar_start_date'];
                                                                $farm_id=$calendar['farm_id'];
                                                                $all_tasks=$execute->select("task","where calendar_id='$calendar_id'");
                                                                    if($all_tasks==true){
                                                                foreach($all_tasks as $task){
                                                                    $task_id=$task['id'] ;
                                                                    
                                                                    $currentDateTime = date('Y-m-d');
                                                                    // $active_week=ceil($currentDateTime-$calendar_start_date);
                                                                    $tasks_due=$execute->select("task_completion","where task_id='$task_id' && calendar_id='$calendar_id' && `date`<=CURRENT_DATE && calendar_end_date>=CURRENT_DATE && completed=0");

                                                                    if($tasks_due==true){
                                                                        foreach($tasks_due as $task_due){
                                                                            $cardname="my".$task_due['task_id'];
                                                                            $task_tb_id=$task_due['id'];

                                                                 echo"  

                                                                 
                                                                 
                                                                 <script type='text/javascript' language='javascript'>
                                                                    function ".$cardname."() {
                                                                        var ele = document.getElementById(".$task_due['id'].");
                                                                        if(ele.style.display == 'none') {
                                                                                ele.style.display = 'block';
                                                                        }
                                                                       
                                                                    }

                                                                    </script>";
                                                                    $count_task_activities=$execute->conditionSelect("count(id) as activity","activity where task_id='$task_id'");
                                                                                $count_task_ativities_completed=$execute->conditionSelect("count(activity_id) as activity","activity_assigned where task_id='$task_id' && status='1'");
                                                                                $pc_done=$count_task_ativities_completed[0]['activity'];
                                                                                $all=$count_task_activities[0]['activity'];
                                                                                $task_progress=($pc_done*100)/$all;
                                                                                if($task_progress==100){
                                                                                    $update_task_status=$execute->update("task_completion","SET completed='1'"," task_id='$task_id' && id='$task_tb_id'");
                                                                                    // updateformat SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'WHERE CustomerID = 1;
                                                                                    // $query="UPDATE ".$table." ".$setColumnValue."WHERE".$condition.";";
                                                                                    if($update_task_status==true){
                                                                                        echo "<script>window.alert('TASK COMPLETED')</script>";

                                                                                    }
                                                                                }

                                                                    echo"<div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                                                    <div class='card-body'>
                                                                        <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                                                                           
                                                                            <h2 class='mb-0'>Due:". strtoupper($task_due['calendar_end_date'])."</h2>
                                                                            <div class='progress'>
                                                                            
                                                                            <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='".trim($task_progress)."' aria-valuemin='0' aria-valuemax='100%' style='width:".$task_progress."%'>  ".$task_progress."% Completed</div>
                                                              
                                                            </div>
                                                                        </div>
                                                                        <div class='float-right icon-circle-medium  icon-box-md  bg-danger-light mt-1'>
                                                                            <i class='fa fa-eye fa-fw '></i>
                                                                        </div>
                                                                        <div id='".$task_due['id']."' style='display:none;'>";

                                                        
                                                                        
                                                                       echo" <table class='table'>
                                                                 <thead class='bg-light'>
                                                                     <tr class='border-0'>
                                                                         <th class='border-0'>Activity</th>
                                                                         <th class='border-0'>Crop</th>
                                                                         <th class='border-0'>Farm</th>
                                                                         <th class='border-0'>Status</th>
                                                                         <th class='border-0'>Progress</th>
                                                                         <th class='border-0'>Start</th>
                                                                         
                                                                     </tr>
                                                                     </th>";
                                                                     $select_activities=$execute->select("activity","where task_id=".$task_due['task_id']."");
                                                                     if($select_activities==true){
                                                                         foreach($select_activities as $activity){
                                                                             $select_farm_name=$execute->select("farms","where id='$farm_id'");
                                                                             $select_crop=$execute->select('farm_calendars',"where id='$calendar_id'");
                                                                             $assign_status=$execute->select('activity_assigned',"where activity_id='".$activity['id']."' && calendar_id='$calendar_tb_id' && task_id='".$task_due['task_id']."'");
                                                                            //  if($select_farm_name==true){
                                                                                $user_id=$_SESSION['user_id'];
                                                                                $select_employees=$execute->select("employees","where employer='$user_id' && id='$farm_id' ");
                                                                               
                                                                                if( count($assign_status)==0){
                                                                                    foreach($select_employees as $employee){
                                                                                        $select_emp_details=$execute->conditionSelect("first_name,last_name","user_records where id='".$employee['employee_id']."'");

                                                                                $activity_completion_status="0" ;
                                                                                $assigned="<form method='post' action=''>
                                                                                <input type='text' hidden='hidden' name='activity_id' value='".$activity['id']."'>
                                                                                <input type='text' hidden='hidden' name='task_id'value='".$task_id."'>
                                                                                <input type='text' hidden='hidden' name='calendar_id' value='".$calendar_tb_id."'>
                                                                                             <select type='text' name='to'>
                                                                                                <option value=".$employee['employee_id'].">".$select_emp_details[0]['first_name']." ".$select_emp_details[0]['last_name']."</option>
                                                                                              </select>
                                                                                            <button class='badge badge-danger' type='submit' name='assign'>Asign</button>
                                                                                             </form>   
                                                                                          
                                                                                                 
                                                                                ";}                                                                                ;
                                                                                }else{
                                                                                   
                                                                                    $assigned_to=$assign_status[0]['user_id'];
                                                                                    $select_employee_name=$execute->conditionSelect("first_name,last_name","user_records where id='$assigned_to'");
                                                                                    $assigned=$select_employee_name[0]['first_name']." ".$select_employee_name[0]['last_name'];
                                                                                    if($assign_status[0]['status']==1){
                                                                                        $activity_completion_status="100";
                                                                                    }else{
                                                                                        $activity_completion_status="0";
                                                                                    }
                                                                                }
                                                                                

                                                                                                                
                                                                     echo"
                                                            <tr  class='border-0'>
                                                                <th class='border-0'>".$activity['activity']."</th>
                                                                <th class='border-0'>".$select_crop[0]['crop']."</th>
                                                                <th class='border-0'>".$select_farm_name[0]['name']."</th>
                                                                <th class='border-0'>".$assigned."</th>
                                                                <th class='border-0'><div class='progress'>
                                                                    <div clas='progress'        
                                                                <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='".$activity_completion_status."' aria-valuemin='0' aria-valuemax='100' style='width:".$activity_completion_status."%'>".$activity_completion_status."% Completed</div>
                                                                
                                                            </div> </th>
                                                                <th  class='btn btn-outline-danger' scope='col'><div><a href='view_calendar.php'><span class='fas fa-eye'></span></a></div></th>
                                                            </tr>";
                                                                //    } //farm name
                                                                  }}else{
                                                                        echo"
                                                                        <tr  class='border-0'>
                                                                            No Activities for this specifi task
                                                                             </tr>";

                                                                     }
                                                            echo"
                                                            </thead>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                                            </div>
                                                           
                                                      
                                                            ";
                                                        }
                                                                        }

                                                                    }
                                                                }

                                                                // $crop=$execute->select("farm_calendars","where id='$calendar_id'");
                                                                // $value=$calendar['status'];
                                                                // $user_id=$_SESSION['user_id'];

                                                                // $task=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                                                                // $task_completed=$execute->conditionSelect("count(id) as task","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && farm_id='$farm_id' && calendar_end_date='$calendar_end_date'");
                                                                // $complted=$task_completed[0]['task'];
                                                                // $total_tasks=$task[0]['task'];
                                                            
                                                                // $progrees=($complted*100)/$total_tasks;
                                                                
                                                                
                                                                // // $count_task=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                                                                // // $count_completed_task=$execute->conditionSelect("count(task_id) as tasks","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && id='$farm_id'");
                                                                // // percentage
                                                                // // $progrees=($count_task[0]['task']*$count_completed_task[0]['tasks'])/100;
                                                                // if($value==1){
                                                                //     $status=" <span class='mr-2'> <span class='badge-dot badge-success'></span></span>";
                                                                // }else{
                                                                //     $status=" <span class='mr-2'> <span class='badge-dot badge-danger'></span></span>";
                                                                // }
                                                              
                                                            }
                                                        }else{
                                                            
                                                        }
                                                            ?>
                                                
                            </div>
                        </div>
                    </div>
                    <script>
                       let popupParent = document.querySelector(".popup-parent");
                        let btn = document.getElementById("btn");
                        let btnClose = document.querySelector(".close");
                        let mainSection = document.querySelector(".mainSection");


                        btn.addEventListener("click", showPopup);
                            function showPopup() {
                                popupParent.style.display = "block";
                            }

                        btnClose.addEventListener("click", closePopup);
                            function closePopup() {
                                popupParent.style.display = "none";
                            }
                        popupParent.addEventListener("click", closeOutPopup);
                            function closeOutPopup(o) {
                                if(o.target.className == "popup-parent"){
                                    popupParent.style.display = "none";
                                }
                            }
 
                    </script>
              
                 
<?php
include 'includes/footer.php';
?>
