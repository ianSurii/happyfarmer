<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_GET['delete'])){
    extract($_GET);

    $delete=$execute->delete("inventory","where idinventory='$delete'");
    unset($_POST);
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
                                <a class="badge badge-info" href='new_inventory.php'>New Inventory<span class="fas fa-plus"></span></a> 
                                <!-- <a class="badge badge-success" href='new_farm.php'>Add Employee<span class="fas fa-calendar-plus"></span></a> </div> -->
                            </div>
                           
                        
 </div>
 

<form  action="" id="validationform" data-parsley-validate="" novalidate="">






                   
<?php
$username=$_SESSION['username'];
$user_id=$_SESSION['user_id'];
 $farms=$execute->select("farms","where owner='$username'");
 if($farms==true){
  
        


    

 foreach($farms as $farm){
    $result = "farm".$farm['id'];
    $id=$farm['id'];


    $cardname=str_replace(' ', '',$result);

            
             
                
                    echo    "
                    <script type='text/javascript' language='javascript'>
                    function ".$cardname."() {
                        var ele = document.getElementById(".$farm['id'].");
                        if(ele.style.display == 'none') {
                                ele.style.display = 'block';
                          }
                        
                    }

                    </script>";
                  
                    echo"
                            <div class='card' value='Show-Hide' onclick='return ".$cardname."();'>
                                <div class='card-body'>
                                    <div class='d-inline-block'>
                                       
                                        <h2 class='mb-0'>". strtoupper($farm['name'])."</h2>
                                    </div>
                                    <div class='float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1'>
                                    <a href='' >new<a/>
                                        <i class='fa fa-eye fa-fw fa-sm text-info'></i>
                                    </div>
                                    
                                    <div class='float-right mt-1 badge-success'>
                                    <a href=''  ><span class='fas fa-plus '><span><a/>
                                      
                                    </div>
                                    
                                    <div id='".$farm['id']."' style='display:none;'>
                                    <table class='table table-hover'>
                                    <thead>
                                        <tr>


                                        <th scope='col'>#</th>
                                          
                                        <th scope='col'>Name</th>
                                        <th scope='col'>Quanity</th>
                                        <th scope='col'>Cost</th>
                                            
                                        
                                        </tr>
                                    </thead>
                        
                                    <tbody>";
                                
                                        $farm_inventory=$execute->select("inventory","where farm_id='".$farm['id']."'");
                                        if($farm_inventory==true){
                                        
                                
                                            foreach($farm_inventory as $inventory){  
                                               
                                           
                                        
                                         
                                    echo" <tr>
                                            <th scope='col'>".$inventory['idinventory']."</th>
                                           
                                            <th scope='col'>".$inventory['Name']."</th>
                                            <th scope='col'>".$inventory['Quantity']."</th>
                                            
                                            <th scope='col'>".$inventory['Cost']."</th>
                                            <th  class='btn btn-outline-danger' scope='col'><div>
                                            <a href='view_calendar.php'><span class='fas fa-eye'></span></a>
                                            <br>
                                            <a href='?delete=".$inventory['idinventory']."'><span class='fas fa-trash-alt'></span></a>
                                            </div></th>
                                                </tr>
                                          
                                             
                                      

                                 ";}
                                }else{

                                    echo    "
                                    
                                                            <tr>
                                                           No Invetory For this Farm
                                                                <tr>
                                                          
                                                             
                                                            
                                                        </tbody>
                                                    </table>
                
                                                 
                                                   
                                                
                                                
                                            ";
                                    }
                                
                                   
                                
                                    echo "
                                          
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            ";
                     
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
     include 'includes/footer.php';       
}else{
    header('Location:index.php');
}
?>