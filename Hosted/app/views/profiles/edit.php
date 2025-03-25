<?php
    require APPROOT . '/views/includes/head_metronic.php';
?>

 <?php
    require APPROOT . '/views/includes/begin_app.php';
	require APPROOT . '/views/profiles/above.php';
	foreach ($data['studentProfile'] as $profileId => $studentProfile):
	endforeach;
 ?>


                         <!--begin::Content-->
                         <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                <!--begin::Row-->
                                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                    <!--begin::Card header-->
                                    <div class="card-header cursor-pointer">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bold m-0">Edit Profile Details</h3>
                                        </div>
                                        
                                    </div>
                                    <!-- start card body-->
                                    <div class="card-body p-9">
                                    <form action="<?php echo URLROOT;?>/profiles/edit" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form">
                                    <!-- <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"> -->
										<!--begin::Card body-->
											<!--begin::Input group-->
                                            <input type="hidden" name="update_student" value="1">

<div class="row mb-6">
    <!--begin::Label-->
    <label class="col-lg-4 col-form-label fw-semibold fs-6">Profile Picture</label>
    <!--end::Label-->
    <!--begin::Col-->
    <div class="col-lg-8">
        <!--begin::Image input-->
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
            <!--begin::Preview existing avatar-->
            <?php
            // Assuming $location holds the path to the uploaded avatar
            if (isset($location)) {
                echo '<div class="image-input-wrapper w-125px h-125px" style="background-image: url(' . $location . ')"></div>';
            } else {
                echo '<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/blank.svg)"></div>';
            }
            ?>
            <!--end::Preview existing avatar-->
            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                <i class="ki-duotone ki-pencil fs-7">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <!--begin::Inputs-->
                <input type="file" name="file" accept=".png, .jpg, .jpeg">
                <input type="hidden" name="avatar_remove">
                <!--end::Inputs-->
            </label>
            <!--end::Label-->
            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                <i class="ki-duotone ki-cross fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <!--end::Cancel-->
            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                <i class="ki-duotone ki-cross fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->
        <!--begin::Hint-->
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
        <!--end::Hint-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->

											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-semibold fs-6">Full Name</label>
												<!--end::Label-->
												<!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                <input type="text" name="name" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->firstname; ?>"/>
                                            </div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											
											<!-- ... Existing code ... -->

<!--begin::Input group-->
<div class="row mb-6">
    <!--begin::Col for Contact Phone-->
    <div class="col-lg-4">
        <!--begin::Label for Contact Phone-->
        <label class="col-form-label required fw-semibold fs-6">Contact Phone</label>
        <!--end::Label-->
        <!--begin::Input for Contact Phone-->
        <div class="fv-row fv-plugins-icon-container">
            <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->phone; ?>"/>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <!--end::Input for Contact Phone-->
    </div>
    <!--end::Col for Contact Phone-->

    <!--begin::Col for IC Number-->
    <div class="col-lg-4">
        <!--begin::Label for IC Number-->
        <label class="col-form-label required fw-semibold fs-6">IC Number</label>
        <!--end::Label-->
        <!--begin::Input for IC Number-->
        <div class="fv-row fv-plugins-icon-container">
            <input type="tel" name="ic" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->ic; ?>"/>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <!--end::Input for IC Number-->
    </div>
    <!--end::Col for IC Number-->

    <!--begin::Col for Gender-->
    <div class="col-lg-4">
        <!--begin::Label for Gender-->
        <label class="col-form-label required fw-semibold fs-6">Gender</label>
        <!--end::Label-->
        <!--begin::Input for Gender-->
        <div class="fv-row fv-plugins-icon-container">
            <select name="gender" id="gender" aria-label="Select a Gender" data-control="select2" class="form-select form-select-solid form-select-lg select2-hidden-accessible">
                <option value="female" <?php echo ($studentProfile->gender == 'female') ? 'selected' : ''; ?>>Female</option>
                <option value="male" <?php echo ($studentProfile->gender == 'male') ? 'selected' : ''; ?>>Male</option>
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <!--end::Input for Gender-->
    </div>
    <!--end::Col for Gender-->
</div>
<!--end::Input group-->

