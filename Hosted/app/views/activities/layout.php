<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->


        <!--Content area here-->
        <?php
                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                        $url = "https://";
                    else
                        $url = "http://";
                    // Append the host(domain name, ip) to the URL.   
                    $url .= $_SERVER['HTTP_HOST'];

                    // Append the requested resource location to the URL   
                    $url .= $_SERVER['REQUEST_URI'];
                    // $url = "http://YouthVenture/mvcprojectnew/activities";
                    
                    ?>

        <?php

                  
$c_url = URLROOT . "/activities"; 
$t_url = URLROOT . "/activities/create"; 
$r_url = URLROOT . "/activities/registrants"; 
$u_url = URLROOT . "/activities/update"; 
$f_url = URLROOT . "activities/feedbacklist";
// $u_url = URLROOT . "/activities/feedback/create";

if (isset($data['activity']) && is_object($data['activity'])) {

    $u_url = URLROOT . "/activities/update/".$data['activity']->act_id; 

    }







//error_reporting(0);
if ($url == $c_url) {
    if ($_SESSION['roles'] == "student" && $url == $c_url) {
        require 'manage_stud.php';
    
    
    } elseif ($_SESSION['roles'] == "client"||$_SESSION['roles'] == "admin") {
        // Code for the Client role
        // echo "Welcome, Client! You can create something here.";
        // Place your client-specific content or include a file for creating activities
        require 'manage.php';
    } else {
        // Code for other roles
    }
} else if ($url == $t_url){
    if ($_SESSION['roles'] == "student" && $url == $t_url) {
        require 'linklist.php';
    } elseif ($_SESSION['roles'] == "client"||$_SESSION['roles'] == "admin") {
        // Code for the Client role
        require 'create.php';
    } else {
        // Code for other roles
    }
}else if($url==$r_url){
    require 'registrants.php';

}else if($url==$u_url)
{
    require 'update.php';
}else if($url==$f_url)
{
    require 'feedbacklist.php';
}

?>





        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->


