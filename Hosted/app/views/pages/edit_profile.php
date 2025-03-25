<?php
                    foreach ($data['studentProfile'] as $studentProfile) :
                                    ?>
                                    <?php endforeach; ?>
                                    <div class="card mb-5 mb-xl-10">
								
                                    <?php
    require APPROOT . '/views/pages/above.php';
 ?>
 




    <div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
        <div class="card-toolbar">
        <a href="studprofile" class="btn btn-sm btn-warning align-self-center">Back</a>

        </div>
    </div>
    <div class="card-body">

                <?php
                    foreach ($data['studentProfile'] as $studentProfile) :
                                    ?>
                                    <?php endforeach; ?>
                                  
                                    <form action="<?php echo URLROOT; ?>/pages/edit_profile" method="POST" class="form" enctype="multipart/form-data" id="kt_account_profile_details_form">
    <div class="card-body border-top p-9">
        <!-- Avatar Section -->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-semibold fs-6 required">Avatar</label>
            <div class="col-lg-8">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->st_image; ?>')">
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('<?php echo URLROOT."/public/".$studentProfile->st_image; ?>')"></div>
                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-7"></i>
                        <input type="file" name="file" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="profile_avatar_remove" />
                    </label>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="ki-duotone ki-cross fs-2"></i>
                    </span>
                </div>
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                <div class="form-text">Please upload new avatar.</div>
            </div>
        </div>



											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-semibold fs-6 required">Full Name</label>
												<!--end::Label-->
												<!--begin::Col-->
                                                <div class="col-lg-8 fv-row">
                                                <input type="text" name="firstname" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->firstname; ?>"/>
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
                                                    <select name="institution" id="university" aria-label="Select a University" data-control="select2" class="form-select form-select-solid form-select-lg select2-hidden-accessible">
                                                        <option value="University of Malaya" <?php echo ($studentProfile->institution == 'University of Malaya (UM)') ? 'selected' : ''; ?>>University of Malaya (UM)</option>
                                                        <option value="Universiti Kebangsaan Malaysia" <?php echo ($studentProfile->institution == 'Universiti Kebangsaan Malaysia (UKM)') ? 'selected' : ''; ?>>Universiti Kebangsaan Malaysia (UKM)</option>
                                                        <option value="Universiti Sains Malaysia" <?php echo ($studentProfile->institution == 'Universiti Sains Malaysia (USM)') ? 'selected' : ''; ?>>Universiti Sains Malaysia (USM)</option>
                                                        <option value="Universiti Putra Malaysia" <?php echo ($studentProfile->institution == 'Universiti Putra Malaysia (UPM)') ? 'selected' : ''; ?>>Universiti Putra Malaysia (UPM)</option>
                                                        <option value="Universiti Teknologi Malaysia" <?php echo ($studentProfile->institution == 'Universiti Teknologi Malaysia (UTM)') ? 'selected' : ''; ?>>Universiti Teknologi Malaysia (UTM)</option>
                                                        <option value="Universiti Utara Malaysia" <?php echo ($studentProfile->institution == 'Universiti Utara Malaysia (UUM)') ? 'selected' : ''; ?>>Universiti Utara Malaysia (UUM)</option>
                                                        <option value="Universiti Teknologi MARA" <?php echo ($studentProfile->institution == 'Universiti Teknologi MARA (UiTM)') ? 'selected' : ''; ?>>Universiti Teknologi MARA (UiTM)</option>
                                                        <option value="International Islamic University Malaysia" <?php echo ($studentProfile->institution == 'International Islamic University Malaysia (IIUM)') ? 'selected' : ''; ?>>International Islamic University Malaysia (IIUM)</option>
                                                        <option value="Universiti Malaysia Sabah" <?php echo ($studentProfile->institution == 'Universiti Malaysia Sabah (UMS)') ? 'selected' : ''; ?>>Universiti Malaysia Sabah (UMS)</option>
                                                        <option value="Universiti Malaysia Sarawak" <?php echo ($studentProfile->institution == 'Universiti Malaysia Sarawak (UNIMAS)') ? 'selected' : ''; ?>>Universiti Malaysia Sarawak (UNIMAS)</option>
                                                        <option value="Universiti Tunku Abdul Rahman" <?php echo ($studentProfile->institution == 'Universiti Tunku Abdul Rahman (UTAR)') ? 'selected' : ''; ?>>Universiti Tunku Abdul Rahman (UTAR)</option>
                                                        <option value="Multimedia University" <?php echo ($studentProfile->institution == 'Multimedia University (MMU)') ? 'selected' : ''; ?>>Multimedia University (MMU)</option>
                                                        <option value="Taylor's University" <?php echo ($studentProfile->institution == "Taylor's University") ? 'selected' : ''; ?>>Taylor's University</option>
                                                        <option value="Sunway University" <?php echo ($studentProfile->institution == 'Sunway University') ? 'selected' : ''; ?>>Sunway University</option>
                                                        <option value="Monash University Malaysia" <?php echo ($studentProfile->institution == 'Monash University Malaysia') ? 'selected' : ''; ?>>Monash University Malaysia</option>

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
                                                <input type="text" name="major" class="form-control form-control-lg form-control-solid" value="<?php echo $studentProfile->major; ?>"/>
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
        <div class="fv-row">
    <select class="form-select form-select-lg form-select-solid" name="state">
        <option value="" <?php echo ($studentProfile->state == '') ? 'selected' : ''; ?>>Select State</option>
        <option value="Johor" <?php echo ($studentProfile->state == 'Johor') ? 'selected' : ''; ?>>Johor</option>
        <option value="Kedah" <?php echo ($studentProfile->state == 'Kedah') ? 'selected' : ''; ?>>Kedah</option>
        <option value="Kelantan" <?php echo ($studentProfile->state == 'Kelantan') ? 'selected' : ''; ?>>Kelantan</option>
        <option value="Kuala Lumpur" <?php echo ($studentProfile->state == 'Kuala Lumpur') ? 'selected' : ''; ?>>Kuala Lumpur</option>
        <option value="Labuan" <?php echo ($studentProfile->state == 'Labuan') ? 'selected' : ''; ?>>Labuan</option>
        <option value="Melaka" <?php echo ($studentProfile->state == 'Melaka') ? 'selected' : ''; ?>>Melaka</option>
        <option value="Negeri Sembilan" <?php echo ($studentProfile->state == 'Negeri Sembilan') ? 'selected' : ''; ?>>Negeri Sembilan</option>
        <option value="Pahang" <?php echo ($studentProfile->state == 'Pahang') ? 'selected' : ''; ?>>Pahang</option>
        <option value="Perak" <?php echo ($studentProfile->state == 'Perak') ? 'selected' : ''; ?>>Perak</option>
        <option value="Perlis" <?php echo ($studentProfile->state == 'Perlis') ? 'selected' : ''; ?>>Perlis</option>
        <option value="Pulau Pinang" <?php echo ($studentProfile->state == 'Pulau Pinang') ? 'selected' : ''; ?>>Pulau Pinang</option>
        <option value="Sabah" <?php echo ($studentProfile->state == 'Sabah') ? 'selected' : ''; ?>>Sabah</option>
        <option value="Sarawak" <?php echo ($studentProfile->state == 'Sarawak') ? 'selected' : ''; ?>>Sarawak</option>
        <option value="Selangor" <?php echo ($studentProfile->state == 'Selangor') ? 'selected' : ''; ?>>Selangor</option>
        <option value="Terengganu" <?php echo ($studentProfile->state == 'Terengganu') ? 'selected' : ''; ?>>Terengganu</option>
    </select>
</div>

                    </div>

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

        <!-- Submit Button -->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <input type="hidden" id="update_student" name="update_student" value="update_student">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>


    </div>

</div>