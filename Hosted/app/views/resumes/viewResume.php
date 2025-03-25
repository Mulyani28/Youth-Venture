<!-- viewResume.php

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Resume</title>
</head>
<body>

<div class="container mt-5">
    <h1 style="text-align: center; color: #7C1C2B;">User Profile</h1>

    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">User Information</h3>
        </div>
        <div class="card-body">

            <ul>
                <li><strong>First Name:</strong> <?php echo strtoupper($data['firstname']); ?></li>
                <li><strong>Institution:</strong> <?php echo $data['institution']; ?></li>
                <li><strong>Email:</strong> <?php echo $data['email']; ?></li>
                <li><strong>IC Number:</strong> <?php echo $data['ic']; ?></li>
                <li><strong>Street:</strong> <?php echo $data['street']; ?></li>
                <li><strong>City:</strong> <?php echo $data['city']; ?></li>
                <li><strong>State:</strong> <?php echo $data['state']; ?></li>
                <li><strong>Postal Code:</strong> <?php echo $data['postal_code']; ?></li>
                <li><strong>Country:</strong> <?php echo $data['country']; ?></li>
                <li><strong>Phone:</strong> <?php echo $data['phone']; ?></li>
                <li><strong>Major:</strong> <?php echo $data['major']; ?></li>
                <li><strong>Student Image:</strong> <?php echo $data['st_image']; ?></li>
            </ul>

        </div>
    </div>

</div>

