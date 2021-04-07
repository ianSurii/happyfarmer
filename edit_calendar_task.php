<?php
include('classes/DbFunctions.php');
require 'includes/header.inc';
require 'includes/navbar.inc';
include 'includes/sidemenu.php';



$execute=new dbFunction();

if(isset($_GET['activity_id'])){
    extract($_GET);
    $delete=$execute->delete("activity","where id='$activity_id'");
    header('Location:view_calendars.phps');
  
}
   

   if(isset($_SESSION['username'])) {
  $username=$_SESSION['username'];
  

        
        if(isset($_GET['task_id'])){
            extract($_GET);
            $editor=$_SESSION['username'];
            
            $select_task=$execute->select("task","where id='$task_id'");
       
            if(isset($_POST['post_activity'])){
                extract($_POST);
                $table="activity";
                $column="task_id,activity,estimated_time";
                $values="'$task_id','$activity','$time'";
                $insert_activity=$execute->insert($table,$column,$values);
                if($insert_activity==true){
                    echo "<script>window.alert('activity added')</script>";
                }
            }else{
            
            }
?>
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content ">
<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="pageheader-title">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Calendars</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Task</li>
                                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<div class="card col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
                               
                
                                   <table class="table table-hover">
                                       <thead>
                                           <tr>

<!-- Full texts 	calendar_id	task_title	week	id -->
                                               <th scope="col">#</th>
                                               <th scope="col">Calendar</th>
                                               <th scope="col">Title</th>
                                               <th scope="col">Week</th>
                                              
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                            
                                                  echo"
                                           <tr>
                                               <th scope='row'>".$select_task[0]['id']."</th>
                                               <td>".$select_task[0]['calendar_id']."</td>
                                               <td>".$select_task[0]['task_title']."</td>
                                               <td>".$select_task[0]['week']."</td>
                                              
                                               </tr>
                                           ";
                                              
                                           ?>
                                            
                                           

                                            
                                       </tbody>
        </table>
        </div>
                      
        <h2>Activities for This week</h2>
                                   <table class="table table-hover">
                                       <thead>
                                           <tr>

<!--  	 	id 	task_id 	activity 	estimated_time 		-->
                                               <th scope="col">#</th>
                                               <th scope="col">Task</th>
                                               <th scope="col">Calendar</th>
                                               <th scope="col">Activity</th>
                                               <th scope="col">Estimated Time</th>
                                               <th scope="col">Edit Activity</th>
                                              
                                              
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <?php
                                            $activities=$execute->select("activity","where task_id='$task_id'");
                                            if($activities==true){
                                            foreach($activities as $activity){
                                                $id=$activity['id'];
                                                  echo"
                                           <tr>
                                               <th scope='row'>".$activity['id']."</th>
                                               <td>".$activity['task_id']."</td>
                                               <td>".$select_task[0]['calendar_id']."</td>
                                               <td>".$activity['activity']."</td>
                                               <td>".$activity['estimated_time']."</td>
                                               <td ><a class='badge badge-info' href='?activity_id='".$activity['estimated_time']."'><span class='fas fa-pencil-alt'></span></a></br>
                                               <a class='badge badge-info' href='?activity_id='".$id."'><span class='fas fa-trash-alt'></span></a>
                                               <input type='checkbox'></input>
                                               </td>
                                               
                                              
                                               </tr>
                                           ";
                                            }}else{
                                                echo"
                                                <tr>
                                                <br>
                                                    <tr><h2 class='btn-danger'>Add new Activities for this week</h2><tr>
                                                    
                                                   
                                                    </tr>
                                                ";
                                            }
                                              
                                           ?>
                                            
                                           

                                            
                                       </tbody>
                                   </table>
                               
                       <h2> Create new activity<h2>

                                         
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Activity</label>
                                                 <textarea type="text" class="form-control" required="" name="activity" id="validationCustom03" placeholder="John" required="">
                                        </textarea>
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Estimated Time</label>
                                                 <input type="text" class="form-control" required="" name="time" id="" placeholder="Doe" required>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             
                                            
                                            
                                         </div>
                                         <button type="submit" class="btn btn-info btn-lg btn-block" name="post_activity">CREATE ACTIVITY</button>
                                         <a class="btn btn-info btn-lg btn-block"  href='view_calendars.php'><span class='fas fa-undo'> </span></a>
                                     </form>
    </div>
                                     <?php
        }
}else{
    header('Location:index.php');
}
   
?>