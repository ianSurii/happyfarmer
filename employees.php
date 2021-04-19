<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();
if(isset($_GET['delete'])){
    extract($_GET);
    $delete_user=$execute->delete("user_records","where id='$delete'");
    $delete_employee=$execute->delete("employees","where employee_id='$delete'");
    if($delete_employee && $delete_user==true){
        header('Location:employees.php');
    }

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
                        <h2 class="pageheader-title"><image src="assets/images/icon.png"  width="60px" height="50px">Happy Farmer </h2>                                <div class="page-breadcrumb">
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
                                <div class="myDIV">
                                <a class="badge badge-secondary" href='new_employees.php'>Add Employee<span class="fas fa-calendar-plus"></span></a> </div>
                            </div>
                           
                        
 </div>
 

<form  action="" id="validationform" data-parsley-validate="" novalidate="">






                   
<?php
// $username=$_SESSION['username'];
$user_id=$_SESSION['user_id'];
 $employees=$execute->select("employees","where employer='$user_id'");
 if($employees==true){
  
        
  
    

 foreach($employees as $employee){
    $result = "employee".$employee['id'];
    $id=$employee['employee_id'];
    $select_farm=$execute->select("farms"," where id='".$employee['farms']."'");
    $count_emp_activities=$execute->conditionSelect("count(id) as id","activity_assigned where user_id='$id'");




    $cardname=str_replace(' ', '',$result);

            
                $employee_details=$execute->select("user_records","where id='$id'");
              
                
                    echo    "
                    <script type='text/javascript' language='javascript'>
                    function ".$cardname."() {
                        var ele = document.getElementById(".$employee['id'].");
                        if(ele.style.display == 'block') {
                                ele.style.display = 'none';
                          }
                        else {
                            ele.style.display = 'block';
                        }
                    }

                    </script>";
                    if($employee_details==true){
                        // // if($active_calendars==true){
            
                        foreach($employee_details as $details){  
                    echo"
                            <div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                <div class='card-body'>
                                    <div class='d-inline-block'>
                                       
                                        <h2 class='mb-0'>". strtoupper($details['first_name']." ".$details['last_name'])."</h2>
                                    </div>
                                    <div class='float-right  '>
                                    <a href='edit_employee.php?edit=$id'><span class ='icon-circle-medium fas fa-pencil-alt'></span>
                                        <a href='?delete=$id'><span class ='icon-circle-medium fas fa-trash-alt'></span>
                                        <i class='fa fa-eye text-info'></i>
                                    </div>
                                    
                                    <div id='".$employee['id']."' style='display:none;'>";
                                    // $active_calendars=$execute->conditionSelect("distinct(farm_id) as farm_id,calendar_id,calendar_end_date,calendar_name","farmer_calendars where user_name='$username' && calendar_end_date>CURRENT_DATE && farm_id='$id' && status='1'");
                                  
                                      
                                        // $calendar_id=$active_calendar['calendar_id'];
                                        // $tasks=$execute->conditionSelect("count(id) as task ","task where calendar_id='$calendar_id'");
                                        // $data=array();
                                        // $all_task=$execute->conditionSelect("id as id","task where calendar_id='$calendar_id'");
                                        // foreach($all_task as $task_id){

                                        //     $activities=$execute->conditionSelect("activity","activity where task_id='".$task_id['id']."'");
                                        //     $data+=$activities;
                                        // }
                                      

                                    echo"
                                    
                                   
                                    <table class='table table-hover'>
                                        <thead>
                                            <tr>


                                            <th scope='col'>Name</th>
                                            <th scope='col'>Farm</th>
                                            <th scope='col'>Mobile</th>
                                            <th scope='col'>Activities</th>
                                            <th scope='col'>Email</th>
                                            
                                            </tr>
                                        </thead>
                            
                                        <tbody>
                                           
                                            <tr>
                                            <th scope='col'>".$details['first_name'].$details['last_name']."</th>
                                            <th scope='col'>".$select_farm[0]['name']."</th>
                                            <th scope='col'>".$details['phone_number']."</th>
                                            <th scope='col'>".$count_emp_activities[0]['id']."</th>
                                            <th scope='col'>".$details['email']."</th>
                                                </tr>
                                          
                                             
                                            
                                        </tbody>
                                    </table>

                                 
                                   
                                
                                </div>
                                </div>
                            </div>
                            ";}
                        }else{

                                echo    "
                                
                                                <table class='table table-hover'>
                                                    <thead>
                                                        <tr>
            
            
                                                         
                                                            <th scope='col'>Crop</th>
                                                            <th scope='col'>Task</th>
                                                            <th scope='col'>Activities</th>
                                                            <th scope='col'>Progress</th>
                                                            <th scope='col'>Ending</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        <tr>
                                                        Empty
                                                            <tr>
                                                      
                                                         
                                                        
                                                    </tbody>
                                                </table>
            
                                             
                                               
                                            
                                            </div>
                                            </div>
                                        </div>
                                        ";
                                } }}
                                
                            
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
                     





                                         <!-- <button type="submit" class="btn btn-danger btn-lg btn-block" name="create">CREATE</button> -->
                                     </form>
 
                                     <?php
                                     include 'includes/footer.php';
            
}else{
    header('Location:index.php');
}
?>