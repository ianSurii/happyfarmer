<?php
include 'classes/DbFunctions.php';
include 'includes/header.inc';
include 'includes/navbar.inc';
include 'includes/sidemenu.php';

$execute=new dbFunction();
   if(isset($_POST['add_farm'])) {
 extract($_POST);
    $username=$_SESSION['username'];
  $table="`farms`";
  $column="`name`,`location`,`size`,`owner`";
  $value="'$farm_name','$farm_location','$farm_size','$username'";
    $add_farm=$execute->insert($table,$column,$value);
    if($add_farm==true){
        echo "<script>window.alert('Farm added successfully')</script>";
    }else{ 
        echo "<script>window.alert('Please fill the form and try again')</script>";

    }
}
?>
<div class="dashboard-wrapper">
 <form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
                                         
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Farm Name</label>
                                                 <input type="text" class="form-control" required="" name="farm_name" id="validationCustom03" placeholder="Mwea Farm" required="">
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                        </div>
                                            
                                        <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Farm Location</label>
                                                 <input type="text" class="form-control" required="" name="farm_location" id="validationCustom03" placeholder="Mwea Tebere" required="">
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                        </div>
                                        <div class="form-row">
                                             <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Farm Size</label>
                                                 <input type="text" class="form-control" required="" name="farm_size" id="validationCustom03" placeholder="11" required="">
                                                                 <div class="invalid-feedback">
                                                 
                                                 </div>
                                             </div>
                                    
                                         <button type="submit" class="btn btn-success btn-lg btn-block" name="add_farm"><span></span>ADD</button>
                                     </form>

<?php
  require ('includes/footer.php');
?>