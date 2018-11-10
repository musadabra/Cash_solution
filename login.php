<?php
include_once 'includes/header.php';
include_once 'includes/footer.php';
include_once 'includes/forms.php';
/* 
/* 
 * LOGIN PAGE
 */

display_header();
?>
<!-- Page Content -->
    <!-- banner -->
    <div class="row banner-row">
        
        <div class="col-lg-12">
            <div class"banner" style="height:800px;margin-top: -34px;
    z-index: -1;background:url('assets/images/background-image.jpg');">
              <div class="container">
                <div class="col-lg-5 banner-texts">
                    <h2 class="banner-text">SOFTWARE-DEPENDENT</h1>
                    <h1 class="banner-text">IMMUNIZATION SYSTEM</h1>
                </div>
                <div class="col-lg-4 banner-texts">
                   <h2 class="banner-text">A SOLUTION TO</h1>
                   <p class="banner-text">
                     LARK OF INFORMATION<bR>
                     TARGET AREA<bR>
                     RECORD KEEPING
                   </p>
                </div>

              </div>
              <div class="container">
                  <form action="login.php" method = "post">
                    <div class="login-form info1">
                    <h3>Login To Your Account</h3>

                    <div class="form-group">
                        <p id = "loginerror" style="color:red"></p>
                        <input class="form-control" type="text" name="username" placeholder="username">
                        <input class="form-control" type="password" name="password" placeholder="password" >
                        <input class="btn btn-primary" type="submit" value="Login">
                        <p><a class="pb-modalreglog-submit" href="" data-toggle="modal" data-target="#forgotpassword">Forgot Password ?</a></p>
                    </div> 
                    </div>
                </form>
              </div>       
            </div>
        </div>
   </div>
    
    
<?php
    include_once 'includes/authentication.php';

    if (isset($_POST["username"]) && isset($_POST["password"])) {

        // process the form contents...
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $loginerror = "Please enter username and password";
            echo '<script> loginerror("'.$loginerror.'"); </script>';
            
        }else {
           
            $name = $_POST["username"];
            $pass = $_POST['password'];
            
            if(!login($db, $name, $pass)){
               $loginerror = "Wrong username or password";
               echo '<script> loginerror("'.$loginerror.'"); </script>';
            }else{
                //header("location:home.php");
                echo '<script> location.href="home.php" </script>';
            }
    }
}       
         
display_footer();
?>