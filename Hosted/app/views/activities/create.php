<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Create Activity</h3>
        <div class="card-toolbar">
            <?php if (true): ?>
                <a href="<?php echo URLROOT; ?>/activities" class="btn btn-primary font-weight-bold"  style="background-color: #7C1C2B;">Manage Activities</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        

        <form action="<?php echo URLROOT; ?>/activities/create" method="POST">
            <div class="mb-3">
                <label for="act_title" class="form-label required">Activity Title</label>
                <input type="text" name="act_title" class="form-control form-control-lg" placeholder="Title" required />
            </div>

            <div class="mb-3">
                <label for="act_desc" class="form-label required">Description</label>
                <textarea name="act_desc" class="form-control form-control-lg" rows="4" placeholder="Enter description"></textarea>
            </div>

            <div class="mb-3">
                <label for="rewards" class="form-label required">Select Rewards</label>
                <select name="rewardId" class="form-select form-select-lg" id="rewards">
                    <option value="">Select Rewards</option>
                    <?php foreach ($data['rewards'] as $reward): ?>
                        <option value="<?= $reward->rewardId ?>">
                            <?= $reward->rewardName ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="act_start_date" class="form-label required">Start Date and Time</label>
                    <input type="datetime-local" id="act_start_date" name="act_start_date" class="form-control form-control-lg" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="act_duration" class="form-label required">Duration (in days)</label>
                    <input type="number" id="act_duration" name="act_duration" class="form-control form-control-lg" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="act_venue" class="form-label required">Venue</label>
                <input type="text" id="act_venue" name="act_venue" class="form-control form-control-lg" required>
            </div>

            <button type="submit" class="btn btn-primary font-weight-bold" style="background-color: #7C1C2B;">Submit</button>
        </form>
    </div>
   
</div>