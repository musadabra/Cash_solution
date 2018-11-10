<?php
include_once '../view-child-record.php';

//NEXT VACCINE TO GIVE A CHILD CALCULATION
function nextvccine($allvaccines, $vaccinegiven){
    
    if(mysqli_num_rows($vaccinegiven) > 0){
        $given[] = array();
        //LOGICAL ERROR HERE ON LINE 26 BECOUSE $COUNTGIVEN IS ASSING TO ZERO
        //DUE TO INITIALIZATION
        //
        $countgiven = 0;       
        while( $row = mysqli_fetch_array($vaccinegiven)){ 
            $given[$countgiven] = $row['vaccine_name'];
            $countgiven;
            
        } 
        //return count($given);
        $all[] = array();
        $countall = 0;
        while($row = mysqli_fetch_array($allvaccines)){
            $all[$countall] = $row['vaccine_name'];
            $countall++;
        }
       
        for ($index = 0; $index < count($all); $index++) {
            if ($all[$index] == $given[$countgiven]){
                return $all[$index + 1];
            }
        }
    
    }
    return $allvaccines[0];
}

?>