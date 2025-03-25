<div class="card-body pt-9 pb-0 birthday-card">

<!--begin::Details-->
<div class="d-flex flex-wrap flex-sm-nowrap">
    <!--begin: Pic-->
    <div class="me-7 mb-4">
        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
        <?php if(isset($_SESSION['st_image'])) : ?>
											<img src="<?php echo URLROOT ."/public/".$_SESSION['st_image'];?>" class="rounded-3" alt="user" />
											<?php else : ?>
												<img src="<?php echo URLROOT ?>/public/assets/media/avatars/804946.png" class="rounded-3" alt="user" />
                                                <?php endif; ?>            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
        </div>
    </div>
    <!--end::Pic-->
    <!--begin::Info-->
    <div class="flex-grow-1">
        <!--begin::Title-->
        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
            <!--begin::User-->
            <div class="d-flex flex-column">
                <!--begin::Name-->
                <div class="d-flex align-items-center mb-2">
                <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo strtoupper($studentProfile->firstname); ?></a>
                    <a href="#">
                        <i class="ki-duotone ki-verify fs-1 text-primary">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                </div>
                <!--end::Name-->
                <!--begin::Info-->
                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                    <div>
                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                    <i class="ki-duotone ki-profile-circle fs-4 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i><?php echo ucfirst($studentProfile->roles); ?></a>
                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                    <i class="ki-duotone ki-geolocation fs-4 me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        </i><?php echo $studentProfile->city; ?> , <?php echo $studentProfile->state; ?></a>
                    </div>

                    <div>
                    <a href="https://mail.google.com/mail/?view=cm&to=<?php echo $studentProfile->email; ?>" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                    <i class="ki-duotone ki-sms fs-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        </i><?php echo $studentProfile->email; ?></a>
                        <?php
                            // Assuming $studentProfile->ic is in the format 'ddMMyy'
                            $currentYear = date('Y');
                            $birthdayYear = substr($studentProfile->ic, 0, 2);
                            $birthdayMonth = substr($studentProfile->ic, 2, 2);
                            $birthdayDay = substr($studentProfile->ic, 4, 2);

                            // Calculate the full birth year
                            $fullBirthYear = '20' . $birthdayYear;

                            // Adjust the birth year if it's in the future
                            if ($fullBirthYear > $currentYear) {
                            $fullBirthYear -= 100;
                            }

                            $birthdayDate = $fullBirthYear . '-' . $birthdayMonth . '-' . $birthdayDay;
                            ?>

                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2 birthday-sparkle">
                            <img src="<?php echo URLROOT ?>/public/assets/media/logos/birthday.png" class="ki-duotone ki-profile-circle fs-4 me-1" alt="Birthday Image" width="16" height="16">
                            <?php echo $birthdayDate; ?>
                            <!-- Display the sparkles only if it's the user's birthday -->
                            <?php if (date('md') == $birthdayMonth . $birthdayDay) : ?>
                                <div class="sparkle"></div>
                            <?php endif; ?>
                            </a>

<script>
document.addEventListener('DOMContentLoaded', function () {
// Assuming birthdayMonth and birthdayDay are already defined in PHP
var birthdayMonth = <?php echo $birthdayMonth; ?>;
var birthdayDay = <?php echo $birthdayDay; ?>;

var currentDate = new Date();
var currentMonth = currentDate.getMonth() + 1; // JavaScript months are 0-indexed
var currentDay = currentDate.getDate();

if (birthdayMonth === currentMonth && birthdayDay === currentDay) {
// Add the birthday sparkle effect
var sparkleContainer = document.querySelector('.birthday-sparkle');

for (var i = 0; i < 5; i++) {
var sparkle = document.createElement('div');
sparkle.className = 'sparkle';
sparkle.style.left = Math.random() * 100 + '%';
sparkle.style.animationDuration = (Math.random() * 1 + 0.5) + 's';
sparkleContainer.appendChild(sparkle);
}
}
});
</script>

                </div>
                <!-- <div>
<img src="https://i.ebayimg.com/images/g/2m4AAOSwsj5jhaIP/s-l1600.jpg" alt="Image" style="width: 8%;">
</div> -->
                <!--end::Info-->
            </div>



            <!--end::User-->
            
        </div>
        <!--end::Title-->
        <!--begin::Stats-->

    </div>
    <!--end::Info-->

</div>
<!--end::Details-->

<!--begin::Navs-->
</div>

</div>


</div>
