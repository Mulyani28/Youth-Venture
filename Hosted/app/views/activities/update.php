<?php
// Check if the form is submitted and perform the necessary actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form submission and update the activity


    // Redirect to the manage.php page
    header('Location: ' . URLROOT . '/activities');
    exit();
}
?>

<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title"><?php echo isset($data['activity']) ? 'Update Activity' : 'Create Activity'; ?></h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/activities" class="btn btn-light-primary">Manage Activities</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <form action="<?php echo URLROOT; ?>/activities/<?php echo isset($data['activity']) ? 'update/' . $data['activity']->act_id : 'create'; ?>" method="POST">
            <div class="mb-3">
                <label for="act_title" class="required form-label">Activity Title</label>
                <input type="text" name="act_title" class="form-control" value="<?php echo isset($data['activity']) ? htmlspecialchars($data['activity']->act_title) : ''; ?>" required />
            </div>

            <div class="mb-3">
                <label for="act_desc" class="required form-label">Description</label>
                <textarea name="act_desc" class="form-control" required><?php echo isset($data['activity']) ? htmlspecialchars($data['activity']->act_desc) : ''; ?></textarea>
            </div>

            <div class="row g-3">
            <div class="col-md-6">
        <label for="act_start_date" class="required form-label">Start Date and Time</label>
        <input type="datetime-local" name="act_start_date" class="form-control" 
               value="<?php echo isset($data['activity']) ? date('Y-m-d\TH:i', strtotime($data['activity']->act_start_datetime)) : date('Y-m-d\TH:i'); ?>" />
    </div>



                <div class="col-md-6">
                    <label for="act_duration" class="required form-label">Duration (days)</label>
                    <input type="number" name="act_duration" class="form-control" value="<?php echo isset($data['activity']) ? $data['activity']->act_duration : ''; ?>" />
                </div>
            </div>

            <div class="mb-3">
                <label for="act_venue" class="required form-label">Venue</label>
                <input type="text" name="act_venue" class="form-control" value="<?php echo isset($data['activity']) ? htmlspecialchars($data['activity']->act_venue) : ''; ?>" />
            </div>

            <div class="mb-3">
                <label for="rewards" class="required form-label">Select Rewards</label>
                <select name="rewardId" class="form-control" id="rewards">
                    <option value="">Select Rewards</option>
                    <?php foreach ($data['rewards'] as $reward): ?>
                        <option value="<?= $reward->rewardId ?>" <?php echo isset($data['activity']) && $reward->rewardId == $data['activity']->rewardId ? 'selected' : ''; ?>>
                            <?= $reward->rewardName ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold"><?php echo isset($data['activity']) ? 'Update' : 'Create'; ?></button>
        </form>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>