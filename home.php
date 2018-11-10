<?php
include_once 'includes/header.php';
include_once 'includes/footer.php';
include_once 'includes/forms.php';
/* 
 * HOME PAGE WHEN A USER HAS LOGGED IN
 */

display_header();

$userid = $_SESSION['user_no'];
$query1 = 'SELECT * FROM member WHERE member_id ='.$userid.'';

/* QUERY FOR PENDING TRANSACTIONS HERE */
$pending = "SELECT t_id, mg_name, location FROM transaction JOIN branch_office on transaction.branch_id = branch_office.branch_id WHERE comfirm = 0";

$lastloginquery = "SELECT last_login from login_details where user_no = $userid";

include_once 'includes/connection.php';
$userdetails = $db->query($query1)->fetch();
$logindetails = $db->query($lastloginquery)->fetch();

$lastlogin = date('Y-m-d', $logindetails['last_login']);



?>
<!-- Page Content -->

<div class="row" style="height:200px;margin-top: -34px;z-index: -1;background:url('assets/images/background-image.jp');">

    <div class="col-lg-4">

    </div>
    <div class="col-lg-4">
        <div class="form-fields-group">


            <div class="input-group">
                <input id="search_text" type="text" class="form-control" placeholder="Search" name="query">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit" style="background: green;"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>

            <div id="searchresult">
                <!--Search Result displays here -->

            </div>

        </div>
    </div>
    <div class="col-lg-4">

    </div>

</div>

<div class="row">
    <div class="col-lg-12" style="height:200px;">
        <div class="col-lg-12" style="height:200px;">
            <div class="col-lg-3" style="background: red; min-height:600px;"></div>
            <div class="col-lg-6" style="background: yellow; min-height:600px;">
                
                
            </div>
            <div class="col-lg-3" style="background: green; min-height:600px;">
                
                <div id="pending" class="col-lg-12">
                    <!-- DISPLAY ALL PENDING TRANSACTION -->
                    <script>
                        function fetchpending(){
                           // $("#pending").html(load_pending_data()); // display time on the page
                           load_pending_data();
                        }
                        $(document).ready(function(){
                            setInterval("fetchpending()", 10000);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
footerJs();
//display_footer();