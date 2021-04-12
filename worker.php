<?php
include 'classes/DbFunctions.php';
include 'includes/header.inc';
include 'includes/navbar.inc';
include 'includes/sidemenu.php';
$execute=new dbFunction();
if(isset($_SESSION['username'])){
$user_id=$_SESSION['user_id'];

if(isset($_GET['mark_as_read'])){
    extract($_GET);
    // $query="UPDATE ".$table." ".$setColumnValue."WHERE".$condition.";";
    $update_complete_status=$execute->update("activity_assigned","SET status='1'"," id='".$mark_as_read."'");

    if($update_complete_status==true){
        header('Location:worker.php');
        echo "<script>window.alert('success')</script>";
        unset($_POST['mark_as_read']);
        // mysqli_close($execute);
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

                           
                          $task_assigned=$execute->conditionSelect("count(id) as task","activity_assigned where user_id='$user_id'");
                          if($task_assigned==true){
                          
                          ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Due This Week</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php
                                             foreach($task_assigned as $task){
                                               echo "    ".$task['task'];
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
                            $completed=$execute->conditionSelect("count(id) as task","activity_assigned where user_id='$user_id' && status='1'");
                          if($completed==true){
                            ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Completed</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php foreach($completed as $completed_task){
                                               echo "    ".$completed_task['task'];}}?></h1>
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
                                        <h5 class="text-muted">Pending</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php
                                           $pending_tasks=$execute->conditionSelect("count(id) as task","activity_assigned where user_id='$user_id' && status='0'");
                          if($pending_tasks==true){
                            foreach($pending_tasks as $pending){
                                echo "    ".$pending['task'];}}

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
                                        <h5 class="text-muted">Income</h5>
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
                                    <h5 class="card-header">Active Task</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Status</th>
                                                        <th class="border-0">Progress</th>
                                                        <th class="border-0">Mark as Done</th>
                                                        
                                                        <!-- <th class="border-0">Customer</th>
                                                        <th class="border-0">Status</th> -->
                                                    </tr>
                                                    
                                                        <?php
                                                        $username=$_SESSION['username'];
                                                        $user_id=$_SESSION['user_id'];
                                                        
                                                        $activities=$execute->select("activity_assigned","where user_id='$user_id'  && status='0'");
                                                        if($activities==true){
                                                            foreach($activities as $activity){
                                                               
                                                                
                                                                $activity_details=$execute->select("activity","where id='".$activity['activity_id']."'");
                                                                $crop=$execute->select("farm_calendars","where id='$calendar_id'");
                                                                

                                                                // $task=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                                                                // $task_completed=$execute->conditionSelect("count(task_id) as task","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && farm_id='$farm_id' && completed='1'");
                                                                // $complted=$task_completed[0]['task'];
                                                                // $total_tasks=$task[0]['task'];
                                                            
                                                                // $progrees=($complted*100)/$total_tasks;
                                                                
                                                                // $calendar_id=$calendar['calendar_id'];
                                                                // $count_task=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                                                                // $count_completed_task=$execute->conditionSelect("count(task_id) as tasks","task_completion where calendar_id='$calendar_id' && user_id='$user_id' && id='$farm_id'");
                                                                // percentage far fa-star-half far fa-star
                                                                // $progrees=($count_task[0]['task']*$count_completed_task[0]['tasks'])/100;
                                                               if($activity['status']==1){
                                                                   $status="far fa-star";

                                                               }else{
                                                                    $status="far fa-star-half";
                                                               }
                                                                echo"
                                                                <tr  class='border-0'>
                                                        <th class='border-0'>".$activity['id']."</th>
                                                        <th class='border-0'>".$activity_details[0]['activity']."</th>
                                                        
                                                        <th class='border-0'>".$activity['status']."</th>
                                                       
                                                        <th  class='border-0  btn-danger' ><a href='?mark_as_read=".$activity['id']."' class='".$status."'>Mark as Done</a></th>
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
                        }else{
                            header('Location:index.php');
                        }
?>
