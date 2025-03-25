<?php
    require APPROOT . '/views/includes/head_metronic.php';
?>

 <?php
    require APPROOT . '/views/includes/begin_app.php';

 ?>
 
 <style>
  @keyframes sparkle {
    0% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
  }

  .birthday-sparkle {
    position: relative;
    display: inline-block;
  }

  .sparkle {
    position: absolute;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    animation: sparkle 0.07s ease-out infinite; /* Adjusted duration for 15 bubbles per second */
  }
</style>

<style>
  @keyframes sparkle {
    0% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
  }

  .birthday-sparkle {
    position: relative;
    display: inline-block;
  }

  .sparkle {
    position: absolute;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    animation: sparkle 1s ease-out infinite;
  }

  /* Colors for the sparkles */
  .sparkle:nth-child(1) { background-color: #ff0000; } /* Red */
  .sparkle:nth-child(2) { background-color: #ff00ff; } /* Magenta */
  .sparkle:nth-child(3) { background-color: #ffff00; } /* Yellow */
  .sparkle:nth-child(4) { background-color: #ff9900; } /* Orange */
  .sparkle:nth-child(5) { background-color: #ffcc00; } /* Gold */
  .sparkle:nth-child(6) { background-color: #ff6699; } /* Pink */
  .sparkle:nth-child(7) { background-color: #ff3366; } /* Coral */
  .sparkle:nth-child(8) { background-color: #33ccff; } /* Sky Blue */
  /* Add more .sparkle:nth-child() rules for additional colors */
</style>



 <?php
                    foreach ($data['studentProfile'] as $studentProfile) :
                                    ?>
                                    <?php endforeach; ?>
                                    <div class="card mb-5 mb-xl-10">
                                    

                        



 <?php
    require APPROOT . '/views/pages/above.php';
 ?>
 








    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Profile Details</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <div class="d-flex justify-content-end">
        <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student') {  ?>

    <a href="<?php echo URLROOT . "/resumes/viewResume" ?>" class="btn btn-sm btn-warning mx-2 align-self-center">Generate Resume</a>
    <a href="edit_profile" class="btn btn-sm btn-primary mx-2 align-self-center">Edit Profile</a>
    <?php }?>
    <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] !== 'student') {  ?>
    <a href="edit_profileClient" class="btn btn-sm btn-primary mx-2 align-self-center">Edit Profile</a>
    <?php }?>
</div>


        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?php echo strtoupper($studentProfile->firstname); ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Gender</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
            <span class="fw-semibold text-gray-800 fs-6"><?php echo ucfirst($studentProfile->gender); ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Contact Number</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6"><?php echo $studentProfile->phone; ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
                                

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student') {  ?>
            <label class="col-lg-4 fw-semibold text-muted">Institution</label>
            <?php }?>
            <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] !== 'student') {  ?>
            <label class="col-lg-4 fw-semibold text-muted">Company / Organization</label>
            <?php }?>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <a class="fw-semibold fs-6 text-gray-800 text-hover-primary"><?php echo strtoupper($studentProfile->institution); ?></a>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student') {  ?>

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Programme</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?php echo $studentProfile->major; ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->
        <?php }?>

        
    </div>
    <!--end::Card body-->
</div>





<?php require APPROOT . '/views/pages/skills.php'; ?>

<?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student') {  ?>

<div class="row">
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer d-flex justify-content-between align-items-center">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Rewards</h3>
            </div>
            <!--end::Card title-->

            <?php
            // Calculate and display the count of rewards
            $countRewards = 0;
            foreach ($data['studentReward'] as $claimReward) {
                if ($_SESSION['users_id'] == $claimReward->users_id) {
                    $countRewards++;
                }
            }
            echo '<span class="fw-bold fs-6 fw-semibold text-muted">(' . $countRewards . ' rewards)</span>';
            ?>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body p-9">
            <?php if (!empty($data['studentReward'])) : ?>
                <table id="kt_datatable_posts" class="table table-row-bordered gy-2">
                    <tbody>
                        <?php
                        $claimRewards = $this->pageModel->getAllClaimRewards();
                        foreach ($data['studentReward'] as $claimReward) :
                            if ($_SESSION['users_id'] == $claimReward->users_id) :
                        ?>
                                <tr>
                                    <td class="fw-bold fs-6 text-gray-800"><?php echo $claimReward->rewardName; ?></td>
                                    <td class="fw-bold fs-6 fw-semibold text-muted"><?php echo $claimReward->rewardCriteria; ?></td>
                                </tr>
                        <?php
                            endif;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                







            <?php endif; ?><?php }?>
        </div>
        <!--end::Card body-->
    </div>
</div>














<?php
    require APPROOT . '/views/includes/end_app.php';
?>



<?php
    require APPROOT . '/views/includes/footer_metronic.php';
 ?>