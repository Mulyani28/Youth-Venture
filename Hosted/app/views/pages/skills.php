<!-- views/pages/edit_skills.php -->
<?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student') {  ?>


<?php $users_id=$_SESSION['users_id']?>

<?php $skills = $this->pageModel->getSkills($users_id); ?>
    <?php foreach ($skills as $skill): ?>
    <?php endforeach; ?>


<div class="card mb-5 mb-xl-10">
 <!--begin::Card header-->
 <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Skills</h3>
        </div>
        <!--end::Card title-->
        <!--begin::Action-->
        <div class="d-flex justify-content-end">
    <a href="edit_skills" class="btn btn-sm btn-primary mx-2 align-self-center">Edit Skills</a>
</div>


        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">

        <!--begin::Row-->
        <div class="row mb-7">
    <label class="col-lg-4 fw-semibold text-muted">Spoken Language</label>
    <div class="fw-semibold text-gray-800 fs-6">
        <?php echo isset($skill->language) ? $skill->language : ''; ?>
    </div>
</div>

<!-- Repeat for other skill properties -->
<div class="row mb-7">
    <label class="col-lg-4 fw-semibold text-muted">Technical Skills</label>
    <div class="fw-semibold text-gray-800 fs-6">
        <?php echo isset($skill->technical) ? $skill->technical : ''; ?>
    </div>
</div>

<div class="row mb-7">
    <label class="col-lg-4 fw-semibold text-muted">Soft Skills</label>
    <div class="fw-semibold text-gray-800 fs-6">
        <?php echo isset($skill->soft) ? $skill->soft : ''; ?>
    </div>
</div>
        <!--end::Row-->
</div>
</div>
											

<?php }?>