<?php
include 'classes/DbFunctions.php';
include 'includes/header.inc';
include 'includes/navbar.inc';
include 'includes/sidemenu.php';
$execute=new dbFunction();

$user_id=$_SESSION['user_id'];

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
                                                                $task_completed=$execute->conditionSelect("count(task_id) as task","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && farm_id='$farm_id' && calendar_end_date='$calendar_end_date' && completed='1'");
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
                                                        <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='".$progrees."' aria-valuemin='0' aria-valuemax='100' style='width:'".$progrees."%'></div>
                                                    </div>
                                                    ".$progrees."% Completed</th>
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



                            <h1>Activities Due this Week</h1>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Activities</h5>
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
                                                        
                                                        $calendars=$execute->select("farmer_calendars","where user_name='$username' && calendar_end_date>CURRENT_DATE && status=1");
                                                        if($calendars==true){
                                                            foreach($calendars as $calendar){
                                                               
                                                                $calendar_end_date=$calendar['calendar_end_date'];
                                                                $calendar_id=$calendar['calendar_id'];
                                                                $calendar_start_date=$calendar['calendar_start_date'];
                                                                // $farm_id=$calendar['farm_id'];
                                                                $all_tasks=$execute->select("task","where calendar_id='$calendar_id'");
                                                                    if($all_tasks==true){
                                                                foreach($all_tasks as $task){
                                                                    $task_id=$task['id'] ;
                                                                    
                                                                    $currentDateTime = date('Y-m-d');
                                                                    // $active_week=ceil($currentDateTime-$calendar_start_date);
                                                                    $tasks_due=$execute->select("task_completion","where task_id='$task_id' && calendar_id='$calendar_id' && `date`<=CURRENT_DATE && calendar_end_date>=CURRENT_DATE && completed=0");

                                                                    if($tasks_due==true){
                                                                        foreach($tasks_due as $task_due){
                                                                        echo"
                                                                        <tr  class='border-0'>
                                                                <th class='border-0'>".$task_due['calendar_id']."</th>
                                                                <th class='border-0'>".$task_due['task_id']."</th>
                                                                <th class='border-0'>".$task['week']."</th>
                                                                <th class='border-0'>".$task_due['calendar_end_date']."</th>
                                                                <th class='border-0'><div class='progress'>
                                                                <div class='progress-bar progress-bar-striped progress-bar-animated' role='progressbar' aria-valuenow='70' aria-valuemin='0' aria-valuemax='100' style='width:70'></div>
                                                            </div>
                                                            10% Completed</th>
                                                                <th class='border-0'>".$task['week']."</th>
                                                                <th class='border-0'>".$task['week']." </th>
                                                                <th  class='btn btn-outline-danger' scope='col'><div><a href='view_calendar.php'><span class='fas fa-eye'></span></a></div></th>
                                                            </tr>";}
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
                                                </thead>
                                                <tbody>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
                 
<?php
include 'includes/footer.php';
?>
