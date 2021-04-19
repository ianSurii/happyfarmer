<?php
include 'classes/DbFunctions.php';
include 'includes/header.inc';
include 'includes/navbar.inc';
include 'includes/sidemenu.php';
$execute=new dbFunction();
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
                            <h2 class="pageheader-title"><image src="assets/images/icon.png"  width="60px" height="50px">Happy Farmer </h2>                                 
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
                          $select_crops=$execute->conditionSelect("count(crop_name) as crops_count","crops");
                          if($select_crops==true){
                          
                          ?>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card border-3 border-top border-top-primary">
                                    <div class="card-body">
                                        <h5 class="text-muted">Crops</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php foreach($select_crops as $crops){
                                               echo "    ".$crops['crops_count'];}}?>
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
                                        <h5 class="text-muted">Farming Calendars</h5>
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
                                        <h5 class="text-muted">Active Farms</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php 
                                              $count_farms=$execute->conditionSelect("count(id) as farms","farms");
                                              if($count_farms==true){
                                            foreach($count_farms as $farm){
                                               echo "    ".$farm['farms'];}}?>
                                            
                                            </h1>
                                            <br>
                                            <br>
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
                                        <h5 class="text-muted">Active Farmers</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">
                                            <?php 
                                              $count_farmers=$execute->conditionSelect("count(id) as farmers","user_records where user_type=11");
                                              if($count_farmers==true){
                                            foreach($count_farmers as $farmers){
                                               echo "    ".$farmers['farmers'];}}?>
                                            
                                            </h1>
                                            <br>
                                            <br>
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
                                    <h5 class="card-header">Recent Calendars</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                <tr class='border-0'>
                                                        <th class='border-0'>#</th>
                                                        <th class='border-0'>Name</th>
                                                        <th class='border-0'>Crop</th>
                                                        <th class='border-0'>Variety</th>
                                                        <th class='border-0'>Period</th>
                                                        <th class='border-0'>Region#1</th>
                                                        <th class='border-0'>Region#2</th>
                                                        <th class='border-0'>Region#3</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $select_calendars=$execute->selectAll('farm_calendars');
                                                if($select_calendars==true){
                                                foreach($select_calendars as $calendar){
                                                
                                                    echo"
                                                <tr class='border-0'>
                                                        <th class='border-0'>".$calendar['id']."</th>
                                                        <th class='border-0'>".$calendar['calendar_name']."</th>
                                                        <th class='border-0'>".$calendar['crop']."</th>
                                                        <th class='border-0'>".$calendar['variety']."</th>
                                                        <th class='border-0'>".$calendar['period']."</th>
                                                        <th class='border-0'>".$calendar['region1']."</th>
                                                        <th class='border-0'>".$calendar['region2']."</th>
                                                        <th class='border-0'>".$calendar['region3']."</th>
                                                       
                                                    </tr>";
                                                }
                                                   }else{}
                                                   ?>
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
