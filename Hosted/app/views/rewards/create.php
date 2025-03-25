<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
require APPROOT . '/views/includes/head_metronic.php';
require APPROOT . '/views/includes/begin_app.php';
?>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->

        <!--Content area here-->

        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title">Create Reward</h3>
                <div class="card-toolbar">
                    <a href="<?php echo URLROOT;?>/rewards" class="btn btn-second" style="background-color: #FCBD32; border-color: #FCBD32;">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form id="rewardForm" action="<?php echo URLROOT; ?>/rewards/create" method="POST">
                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="required form-label">Reward Name</label>
                        <input type="text" name="rewardName" class="form-control form-control-solid" placeholder="Reward Name" required="">
                    </div>

                    <div class="mb-10">
                        <label for="rewardCategory" class="required form-label mb-2">Reward Category</label>
                        <select id="rewardCategory" name="rewardCategory" class="form-control form-control-solid" required="" style="height: 40px;">
                            <option value="" disabled selected>Select Reward Category</option>
                            <option value="Sports Activities">Sports Activities</option>
                            <option value="Cultural Events">Cultural Events</option>
                            <option value="Outdoor Adventures">Outdoor Adventures</option>
                            <option value="Service Initiatives">Service Initiatives</option>
                            <option value="Education Empowerment">Education Empowerment</option>
                        </select>
                    </div>

                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="form-label">Reward Description</label>
                        <div class="position-relative">
                            <div class="required position-absolute top-0"></div>
                            <textarea name="description" class="form-control" aria-label="With textarea" required=""></textarea>
                        </div>
                    </div>

                    <div class="mb-10">
                        <label for="exampleFormControlInput1" class="form-label">Reward Criteria</label>
                        <div class="position-relative">
                            <div class="required position-absolute top-0"></div>
                            <textarea name="criteria" class="form-control" aria-label="With textarea" required=""></textarea>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary font-weight-bold" style="background-color: #183D64; border-color: #183D64;" onclick="showConfirmation()">Submit</button>
                </form>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Content container-->
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to submit the form?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="continueEditing()" style="background-color: #FCBD32; border-color: #FCBD32;">Continue Edit</button>
            <button type="button" class="btn btn-primary" onclick="submitForm()" style="background-color: #183D64; border-color: #183D64;">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showConfirmation() {
        $('#confirmationModal').modal('show');
    }

    function submitForm() {
        // Close the modal
        $('#confirmationModal').modal('hide');

        // Submit the form
        document.getElementById("rewardForm").submit();
    }

    function continueEditing() {
        // Close the modal
        $('#confirmationModal').modal('hide');
    }
</script>

<?php
require APPROOT . '/views/includes/end_app.php';
require APPROOT . '/views/includes/footer_metronic.php';
?>