</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      list-style: none;
      font-family: "Montserrat", sans-serif;
    }

    
    body {
      background: #585c68;
      font-size: 14px;
      line-height: 22px;
      color: #FCBD32;
    }

    .bold {
      font-weight: 700;
      font-size: 20px;
      text-transform: uppercase;
    }

    .semi-bold {
      font-weight: 500;
      font-size: 16px;
    }

    .resume {
      width: 800px;
      height: auto;
      display: flex;
      margin: 50px auto;
      position: relative; /* Add relative positioning for logo placement */
    }

    .resume .resume_left {
      width: 280px;
      background: #7C1C2B;
      position: relative;
    }

    .resume .resume_left .resume_profile {
      width: 100%;
      height: 280px;
    }

    .resume .resume_left .resume_profile img {
      width: 100%;
      height: 100%;
    }

    .resume .resume_left .resume_content {
      padding: 0 25px;
    }

    .resume .title {
      margin-bottom: 20px;
    }

    .resume .resume_left .bold {
      color: #fff;
    }

    .resume .resume_left .regular {
      color: #b1eaff;
    }

    .resume .resume_item {
      padding: 25px 0;
      border-bottom: 2px solid #b1eaff;
    }

    .resume .resume_left .resume_item:last-child,
    .resume .resume_right .resume_item:last-child {
      border-bottom: 0px;
    }

    .resume .resume_left ul li {
      display: flex;
      margin-bottom: 10px;
      align-items: center;
    }

    .resume .resume_left ul li:last-child {
      margin-bottom: 0;
    }

    .resume .resume_left ul li .icon {
      width: 35px;
      height: 35px;
      background: #fff;
      color: #0bb5f4;
      border-radius: 50%;
      margin-right: 15px;
      font-size: 16px;
      position: relative;
    }

    .resume .icon i,
    .resume .resume_right .resume_hobby ul li i {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .resume .resume_left ul li .data {
      color: #b1eaff;
    }

    .resume .resume_left .resume_skills ul li {
      display: flex;
      margin-bottom: 10px;
      color: #b1eaff;
      justify-content: space-between;
      align-items: center;
    }

    .resume .resume_left .resume_skills ul li .skill_name {
      width: 25%;
    }

    .resume .resume_left .resume_skills ul li .skill_progress {
      width: 60%;
      margin: 0 5px;
      height: 5px;
      background: #009fd9;
      position: relative;
    }

    .resume .resume_left .resume_skills ul li .skill_per {
      width: 15%;
    }

    .resume .resume_left .resume_skills ul li .skill_progress span {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      background: #fff;
    }

    .resume .resume_left .resume_social .semi-bold {
      color: #fff;
      margin-bottom: 3px;
    }

    .resume .resume_right {
      width: 520px;
      background: #fff;
      padding: 25px;
    }

    .resume .resume_right .bold {
      color: #0bb5f4;
    }

    .resume .resume_right .resume_work ul,
    .resume .resume_right .resume_education ul {
      padding-left: 40px;
      overflow: hidden;
    }

    .resume .resume_right ul li {
      position: relative;
    }

    .resume .resume_right ul li .date {
      font-size: 16px;
      font-weight: 500;
      margin-bottom: 15px;
      color: #0bb5f4; /* Adjust text color on the right side */
    }

    .resume .resume_right ul li .info {
      margin-bottom: 20px;
      color: #555; /* Adjust text color on the right side */
    }

    .resume .resume_right ul li:last-child .info {
      margin-bottom: 0;
    }

    .resume .resume_right .resume_work ul li:before,
    .resume .resume_right .resume_education ul li:before {
      content: "";
      position: absolute;
      top: 5px;
      left: -25px;
      width: 6px;
      height: 6px;
      border-radius: 50%;
      border: 2px solid #0bb5f4;
    }

    .resume .resume_right .resume_work ul li:after,
    .resume .resume_right .resume_education ul li:after {
      content: "";
      position: absolute;
      top: 14px;
      left: -21px;
      width: 2px;
      height: 115px;
      background: #0bb5f4;
    }

    .resume .resume_right .resume_hobby ul {
      display: flex;
      justify-content: space-between;
    }

    .resume .resume_right .resume_hobby ul li {
      width: 80px;
      height: 80px;
      border: 2px solid #0bb5f4;
      border-radius: 50%;
      position: relative;
      color: #0bb5f4;
    }

    .resume .resume_right .resume_hobby ul li i {
      font-size: 30px;
    }

    .resume .resume_right .resume_hobby ul li:before {
      content: "";
      position: absolute;
      top: 40px;
      right: -52px;
      width: 50px;
      height: 2px;
      background: #0bb5f4;
    }

    .resume .resume_right .resume_hobby ul li:last-child:before {
      display: none;
    }

    .youth-venture-logo {
      position: absolute;
      top: 10px;
      right: 10px;
      width: 60px;
      height: 40px;
    }
  </style>
</head>

<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<body>


<!-- // -->
<div class="resume">
  <div class="resume_left">
    <div class="resume_profile">
    <?php if(isset($_SESSION['st_image'])) : ?>

    <img src="<?php echo URLROOT ."/public/".$_SESSION['st_image'];?>" alt="Profile Picture">
    <?php else : ?>
                <img src="<?php echo URLROOT ?>/public/assets/media/avatars/804946.png" class="rounded-3" alt="image" />
                <?php endif; ?>

    </div>
    <div class="resume_content">
      <div class="resume_item resume_info">
        <div class="title">
        <h1 class="name"><?php echo strtoupper($data['firstname']); ?></h1>
        <h2 class="institute"><?php echo $data['institution']; ?></h2>
        </div>
        <ul>
          <li>
            <div class="icon">
              <i class="fas fa-map-signs"></i>
            </div>
            <div class="data">
                <?php echo strtoupper($data['street']) . ', ' . strtoupper($data['city']) . ', ' . strtoupper($data['state']) . ' ' . strtoupper($data['postal_code']) . ', ' . strtoupper($data['country']); ?>
            </div>

          </li>
          <!-- Add other information here -->
        </ul>
      </div>
      <!-- <div class="resume_item resume_skills">
        <div class="title">
          <p class="bold">skill's</p>
        </div>
        <ul>
           Add skill items here 
        </ul>
      </div> -->
      <div class="resume_item resume_social">
        <div class="title">
          <p class="bold">Contact</p>
        </div>
        <ul>
        <p style="color: #ffff;"><?php echo 'Tel: ' . $data['phone']; ?></p>
            <p style="color: #ffff;"><?php echo 'Email: ' . $data['email']; ?></p>
        </ul>
        </ul>
      </div>
    </div>
  </div>
  <div class="resume_right">
    <div class="resume_item resume_about">
      <div class="title">
        <p class="bold">About Me</p>
        </div>

        <p style="color: #000;"><?php echo 'NAME : ' . strtoupper($data['firstname']); ?></p>
        <p style="color: #000;"><?php echo 'GENDER : ' . ucfirst($data['gender']); ?></p>
        <p style="color: #000;"><?php echo 'IC: ' . $data['ic']; ?></p>
        <p style="color: #000;"><?php echo 'BIRTHDAY: ' . $data['birthday']; ?></p>

        </div>
    <div class="resume_item resume_work">
      <div class="title">
        <p class="bold">Education</p>
      </div>
      <ul>

        <p style="color: #000;"><?php echo 'INSTITUTE : ' . strtoupper($data['institution']); ?></p>
        <p style="color: #000;"><?php echo 'PROGRAMME : ' . strtoupper($data['major']); ?></p>

      </ul>
    </div>
    <div class="resume_item resume_education">
      <div class="title">
        <p class="bold">Activity</p>
      </div>
      <ul>
      <?php if (isset($data['activitiesData']) && is_array($data['activitiesData'])) : ?>
            <?php foreach (($data['activitiesData']) as $activity) : ?>

                <li style="color: #000;"><?php echo strtoupper($activity->act_title); ?> - <?php echo strtoupper($activity->rewardName); ?></li>

            <?php endforeach; ?>
        <?php else : ?>
            <li style="color: #000;">No activities data available</li>
        <?php endif; ?>
   </ul>
    </div>
    <div class="resume_item resume_hobby">
      <div class="title">
        <p class="bold">Skills</p>
      </div>
      <ul>

      <p style="color: #000;"><?php echo 'LANGUAGE : ' . strtoupper($data['language']); ?></p>
        <p style="color: #000;"><?php echo 'TECHNICAL : ' . strtoupper($data['technical']); ?></p>
        <p style="color: #000;"><?php echo 'SOFT: ' . strtoupper($data['soft']); ?></p>

   </ul>
  
   <img class="youth-venture-logo" src="<?php echo URLROOT ?>/public/img/logoyou.png" alt="Youth Venture Logo">
    </div>

  </div>
  <!-- <a href="resumes/viewResume" download >   -->
  <!-- <a href="downloadpdf.pdf" download="resume.pdf" width="104" height="142"> Download </a>     -->
  <!-- <a href="downloadpdf.php" download="resume.pdf" width="104" height="142"> Download </a> -->
  <!-- <button id="downloadButton">Download Resume</button> -->

</div>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<script src="path/to/html2pdf.bundle.js">
    document.getElementById('downloadButton').addEventListener('click', function() {
      var element = document.getElementById('resume');
      html2pdf(element);
    });
  </script>
</body>
</html>