<?php


include('classes/DbFunctions.php');

// require 'includes/header.inc';
// include 'includes/navbar.inc';
// include 'includes/sidemenu.php';


$execute=new dbFunction();

if(isset($_POST['add_to_farm'])){
    extract($_POST);
                $data = $execute->select("farm_calendars","where id='$calendar_id'");
                    if(count($data)==0){
                       
                    }else{
                    
                        $calendar_period=$data[0]['period'];
                        $username=$_SESSION['username'];
                        $days=$calendar_period;
                        $table="farmer_calendars";
                        $end_date=date('Y-m-d', strtotime($start_date.'+'.$days)); 
                        $date=date_create($start_date);
                       date_add($date,date_interval_create_from_date_string($calendar_period."days"));
                       $end_date=date_format($date,"Y-m-d");
                        $column="calendar_id,calendar_name,calendar_start_date,calendar_end_date,status,farm_id,user_name";
                        $values="'$calendar_id','$calendar_name','$start_date','$end_date','1','$farm','$username'";
                        $addToFarm=$execute->insert($table,$column,$values);
                        if($addToFarm==true){
                            $all_tasks=$execute->select("task","where calendar_id='$calendar_id'");
                            if($all_tasks==true){
                           foreach ($all_tasks as $task) {
                            $user_id=$_SESSION['user_id'];
                            $task_id=$task['id'];
                            $week=$task['week'];
                            $days=($week*7)-1;
                            $current_date = date("Y-m-d"); //existing date
                            $task_deadline=date('Y-m-d', strtotime($start_date .'+'.$days.'days'));
                            // echo date('Y-m-d', strtotime($date .'+1 day'));
                            $task_start_date=date("Y-m-d",strtotime($task_deadline."-6 days"));
                               $table="task_completion";
                            //    date is for start date ,which is 
                               $column="calendar_id,task_id,user_id,completed,date,calendar_end_date,farm_id";
                               $values="'$calendar_id','$task_id','$user_id','0','$task_start_date','$task_deadline','$farm'";

                            $insert_farm_task=$execute->insert($table,$column,$values);
                           }
                            
                           }else{
                            echo "<script>window.alert('Failed TERRIBLY')</script>";
                               
                           }
                           
                            
                        }

                        
                        
                    }


   
                // echo "<script>window.alert('fill details".$_POST['add_to_farm'].")</script>";
          


}else{

}

   if(isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
  

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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Farms</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Add</li>
                                            <li class="breadcrumb-item active" aria-current="page">Crop Calendar</li>
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-warning" href='farms.php'>Go Back <span class="fas fa-undo"></span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
<p>
<div class="form-row">
                                             
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">To</label>
                                                 <select type="text" class="form-control" required="" name="farm" id="validationCustom04">
                                                     <?php
                                                     $username=$_SESSION['username'];
                                                     $farms=$execute->conditionSelect('name,id',"farms where owner='$username'");
                                                     if($farms==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($farms as $farm){
                                                         echo"<option value=".$farm['id']." >".$farm['name']."</option>";
                                                     }}
                                                     else{
                                                        echo"<option value='' selected='selected'>No crops Available</option>";
                                                     }

                                                     ?>
                                                     
                                       
                                                     </select>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Email.
                                                 </div>
                                                 
                                             </div>
                                            
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Messge</label>
                                                 <input type="text" class="form-control" required="" name="calendar_name" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                            
                                             
                                             
                                            
                                             
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="add_to_farm">SEND</button>
                                     </form>
    </div>
                                     <?php
 
}else{
    header('Location:index.php');
}
?>
  <script src="assets/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/assets/js/jquery.bootstrap.js" type="text/javascript">
</script>

<!--  Plugin for the Wizard -->
<script src="assets/assets/js/material-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="assets/assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $("#c_code").change(function () {
        $("#calendar_id").load('choice.php?tag=const&id=' + $(this).val());
    });
    
    $("#calendar_id").change(function () {
        $("#period").load('choice.php?tag=cal&idc=' + $(this).val());
    });
</script>