<?php
include_once "authentication.php";
//Start sessiont and initialize a variable user
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$profile= 'assets/images/profile-icon.jpg';
$user = '';

//IF THE USER IS TRYIN TO VIEW LOGIN DONT REDIRECT
        //GETTING THE NAME OF THE PAGE THE USER IS VIEWING
        $file = $_SERVER['SCRIPT_NAME'];
        $break = explode('/',$file);
        $pfile = $break[count($break) - 1];

if(!isset($_SESSION['user_no']) && $pfile != 'login.php'){  
    //Redirrect user to login page 
    header("location:login.php");
}  else {
    if(isset($_SESSION['user']) && isset($_SESSION['user_no'])){
        $user = $_SESSION['user'];
        $profile = $_SESSION['user_no'];
    }
}

//display_header displays the header of the website,takes two parameters
// 1. logged-in (boolean)
// 2. User (Health facility incharge, Ri incharge, VCM)

function nav($user,$cashofficer,$branchmanager,$manager2,$manager1){
    $output = '<ul>';
        if ($user == 'BRANCH_MANAGER') {
            foreach ($branchmanager as $key => $value){
                 $output .= '<li><a href="'.$value.'">'.$key.'</a></li>'; 
            }
        }elseif ($cashofficer == 'CASH_OFFICER') {
            foreach ($cashofficer as $key => $value){
                $output .= '<li><a href="'.$value.'">'.$key.'</a></li>'; 
            }  
        }else if($user = 'MANAGER1'){
            foreach ($manager1 as $key => $value){
                $output .= '<li><a href="'.$value.'">'.$key.'</a></li>'; 
            }  
        }else if($user = 'MANAGER2'){
            foreach ($manager2 as $key => $value){
                $output .= '<li><a href="'.$value.'">'.$key.'</a></li>'; 
            }  
        }
 
        echo $output.'</ul>';
}


//FIGURE OUT THE PAGE TITLE by getting the name of file diplaying AND DISPLAY IT
function display_title() {
    echo 'title';
}

function display_header(){
  //MAKE VARIABLES GLOBAL IN ORDER TO BE USED IN THIS FUNCTION
    
  global $profile,$user,$loggedin;
    
    
  // VCM Links
    $cashofficer = array('TRANSACTION' => 'transaction.php',
        'DAILY REPORT' => '#',
        'PRINT' => '#');

    $branchmanager = array('SEND TRANSACTION' => 'send-transaction.php',
        'TRANSACTION' => '#',
        'DAILY REPORT' => 'daily-report.php',
    );

    $manager2 = array('DAILY REPORT' => 'reports.php',
        'PRINT' => '#'
    );

    $manager1 = array('TRANSACTION' => 'transaction.php',
        'DAILY REPORT' => 'reports.php',
        'PRINT' => '#'
    );
    
?>
   <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php display_title();?></title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/custom-style.css">
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    
      <script src="assets/js/jquery.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        function loginerror(error){
             document.getElementById("loginerror").innerHTML = error;
        }
        
        function modalDisplay(content){
            //alert("modalDisplay"); 
            $("#incompleteforminput").modal({
            show:true}
                );
            document.getElementById("incompleteformlist").innerHTML = content;
        }
        
        $(document).ready(function(){

        /* Assign empty url value to the iframe src attribute when
            modal hide, which stop the video playing */
            $("#myModal").on('hide.bs.modal', function(){
                $("#cartoonVideo").attr('src', '');
            });

            /* Assign the initially stored url back to the iframe src
            attribute when modal is displayed again */
            $("#myModal").on('show.bs.modal', function(){
                $("#youtubeVideo").attr('src', url); 

            });

         function load_data(query)
         {
             
          $.ajax({
              url:"includes/fetch_transaction.php",
              method:"POST",
              data:{message:query},
              success: function(data)
                    {
                         $('#searchresult').html(data);
                    }
          });
         }
         
         // WHEN A CHARACTER/KEY IS TYPEED ON THE FORM FIELD
         $('#search_text').keyup(function(){
          var query = $(this).val();
          if(query != '')
          {
           load_data(query);
          }
          else
          {
           load_data();
          }
         });
        
        });

    </script>
     
    

</head>

<body>

    <!-- Navigation -->
    <div class="row">
        <div id="header" class="container">
            <div class="col-lg-12">
                <!-- logo -->
                <div class="col-lg-1 logo">
                    <img src="assets/images/courtofarm.jpg">
                </div>
                <div class="col-lg-10">
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                       <h3>NATIONAL PRIMARY HEALTH CARE DEVELOPMENT AGENCY</h3>
                  </div>
                  <div class="col-lg-3"></div>
                  
                </div>
                 <!-- logo -->
                <div class="col-lg-1 logo">
                    <img src="assets/images/nphcda.jpg">
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="row nav-row">
        <div class="container">
            <div class="col-lg-12" style="z-index:2">
                 <nav>
                     <div class="col-lg-8">
                         <?php nav($user,$cashofficer,$branchmanager,$manager2,$manager1)?>
                     </div> 
                     <div class="col-lg-2"></div>  
                     <div class="col-lg-2 profile-links">
                         <a class="btn btn-default" href="logout.php?userid=<?php echo $profile;?>">Logout</a>
                         <a href="user.php?userid=<?php echo $profile;?>" id="profile-link">Profile</a>
                         <div class="profile-photo-icon" style="background-image: url('assets/images/profile-pic/<?php echo $profile;?>.jpg');">
                             <!--<img href="assets/images/profile-pic/<?php echo $profile;?>.jpg">-->
                         </div>
                     </div>        
                </nav>
            </div>
        </div>
    </div> 
<?php
}?>