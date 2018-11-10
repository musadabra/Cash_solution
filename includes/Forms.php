<?php
/*
 * ALL FORMS ARE HERE
 */

//DISPLAY LOGIN FORM
function display_login_form() {
?>
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
<?php
}
?>