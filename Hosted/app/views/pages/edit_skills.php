<?php require APPROOT . '/views/includes/head_metronic.php';?>
<?php require APPROOT . '/views/includes/begin_app.php';?>

<?php foreach ($data['studentProfile'] as $studentProfile) : ?>
<?php endforeach; ?>

<div class="card mb-5 mb-xl-10">
    <?php require APPROOT . '/views/pages/above.php'; ?>

    <!-- views/pages/edit_skills.php -->
    <?php $users_id=$_SESSION['users_id']?>

    <?php $skills = $this->pageModel->getSkills($users_id); ?>
    <?php foreach ($skills as $skill): ?>
    <?php endforeach; ?>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Edit Skills</h3>
            </div>
            <div class="d-flex justify-content-end">
                <a href="studprofile" class="btn btn-sm btn-primary mx-2 align-self-center">Back</a>
            </div>
        </div>
        <div class="card-body p-9">

            <!-- Editable form -->
<!-- Other HTML code -->
<form id="editSkillsForm" action="<?php echo URLROOT; ?>/pages/edit_skills" method="post">
    <?php foreach ($data['skills'] as $skill): ?>
        <!-- Spoken Language -->
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">Spoken Language <span style="color: red;">*</span></label>
            <div class="col-lg-8">
                <input type="text" name="language" class="form-control" value="<?php echo $skill->language; ?>" required>
            </div>
        </div>

        <!-- Technical Skills -->
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">Technical Skills <span style="color: red;">*</span></label>
            <div class="col-lg-8">
                <input type="text" name="technical" class="form-control" value="<?php echo $skill->technical; ?>" required>
            </div>
        </div>

        <!-- Soft Skills -->
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">Soft Skills <span style="color: red;">*</span></label>
            <div class="col-lg-8">
                <input type="text" name="soft" class="form-control" value="<?php echo $skill->soft; ?>" required>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Add more fields as needed -->

    <!-- Submit button -->
    <div class="row mb-7">
        <div class="col-lg-8 offset-lg-4">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </div>
</form>



<!-- Other HTML code -->

<!-- JavaScript code to handle form submission (as you're using jQuery) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#editSkillsForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    // Handle the response, e.g., show a success message
                    console.log(response);

                    // Redirect to pages/studprofile
                    window.location.href = '<?php echo URLROOT; ?>/pages/studProfile';
                },
                error: function (error) {
                    // Handle the error, e.g., show an error message
                    console.error(error);
                }
            });
        });
    });
</script>

<!-- Other HTML code -->

            <!-- End editable form -->

        </div>
    </div>
</div>

<script>
    function saveChanges() {
        $.ajax({
            type: 'POST',
            url: '<?php echo URLROOT; ?>/pages/edit_skills',
            data: $('#editSkillsForm').serialize(),
            success: function(response) {
                console.log(response);
                // Handle success, you might want to show a success message
            },
            error: function(error) {
                console.error(error);
                // Handle error, show an error message
            }
        });
    }
</script>


<?php require APPROOT . '/views/includes/end_app.php'; ?>
<?php require APPROOT . '/views/includes/footer_metronic.php'; ?>
