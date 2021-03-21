<?php
include('classes/DbFunctions.php');
require 'includes/header.inc';
        require 'includes/navbar.inc';
        include 'includes/sidemenu.php';


$execute=new dbFunction();


   if(isset($_SESSION['username']) ) {
    // && !empty($_SESSION['id']=$id)
  $username=$_SESSION['username'];
 
  
//   unset($_SESSION["products"])
        
        if(isset($_GET['calendar_id'])){
            extract($_GET);

        
        $tasks=$execute->select("task","Where calendar_id='$calendar_id'");
        if($tasks==true){
           
       

        
?>
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content ">
<div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h2 class="pageheader-title">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="view_calendars.php" class="breadcrumb-link">Calendars</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Task</li>
                                            <li class="breadcrumb-item active" aria-current="page">View</li>
                                        
                                            <li class="breadcrumb-item active" aria-current="page">Task</li>
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>
        

    

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">




<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>

<!-- Full texts 	calendar_id	task_title	week	id -->
                                                <th scope="col">#</th>
                                                <th scope="col">Calendar</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Week</th>
                                                <th scope="col">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               foreach($tasks as $task){
                                                   echo"
                                            <tr>
                                                <th scope='row'>".$task['id']."</th>
                                                <td>".$task['calendar_id']."</td>
                                                <td>".$task['task_title']."</td>
                                                <td>".$task['week']."</td>
                                                <td><a  class='badge badge-danger' href='edit_calendar_task.php?task_id=".$task['id']."'>Edit</a></td>
                                                </tr>
                                            ";
                                               }}
                                            }else{

                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="create">CREATE</button>
                                         <a class="btn btn-info btn-lg btn-block"  href='view_calendars.php'><span class='fas fa-undo'> </span></a>
                                     </form>
    </div>
                                     <?php
            
}else{
    header('Location:index.php');
}
?>  