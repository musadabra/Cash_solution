<?php
include_once "connection.php";

//echo 'hello';
//Takes to two three parameters the database connection, username submited by the user and password
//select from the database from table user_details
//if the query return one or more result, the user exist.and the function return true.
function login($db,$username, $password) {

    //$query = 'select * from login_details where username="'.$username.'" and password = "'.$password.'" ';
    //$result = $db->query($query)->fetchAll();
    
    $stmt = $db->prepare('select * from login_details where username=? and password =? ');
    $stmt->execute([$username,$password]);
    $result = $stmt->fetchAll();
    
    $resultcount = 0;
    foreach ($result as $row) {
        $resultcount++;
    }
    
    if($resultcount > 0){
       
        foreach ($result as $row){
           // $userid = $row['username'];
              if(!isset($_SESSION))
                  session_start();
              
               $_SESSION['user'] = $row['user'];
               $_SESSION['user_no'] = $row['user_no'];
               return true;
              
        }
        
    }
    
    return false;
}

function logout($userid) {
    global $db;
    $time = time();
    $datetime = date('Y-m-d',$time);
  
    $sql = "UPDATE `login_details` SET `last_login`=? WHERE `user_no` =?";
    $stmt= $db->prepare($sql);
    $stmt->execute([$datetime, $userid]); 
    session_start();
 
    session_destroy();
   
}


?>