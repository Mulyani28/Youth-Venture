Test feedback<!--begin::Content-->
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
            
            $url .= $_SERVER['HTTP_HOST'];
            $url .= $_SERVER['REQUEST_URI'];

        ?>

        <?php
            $mb_url = URLROOT. "/resumes/viewResume" ;

            if(isset($data['student']) && is_object($data['student'])) {
                $mb_url = URLROOT . "/resumes/viewResume/" . $data['student']->user_id ;
            }

            if ($url == $mb_url) {
                require 'viewResume.php' ;
            }

        ?>

        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
