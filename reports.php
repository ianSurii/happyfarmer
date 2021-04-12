<?php


include('classes/DbFunctions.php');

// require 'includes/header.inc';
// include 'includes/navbar.inc';
// include 'includes/sidemenu.php';


$execute=new dbFunction();


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
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Reports</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">All</li>
                                          
                                        </ol>
                                        </ol>
                                    </nav>
                                </div>
                                <a class="badge badge-warning" href='worker.php'>Go Back <span class="fas fa-undo"></span></a>
                            </div>
                           
                        
 </div>

<form  method="POST" action="" id="validationform" data-parsley-validate="" novalidate="">
<!-- calendar_name 	period 	crop 	variety 	task_id 	region1 	region2 	region3 -->
<p>

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                      
                                            <tr>

                                                <th>#</th>
                                                <th>Buyer</th>
                                                <th>Transaction</th>
                                                <th>Cost</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                                <th>Units</th>
                                                <th>Contact</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $user_id=$_SESSION['user_id'];

                                            $farms_id=$execute->select("employees","where employee_id='$user_id'");
                                            if($farms_id==true){
                                             
                                                   
                                           
                                           
                                               
                                           
                                            foreach($farms_id as $farm){
                                           
                                               $farm_produce=$execute->select("produce","where farm_id='".$farm['id']."'");
                                               if($farm_produce==true){
                                                   foreach ($farm_produce as $produce) {
                                                       if($produce['status']==1){
                                                           $status="PAID";
                                                       }else{
                                                        $status="PEDDING";
                                                       }
                                                      
                                           echo"
                                            <tr>
                                                <th>".$produce['id']."</th>
                                                <th>".$produce['buyer']."</th>
                                                <th>".$produce['trasnsaction']."</th>
                                                <th>".$produce['cost']."</th>
                                                <th>".$status."</th>
                                                <th>".$produce['name']."</th>
                                                <th>".$produce['units']."</th>
                                                <th>".$produce['contact']."</th>
                                            </tr>";}
                                                   }
                                                }
                                            }else{

                                            }
                                                                                     ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Buyer</th>
                                                <th>Transaction</th>
                                                <th>Cost</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                                <th>Units</th>
                                                <th>Contact</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                     </form>
    </div>
                                     <?php


include 'includes/footer.php';
 
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
