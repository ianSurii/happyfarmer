<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_GET['delete'])){
    extract($_GET);

    $delete=$execute->delete("farmer_calendars","where id=$delete");
    unset($_POST);
}
if(isset($_GET['paid'])){
    extract($_GET);

    $delete=$execute->update("produce","set status=1 "," id=$paid");
    unset($_GET);
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
                              <h2 class="pageheader-title"><image src="assets/images/icon.png"  width="60px" height="50px">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
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
                                <!-- <div class="myDIV">
                                <a class="badge badge-secondary" href='new_employees.php'>Add Employee<span class="fas fa-calendar-plus"></span></a> </div> -->
                                <a class="badge badge-info" href='farmer_add_produce.php'>ADD<span class="fas fa-calendar-plus"></span></a> 
                               
                            </div>
                           
                        
 </div>
 

<form  action="" id="validationform" data-parsley-validate="" novalidate="">






                   
<?php
$username=$_SESSION['username'];
$user_id=$_SESSION['user_id'];

 $farms_id=$execute->select("farms","where owner='$username'");
 if($farms_id==true){
  
        


    

 foreach($farms_id as $farm){

    $farm_produce=$execute->select("produce","where farm_id='".$farm['id']."'");
if($farm_produce==true){
    // 
// $select_farm_n
                    foreach($farm_produce as $produce){  
                        $id=$produce['id'];
                                    if($produce['status']==1){
                                        $status="PAID";

                                    }else{
                                        $status="PENDING
                                        <a class ='btn btn-success' href='?paid=$id'><span class ='far fa-handshake'>mark<br> as<br>
                                        paid</span></a>";
                                    }
                                //    if($produce['trasnsaction']=="CREDIT"){
                                //        $transaction="CREDIT<a href='?paid=1"
                                //    }
                                            $result = "farm".$produce['id'];
                              


                                $cardname=str_replace(' ', '',$result);

            
             
                
                    echo    "
                    <script type='text/javascript' language='javascript'>
                    function ".$cardname."() {
                        var ele = document.getElementById(".$id.");
                        if(ele.style.display == 'none') {
                                ele.style.display = 'block';
                          }
                        
                    }

                    </script>";

                   
                  
                                 echo"
                            <div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                <div class='card-body'>
                                    <div class='d-inline-block'>
                                       
                                        <h2 class='mb-0'>". strtoupper($produce['buyer'])."</h2>
                                    </div>
                                    <div class='float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1'>
                                        <i class='fa fa-eye fa-fw fa-sm text-info'></i>
                                    </div>
                                    
                                    <div id='".$id."' style='display:none;'>
                                    <table class='table table-hover'>
                                    <thead>
                                        <tr>


                                            <th scope='col'>#</th>
                                            <th scope='col'>Buyer</th>
                                            <th scope='col'>Transaction</th>
                                            <th scope='col'>Cost</th>
                                            <th scope='col'>Status</th>
                                            <th scope='col'>Name</th>
                                            <th scope='col'>Contact</th>
                                            <th scope='col'>Units</th>
                                           
                                        
                                        </tr>
                                    </thead>
                        
                                    <tbody>";
                                
                                            
                                    echo" <tr>
                                                <th scope='col'>".$produce['id']."</th>
                                            <th scope='col'>".$produce['buyer']."</th>
                                            <th scope='col'>".$produce['trasnsaction']."</th>
                                            <th scope='col'>".$produce['cost']."</th>
                                            <th scope='col'>".$status."</th>
                                            <th scope='col'>".$produce['name']."</th>
                                            <th scope='col'>".$produce['contact']."</th>
                                            <th scope='col'>".$produce['unit']."</th>
                                         
                                            
                                            
                                                </tr>
                                          
                                                </tbody>
                                                </table>
                                               
                                            </div>
                                            </div>
                                            </div>
                                      

                                 ";}
                                }else{

                                     
                                    }
                                
                                   
                                
                     
                                //my last inser else
                            //Firs foreach
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





                                         <!-- <button type="submit" class="btn btn-danger btn-lg btn-block" name="create">CREATE</button> -->
                                     </form>
    
                                     <?php
                                       require ('includes/footer.php');
            
}else{
    header('Location:index.php');
}
?>