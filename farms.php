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
                            <h2 class="pageheader-title">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Farms</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">All Farms</li>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='farm_calendar.php'>Add Farm Calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>
 

<form  action="" id="validationform" data-parsley-validate="" novalidate="">






                   
<?php
$username=$_SESSION['username'];
 $farms=$execute->select("farms","where owner='$username'");
 if($farms==true){
  
        


    

 foreach($farms as $farm){
    $result = $farm['name'].$farm['id'];
    $id=$farm['id'];

    $cardname=str_replace(' ', '',$result);

            $active_calendars=$execute->select("farmer_calendars","where user_name='$username' && calendar_end_date<CURRENT_DATE && farm_id='$id'");
            if($active_calendars==true){
            foreach($active_calendars as $active_calendar){
              
            if($active_calendars==true){
                $calendar_id=$active_calendar['calendar_id'];
                $tasks=$execute->conditionSelect("count(id) as task","task where calendar_id='$calendar_id'");
                
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
                    </script>
                            <div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                <div class='card-body'>
                                    <div class='d-inline-block'>
                                       
                                        <h2 class='mb-0'>".$farm['name']."</h2>
                                    </div>
                                    <div class='float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1'>
                                        <i class='fa fa-eye fa-fw fa-sm text-info'></i>
                                    </div>
                                    <div id='".$farm['id']."' style='display:none;'>
                                   
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
                                            <th scope='col'>".$active_calendar['calendar_name']."</th>
                                            <th scope='col'>".$tasks[0]['task']."</th>
                                            <th scope='col'>".$active_calendar['calendar_id']."</th>
                                            <th scope='col'>".$active_calendar['id']."</th>
                                            <th scope='col'>".$active_calendar['calendar_end_date']."</th>
                                                </tr>
                                          
                                             
                                            
                                        </tbody>
                                    </table>

                                 
                                   
                                
                                </div>
                                </div>
                            </div>
                            ";}}}else{

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
                                </script>
                                        <div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                            <div class='card-body'>
                                                <div class='d-inline-block'>
                                                   
                                                    <h2 class='mb-0'>".$farm['name']."</h2>
                                                </div>
                                                <div class='float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1'>
                                                    <i class='fa fa-eye fa-fw fa-sm text-info'></i>
                                                </div>
                                                <div id='".$farm['id']."' style='display:none;'>
                                               
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
                                 }
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