<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Update Feedback</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/feedback" class="btn btn-light-primary">Manage Feedback</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/feedback/update/<?php echo $data['feedback']->id ?>" method="POST">
            <div class="mb-10">
                <label for="exampleFormControlInput1" class="required form-label">Event Title</label>
                <input type="text" name="event_title" class="form-control form-control-solid"
                    value="<?php echo $data['feedback']->event_title ?>" required />
            </div>

            <div class="mb-10">
                <label for="exampleFormControlInput1" class="form-label">Your Feedback</label>
                <div class="position-relative">
                    <div class="required position-absolute top-0"></div>
                    <textarea name="feedback_comment" class="form-control" aria-label="With textarea"
                        required><?php echo $data['feedback']->comment;?></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold">Submit Feedback</button>
        </form>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>