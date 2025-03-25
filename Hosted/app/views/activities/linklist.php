<!-- Inside app/views/activities/linklist.php -->
<?php
require APPROOT . '/views/includes/head_metronic.php';
?>

<?php
require APPROOT . '/views/includes/begin_app.php';
?>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #FFFFFF;
    }

    .container {
        margin-top: 40px;
    }

    h1 {
        text-align: center;
        font-family: 'Pacifico', cursive;
        font-size: 2.5rem;
        color: #FCBD32;
        margin-bottom: 30px;
    }

    .card {
        color: #FFFFFF;
        font-size: 16px;
        border: none;
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background: linear-gradient(to bottom right, #FCBD32, #7C1C2B);
        
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 10px;
        color: #FFFFFF;
    }

    .card-text {
        font-size: 1.4rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .btn-primary {
        background: linear-gradient(to bottom right, #7C1C2B, #5A1420);
        border: none;
        color: #FFFFFF;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background: linear-gradient(to bottom right, #5A1420, #7C1C2B);
    }

    .alert-info {
        margin-top: 20px;
        border: none;
        color: #FFFFFF;
        background: linear-gradient(to bottom right, #7C1C2B, #5A1420);
    }

    .details {
        border-top: 1px solid #7C1C2B;
        padding: 20px;
        border-radius: 10px;
        background: linear-gradient(to bottom right, #7C1C2B, #5A1420);
        color: #FFFFFF;
        transition: background-color 0.3s ease-in-out;
    }
    .details p {
        margin-bottom: 10px;
    }
    .details p strong {
        color: #FCBD32;
    }
    .card-footer {
        border-top: 1px solid #5A1420;
        padding: 20px;
        text-align: center;
        background: linear-gradient(to bottom right, #5A1420, #7C1C2B);
    }
</style>

<div class="container">
    <h1 style="color: #7C1C2B; text-align: center; font-family: 'Pacifico', cursive; font-size: 2.5rem;">Available Activities</h1>

    <div class="row">
        <?php if (!empty($data['activities'])) : ?>
            <?php foreach ($data['activities'] as $activity) : ?>
             <?php    $currentDate = strtotime(date('Y-m-d'));
                $activityStartDate = strtotime($activity->act_start_date);
                
                // Check if the activity is in the future
                if ($activityStartDate > $currentDate) :
                ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $activity->act_title; ?></h5>
                            <p class="card-text"><?php echo $activity->act_desc; ?></p>

                            <!-- See More Button -->
                            <button class="btn btn-primary mt-3" onclick="showMoreInfo(<?php echo $activity->act_id; ?>)">
                                See More
                            </button>

                            <!-- Hidden Details (initially) -->
                            <div id="details_<?php echo $activity->act_id; ?>" class="details" style="display: none;">
                                <hr>
                                <p><strong>Start Date:</strong> <?php echo date('d-m-Y', strtotime($activity->act_start_date)); ?></p>
                                <p><strong>Duration:</strong> <?php echo $activity->act_duration; ?> Days</p>
                                <p><strong>Venue:</strong> <?php echo $activity->act_venue; ?></p>
                                <p><strong>Reward:</strong> <?php echo $activity->rewardName; ?></p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <strong>Created At:</strong> <?php echo date('Y-m-d H:i:s', strtotime($activity->act_datetime)); ?>
                            </small>
                            <br>
                            <a href="<?php echo URLROOT; ?>/activities/register/<?php echo $activity->act_id; ?>"
                                onclick="return confirm('Are you sure you want to register?');"
                                class="btn btn-primary mt-3">
                                Register here
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    No activities available.
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>


<script>
    function showMoreInfo(activityId) {
        var detailsDiv = document.getElementById('details_' + activityId);
        if (detailsDiv.style.display === 'none') {
            detailsDiv.style.display = 'block';
        } else {
            detailsDiv.style.display = 'none';
        }
    }

    
</script>

<?php
require APPROOT . '/views/includes/end_app.php';
?>

<?php
require APPROOT . '/views/includes/footer_metronic.php';
?>
