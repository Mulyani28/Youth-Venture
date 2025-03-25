<!-- views/pages/edit_skills.php -->

<?php $skills = $this->pageModel->getSkills();?>
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
    <a href="studprofile" class="btn btn-sm btn-primary mx-2 align-self-center">Back</a>
</div>


        <!--end::Action-->
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">

        <!--begin::Row-->
                <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Spoken Language</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?php echo $skill->language; ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->


       <!--begin::Row-->
                <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Technical Skills</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?php echo $skill->technical; ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->


        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Soft Skills</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800"><?php echo $skill->soft; ?></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
</div>
</div>
											