<!-- ... Remaining code ... -->


                                            <!--begin::Input group-->
                                            <div class="row mb-6">
                                                <!--begin::Label-->
                                                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Institution</label>
                                                <!--end::Label-->
                                                <!--begin::Col-->
                                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                    <select name="university" id="university" aria-label="Select a University" data-control="select2" class="form-select form-select-solid form-select-lg select2-hidden-accessible">
                                                        <option value="UM" <?php echo ($studentProfile->institution == 'University of Malaya (UM)') ? 'selected' : ''; ?>>University of Malaya (UM)</option>
                                                        <option value="UKM" <?php echo ($studentProfile->institution == 'Universiti Kebangsaan Malaysia (UKM)') ? 'selected' : ''; ?>>Universiti Kebangsaan Malaysia (UKM)</option>
                                                        <option value="USM" <?php echo ($studentProfile->institution == 'Universiti Sains Malaysia (USM)') ? 'selected' : ''; ?>>Universiti Sains Malaysia (USM)</option>
                                                        <option value="UPM" <?php echo ($studentProfile->institution == 'Universiti Putra Malaysia (UPM)') ? 'selected' : ''; ?>>Universiti Putra Malaysia (UPM)</option>
                                                        <option value="UTM" <?php echo ($studentProfile->institution == 'Universiti Teknologi Malaysia (UTM)') ? 'selected' : ''; ?>>Universiti Teknologi Malaysia (UTM)</option>
                                                        <option value="UUM" <?php echo ($studentProfile->institution == 'Universiti Utara Malaysia (UUM)') ? 'selected' : ''; ?>>Universiti Utara Malaysia (UUM)</option>
                                                        <option value="UiTM" <?php echo ($studentProfile->institution == 'Universiti Teknologi MARA (UiTM)') ? 'selected' : ''; ?>>Universiti Teknologi MARA (UiTM)</option>
                                                        <option value="IIUM" <?php echo ($studentProfile->institution == 'International Islamic University Malaysia (IIUM)') ? 'selected' : ''; ?>>International Islamic University Malaysia (IIUM)</option>
                                                        <option value="UMS" <?php echo ($studentProfile->institution == 'Universiti Malaysia Sabah (UMS)') ? 'selected' : ''; ?>>Universiti Malaysia Sabah (UMS)</option>
                                                        <option value="UNIMAS" <?php echo ($studentProfile->institution == 'Universiti Malaysia Sarawak (UNIMAS)') ? 'selected' : ''; ?>>Universiti Malaysia Sarawak (UNIMAS)</option>
                                                        <option value="UTAR" <?php echo ($studentProfile->institution == 'Universiti Tunku Abdul Rahman (UTAR)') ? 'selected' : ''; ?>>Universiti Tunku Abdul Rahman (UTAR)</option>
                                                        <option value="MMU" <?php echo ($studentProfile->institution == 'Multimedia University (MMU)') ? 'selected' : ''; ?>>Multimedia University (MMU)</option>
                                                        <option value="TAYLORS" <?php echo ($studentProfile->institution == "Taylor's University") ? 'selected' : ''; ?>>Taylor's University</option>
                                                        <option value="SUNWAY" <?php echo ($studentProfile->institution == 'Sunway University') ? 'selected' : ''; ?>>Sunway University</option>
                                                        <option value="MONASH" <?php echo ($studentProfile->institution == 'Monash University Malaysia') ? 'selected' : ''; ?>>Monash University Malaysia</option>

                                                    </select>
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->


											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-semibold fs-6">Programme</label>
												<!--end::Label-->
												<!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                <input type="text" name="website" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->major; ?>"/>
                                            </div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->


<!--begin::Input group-->
<div class="row mb-6">
    <!--begin::Col for Street-->
    <div class="col-lg-6">
        <!--begin::Label for Street-->
        <label class="col-form-label fw-semibold fs-6">Street</label>
        <!--end::Label-->
        <!--begin::Input for Street-->
        <div class="fv-row">
            <input type="text" name="street" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->street; ?>"/>
        </div>
        <!--end::Input for Street-->
    </div>
    <!--end::Col for Street-->

    <!--begin::Col for City-->
    <div class="col-lg-6">
        <!--begin::Label for City-->
        <label class="col-form-label fw-semibold fs-6">City</label>
        <!--end::Label-->
        <!--begin::Input for City-->
        <div class="fv-row">
            <input type="text" name="city" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->city; ?>"/>
        </div>
        <!--end::Input for City-->
    </div>
    <!--end::Col for City-->
</div>
<!--end::Input group-->


