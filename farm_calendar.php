<?php


include('classes/DbFunctions.php');

// require 'includes/header.inc';
// include 'includes/navbar.inc';
// include 'includes/sidemenu.php';


$execute=new dbFunction();

if(isset($_POST['calendar'])){
    extract($_POST);
    
                echo "<script>window.alert('fill details')</script>";
          


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
                            <h2 class="pageheader-title">Happy Farmer </h2> 
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
                                <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
<p>
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">CALENDAR NAME</label>
                                                 <input type="text" class="form-control" required="" name="name" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">FARM</label>
                                                 <select type="text" class="form-control" required="" name="crop" id="validationCustom04">
                                                     <?php
                                                     $username=$_SESSION['username'];
                                                     $farms=$execute->conditionSelect('name',"farms where owner='$username'");
                                                     if($farms==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($farms as $farm){
                                                         echo"<option value=".$farm['name']." >".$farm['name']."</option>";
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
                                                 <label for="validationCustom04">CALENDAR</label>
                                                 <select type="text" class="form-control" onchange="this.form.submit()" required="" name="calendar" id="validationCustom04">
                                                     <?php
                                                    
                                                     $calendars=$execute->conditionSelect('calendar_name ,crop,period ,variety',"farm_calendars ");
                                                     if($calendars==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($calendars as $calendar){
                                                         echo"<option type='submit' name='calendar' value=".$calendar['calendar_name']." >".$calendar['calendar_name']."</option>";
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
                                                 <label for="validationCustom04">CALENDAR</label>
                                                 <select type="text" class="form-control" required="" name="calendar" id="validationCustom04">
                                                     <?php
                                                    
                                                     $calendars=$execute->conditionSelect('calendar_name ,crop,period ,variety',"farm_calendars ");
                                                     if($calendars==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($calendars as $calendar){
                                                         echo"<option type='submit' name='calendar' value=".$calendar['calendar_name']." >".$calendar['calendar_name']."</option>";
                                                     }}
                                                     else{
                                                        echo"<option value='' selected='selected'>No crops Available</option>";
                                                     }

                                                     ?><script>
                                                           var sel = document.getElementById('scripts');
                                                           function getSelectedOption(sel) {
                                                            var opt;
                                                            for ( var i = 0, len = sel.options.length; i < len; i++ ) {
                                                                opt = sel.options[i];
                                                                if ( opt.selected === true ) {
                                                                    break;
                                                                }
                                                            }
                                                            return opt;
                                                        }
                                                     </script>
                                                       
                                       
                                                     </select>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Email.
                                                 </div>
                                                 
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">START DATE</label>
                                                 <input type="date" class="form-control" required="" name="variety" id="validationCustom04">
                                                   
                                             <div class="invalid-feedback">
                                                     Please provide a valid Username.
                                                 </div>
                                             </div>
                                             
                                         
                                         <button type="submit" class="btn btn-danger btn-lg btn-block" name="create">CREATE</button>
                                     </form>
    </div>
                                     <?php
 
}else{
    header('Location:index.php');
}
?>
