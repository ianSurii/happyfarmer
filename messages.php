<?php
include('classes/DbFunctions.php');




$execute=new dbFunction();

if(isset($_GET['delete'])){
    extract($_GET);

    $delete=$execute->delete("farmer_calendars","where id=$delete");
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
                            <h2 class="pageheader-title">Happy Farmer </h2> 
                               <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Messages</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">All Messages</li>
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
                                <a class="badge badge-info" href='send_message.php'>Send Message<span class="fas fa-calendar-plus"></span></a> 
                               
                            </div>
                           
                        
 </div>
 

<form  action="" id="validationform" data-parsley-validate="" novalidate="">






                   
<?php
$username=$_SESSION['username'];
$user_id=$_SESSION['user_id'];
 $messages=$execute->select("messages"," WHERE `to`='$user_id'");
 if($messages   ==true){
  
        


    

 foreach($messages as $message){
//     $query="UPDATE ".$table." ".$setColumnValue."WHERE".$condition.";";
//     $result=$this->db->query($query) or die($this->db->error);
//   //updateformat SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
//     //WHERE CustomerID = 1;
    
              $sender_details=$execute->select("user_records"," WHERE `id`='".$message['from']."'");
              
                if($message['read_status']==1){
                    $read_status='far fa-star';
                }else{
                    $read_status='far fa-star-half';
                    $update_read_status=$execute->update("messages","SET read_status='1'"," id='".$message['id']."'");

                }
                  
                  
                    echo"
                            <div class='card' value='Show-Hide' >
                                <div class='card-body'>
                                 
                                    <div class='notification-info'>
                                    <div class='notification-list-user-img'><img src='assets/images/avatar-2.jpg' alt='' class='user-avatar-md rounded-circle'></div>
                                    <div class='notification-list-user-block'>From:<span class='notification-list-user-name'> ".$sender_details[0]['first_name']." ".$sender_details[0]['last_name']."</span>".$message['message'].".
                                        <div class='notification-date'> ".$message['date']."
                                        
                                        <div class='float-right   mt-1'>
                                        <i class='".$read_status." fa-fw fa-sm text-info'></i>
                                    </div></div>
                                    </div>
                                   
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
                                      
                                       <h2 class='mb-0'>Inbox is Empty</h2>
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
                                     include 'includes/footer.php';
            
}else{
    header('Location:index.php');
}
?>

<div class="card">
                                        