<?php


include('classes/DbFunctions.php');

// require 'includes/header.inc';
// include 'includes/navbar.inc';
// include 'includes/sidemenu.php';


$execute=new dbFunction();

if(isset($_POST['create'])){
    extract($_POST);
    $editor=$_SESSION['username'];
    $date = new DateTime();
    $id=$date->getTimestamp();
    $column="id,editor,calendar_name,period,crop,variety,region1,region2,region3";
    $values="'$id','$editor','$name','$period','$crop','$variety','$r1','$r2','$r3'";
    // <!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
    $_SESSION['id']=$id;
    $create=$execute->insert('farm_calendars',$column,$values);
    if($create==true){
        // $id=$execute->select('farm_calendars',"where editor='$editor',calendar_name='$name',period='$period'");
        $number_of_weeks=ceil($period/7);
        for ($i = 1; $i <= $number_of_weeks; $i++) {
            // id 	calendar_id 	task_title 	week 	
            $column="id,calendar_id,task_title,week";
            $task_id=$id+$i;
            $title="week".$i;
            $value="$task_id,$id,'$title',$i";
            $create_tasks=$execute->insert('task',$column,$value); 
            if($create_tasks==true){
            header('Location:view_calendars.php');
            // $_SESSION['task_id']=$task_id;
            }else{
                echo "<script>window.alert('fill details')</script>";
            }
        }
        
       
    }


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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Calendars</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                                            <li class="breadcrumb-item active" aria-current="page">New</li>
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-info" href='create_calendar.php'>Create new calendar <span class="fas fa-calendar-plus"></span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
<p>Create a new Calendar .
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Calendar Name</label>
                                                 <input type="text" class="form-control" required="" name="name" id="validationCustom03" >
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="">Period</label>
                                                 <input type="int" class="form-control" required="" name="period" id=""  >
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Last name.
                                                 </div>
                                             </div>
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Crop</label>
                                                 <select type="text" class="form-control" required="" name="crop" id="validationCustom04">
                                                     <?php
                                                     
                                                     $crops=$execute->conditionSelect('distinct(crop_name)','crops');
                                                     if($crops==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($crops as $crop){
                                                         echo"<option value=".$crop['crop_name']." >".$crop['crop_name']."</option>";
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
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Variety</label>
                                                 <select type="text" class="form-control" required="" name="variety" id="validationCustom04">
                                                     <?php
                                                       $crops_variety=$execute->conditionSelect('distinct(crop_variety)','crops');
                                            if($crops_variety==true){
                                                echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($crops_variety as $crop_variety){
                                                         echo"<option value=".$crop_variety['crop_variety']." >".$crop_variety['crop_variety']."</option>";
                                                     }
                                                    }
                                                     else{
                                                        echo"<option value='' selected='selected'>No crops Available</option>";
                                                     }

                                                     ?>
                                                    
                                       
                                                     </select>
                                                 
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Username.
                                                 </div>
                                             </div><?php
                                             $Regions=$execute->conditionSelect('distinct(name)','regions');
                                                     if($Regions==true){
                                                     
                                                     ?>
                                             
                                             <h2 class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">Regions</h2></br>
                                             <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">#1 </label>
                                                 <select type="text" class="form-control" required="" name="r1" id="validationCustom04" >
                                                     <?php
                                                     echo"<option value='--.--' selected='selected'>select</option>";
                                                 foreach($Regions as $region){
                                                         echo"<option value=".$region['name'].">".$region['name']."</option>";
                                                     }
                                                    ?>
                                                    </select>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Phone Number.
                                                 </div>
                                                 <?php
                                                  }else{
                                                    echo"<option value='' selected='selected'>No crops Available</option>";
                                                 }?>
                                             </div>
                                             <div class="col-xl-4 col-lg-4   col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">#2</label>
                                                 <select type="text" class="form-control" name="r2" id="validationCustom04" >
                                                     <?php
                                                     if($Regions==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($Regions as $region){
                                                        echo"<option value=".$region['name']." >".$region['name']."</option>";
                                                    }
                                                }else{

                                                }
                                                    ?>
                                                    </select>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Phone Number.
                                                 </div>
                                             </div>
                                             <div class="col-xl-4 col-lg-4   col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">#3</label>
                                                 <select type="text" class="form-control" name="r3" id="validationCustom04" >
                                                     <?php
                                                     if($Regions==true){
                                                        echo"<option value='--.--' selected='selected'>select</option>";
                                                     foreach($Regions as $region){
                                                        echo"<option value=".$region['name']." >".$region['name']."</option>";
                                                    }
                                                }else{
                                                    
                                                }
                                                    ?>
                                                    </select>
                                                 <div class="invalid-feedback">
                                                     Please provide a valid Phone Number.
                                                 </div>
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
