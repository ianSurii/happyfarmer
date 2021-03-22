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
                    echo "<option value='". $p['id'] . "'>" . $p['variety'] . "</option>";
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

    case 'constituency':
        $id=$_GET['id3'];

        $data =$execute->select('consituencies' ,"where C_CODE='1'");
        if(count($data)== 0){
            echo '<option value="0">No constituencies Mapped to County</option>';
        }else{
            foreach($data as $p){
                if($p[''] !=''){
                    echo '<option value="'.$p['CY_CODE'].'">' . $p['CY_NAME'] . '</option>';
                }else{
                    echo '<option value="0">No Product Mapped to user category</option>';
                }
            }
        }
        break;
}
?>