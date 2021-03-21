<?php
require_once('classes/DbFunctions.php');
$execute = new dbFunction();

switch ($_GET['tag']) {
   
    case 'const':
        extract($_GET);
        $data = $execute->select("farm_calendars","where crop='".$_GET['id']."'");
        // echo '<option value="0">Select Crop ---</option>';
        if (count($data) == 0) {
            echo '<option value="0">Select Crop First ---</option>';
        } else {
            echo '<option value="0">Select Variety---</option>';
            foreach ($data as $p) {
                if ($p['variety'] != '') {
                    echo "<option value='". $p['id'] . "'>" . $p['id'] . "</option>";
                } else {
                    echo '<option value="0">Unavailable</option>';
                }
            }
        }
        break;

    case 'cal':
        extract($_GET);
        #idc
       $data = $execute->select("farm_calendars","where id='$idc'");
        if(count($data)==0){
            echo '<option value="0">Unavailable</option>';
        }else{
          
                if ($data[0]['period']!='') {
                    echo '<option selected="selected" value="' . $data[0]['period'] . '">' . $data[0]['period'] . '</option>';
                } else {
                    echo '<option value="0">"Select Crops  and Varierty"</option>';
                }
            
        }
        break;

    // case 'customer_product':
    //     require_once('classes/Customers.class.php');
    //     $customers = new Customers();

    //     $data = $customers -> getCustomer_Products($_GET['id'],  $_SESSION['UID']);
    //     if(count($data) == 0){
    //         echo '<option value="0">No Product Mapped to user category</option>';
    //     }else{
    //         foreach($data as $p){
    //             if($p['PR_ID'] !=''){
    //                 echo '<option value="'.$p['PR_ID'].'">' . $p['PR_NAME'] . '</option>';
    //             }else{
    //                 echo '<option value="0">No Product Mapped to user category</option>';
    //             }
    //         }
    //     }
    //     break;
}
?>