<!--begin::Input group for State, Postal Code, and Country-->
<div class="row mb-6">
    <!--begin::Col for State-->
    <div class="col-lg-4">
        <!--begin::Label for State-->
        <label class="col-form-label fw-semibold fs-6">State</label>
        <!--end::Label-->
        <!--begin::Input for State-->
        <div class="fv-row fv-plugins-icon-container">
        <select name="state" id="state" aria-label="Select a state" data-control="select2" class="form-select form-select-solid form-select-lg select2-hidden-accessible">
                <option value="johor" <?php echo ($studentProfile->state == 'Johor') ? 'selected' : ''; ?>>Johor</option>
                <option value="kedah" <?php echo ($studentProfile->state == 'Kedah') ? 'selected' : ''; ?>>Kedah</option>
                <option value="kelantan" <?php echo ($studentProfile->state == 'Kelantan') ? 'selected' : ''; ?>>Kelantan</option>
                <option value="melaka" <?php echo ($studentProfile->state == 'Melaka') ? 'selected' : ''; ?>>Melaka</option>
                <option value="negeri_sembilan" <?php echo ($studentProfile->state == 'Negeri Sembilan') ? 'selected' : ''; ?>>Negeri Sembilan</option>
                <option value="pahang" <?php echo ($studentProfile->state == 'Pahang') ? 'selected' : ''; ?>>Pahang</option>
                <option value="perak" <?php echo ($studentProfile->state == 'Perak') ? 'selected' : ''; ?>>Perak</option>
                <option value="perlis" <?php echo ($studentProfile->state == 'Perlis') ? 'selected' : ''; ?>>Perlis</option>
                <option value="penang" <?php echo ($studentProfile->state == 'Penang') ? 'selected' : ''; ?>>Penang</option>
                <option value="sabah" <?php echo ($studentProfile->state == 'Sabah') ? 'selected' : ''; ?>>Sabah</option>
                <option value="sarawak" <?php echo ($studentProfile->state == 'Sarawak') ? 'selected' : ''; ?>>Sarawak</option>
                <option value="selangor" <?php echo ($studentProfile->state == 'Selangor') ? 'selected' : ''; ?>>Selangor</option>
                <option value="terengganu" <?php echo ($studentProfile->state == 'Terengganu') ? 'selected' : ''; ?>>Terengganu</option>
                <option value="kualalumpur" <?php echo ($studentProfile->state == 'Kuala Lumpur') ? 'selected' : ''; ?>>Kuala Lumpur</option>
                <option value="labuan" <?php echo ($studentProfile->state == 'Labuan') ? 'selected' : ''; ?>>Labuan</option>
                <option value="putrajaya" <?php echo ($studentProfile->state == 'Putrajaya') ? 'selected' : ''; ?>>Putrajaya</option>
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <!--end::Input for State-->
    </div>
    <!--end::Col for State-->

    <!--begin::Col for Postal Code-->
    <div class="col-lg-4">
        <!--begin::Label for Postal Code-->
        <label class="col-form-label fw-semibold fs-6">Postal Code</label>
        <!--end::Label-->
        <!--begin::Input for Postal Code-->
        <div class="fv-row">
            <input type="text" name="postal_code" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->postal_code; ?>"/>
        </div>
        <!--end::Input for Postal Code-->
    </div>
    <!--end::Col for Postal Code-->

    <!--begin::Col for Country-->
    <div class="col-lg-4">
        <!--begin::Label for Country-->
        <label class="col-form-label fw-semibold fs-6">Country</label>
        <!--end::Label-->
        <!--begin::Input for Country-->
        <div class="fv-row">
            <input type="text" name="country" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->country; ?>"/>
        </div>
        <!--end::Input for Country-->
    </div>
    <!--end::Col for Country-->
</div>
<!--end::Input group for State, Postal Code, and Country-->
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $fullName = $_POST['firstname'];
    $contactPhone = $_POST['phone'];
    $icNumber = $_POST['ic'];
    $gender = $_POST['gender'];
    $institution = $_POST['institution'];
    $programme = $_POST['major'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postal_code'];
    $country = $_POST['country'];

    // TODO: Validate the form data

    // TODO: Update the database with the form data

    // Redirect to the profile page after updating the database
    header('Location: ' . URLROOT . '/profiles/edit.php');
    exit;
}
?>


											
										</div>
										<!--end::Card body-->
										<!--begin::Actions-->
                                        <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-light btn-active-light-primary me-2" onclick="window.location.href='<?= URLROOT ?>/profiles/index.php'">Discard</button>
        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit" onclick="return confirmAndRedirect()">Save Changes</button>
    </div>

                                        <script>
                                            function confirmAndRedirect() {
                                                // Show a confirmation dialog
                                                var confirmed = confirm('Are you sure you want to save changes?');
                                                
                                                if (confirmed) {
                                                    // If confirmed, redirect to profiles/index.php
                                                    window.location.href = 'path/to/profiles/index.php';
                                                    return true; // Allow form submission
                                                } else {
                                                    // If not confirmed, do not submit the form
                                                    return false;
                                                }
                                            }
                                        </script>
										</div>
										<!--end::Actions-->
									<input type="hidden"></form>


                                <!--end::Row-->
                                </div>
                            
                            <!--end::Content container-->
                            </div>
                        <!--end::Content-->
                        </div>



<?php require APPROOT . '/views/includes/end_app.php'; ?>
<?php require APPROOT . '/views/includes/footer_metronic.php';?>
