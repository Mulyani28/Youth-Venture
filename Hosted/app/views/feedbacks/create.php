<?php require APPROOT . '/views/includes/head_metronic.php';?>
<?php require APPROOT . '/views/includes/begin_app.php';?>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Give Feedback</h3>
        <div class="card-toolbar">
            <?php if (isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/feedback" class="btn btn-light-primary">View Feedback</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <?php if (isset($data['success'])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $data['success']; ?>
            </div>
        <?php endif; ?>

       

        <form action="<?php echo URLROOT; ?>activities/feedback/<?php echo isset($data['feedbacksactivity']->act_id) ? $data['feedbacksactivity']->act_id : ''; ?>" method="POST">
            <div class="mb-10">
            <label for="exampleFormControlInput1" class="required form-label">Activity Title: <?php echo $data['feedbacksactivity']; ?></label>

                  
            </div>

            <!-- Hidden input for act_id -->
            <input type="hidden" name="act_id" value="<?php echo isset($data['feedbacksactivity']->act_id) ? $data['feedbacksactivity']->act_id : ''; ?>">

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Your Feedback</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <textarea name="comment" class="form-control" aria-label="With textarea" required></textarea>
                </div>
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Rating</label>
                <select name="rating" class="form-select" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>

            <button type="submit" name="submit_feedback" class="btn btn-primary font-weight-bold">Submit Feedback</button>
        </form>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>

<?php require APPROOT . '/views/includes/end_app.php'; ?>
<?php require APPROOT . '/views/includes/footer_metronic.php';?>
