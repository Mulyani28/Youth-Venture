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
            
            $c_url = URLROOT . "/feedbacks"; 
            $t_url = URLROOT . "/feedbacks/create"; 
            $u_url = URLROOT . " ";
            // $f_url = URLROOT . "activities/feedback"; // Add the URL for the feedback functionality

            if (isset($data['feedback']) && is_object($data['feedback'])) {
                $u_url = URLROOT . "/feedbacks/update/".$data['feedback']->act_id; 
            }


            // Modify the conditions to include the feedback URL
            if ($url == $c_url) {
                require 'manage.php';
            } elseif($url == $t_url) {
                require 'create.php';
            } elseif($url == $u_url) {
                require 'update.php';
            } 
            else {
                // Handle other cases or leave empty if not needed
            }
        ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
