<style>
    /* Add your styles here */

    .card {
        margin-bottom: 20px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        border-radius: 10px;
    }

    .details {
        border-top: 1px solid #7C1C2B;
        padding: 20px;
        border-radius: 10px;
        background: linear-gradient(to bottom right, #7C1C2B, #5A1420);
        color: #FFFFFF;
    }

    .details p {
        margin-bottom: 10px;
    }

    .card-footer {
        border-top: 1px solid #5A1420;
        padding: 20px;
        text-align: center;
        border-radius: 0 0 10px 10px;
        background: linear-gradient(to bottom right, #5A1420, #7C1C2B);
    }

</style>

<div class="container mt-5">
    <h1 style="color: #7C1C2B; text-align: center; font-family: 'Pacifico', cursive; font-size: 2.5rem;">Registered Activities</h1>

    <div class="row">
        <?php if (!empty($data['registrations'])) : ?>
            <?php foreach ($data['registrations'] as $registration) : ?>
                <?php
                    $startDate = new DateTime($registration->act_start_date);
                    $endDate = clone $startDate;
                    $currentDate = new DateTime();
                    $isFeedbackAllowed = $currentDate >= $endDate;
                ?>

                <div class="col-md-4">
                    <div class="card h-100" style="background: linear-gradient(to bottom right, #FCBD32, #7C1C2B); color: #FFFFFF; border: none; border-radius: 10px; transition: transform 0.3s ease-in-out; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                        <div class="card-body">
                            <!-- Display relevant information about the registered activity -->
                            <h5 class="card-title" style="color: #7C1C2B; font-weight: bold;"><?php echo $registration->act_title; ?></h5>
                            <p class="card-text"><?php echo $registration->act_desc; ?></p>

                            <!-- See More Button -->
                            <button class="btn btn-primary mt-3" onclick="showMoreInfo(<?php echo $registration->act_id; ?>)">
                                See More
                            </button>

                            <!-- Hidden Details (initially) -->
                            <div id="details_<?php echo $registration->act_id; ?>" class="details" style="display: none;">
                                <hr>
                                <p><strong>Start Date:</strong> <?php echo date('Y-m-d', strtotime($registration->act_start_date)); ?></p>
                                <p><strong>Duration:</strong> <?php echo $registration->act_duration; ?> days</p>
                                <p><strong>Venue:</strong> <?php echo $registration->act_venue; ?></p>
                                <p><strong>Reward:</strong> <?php echo $registration->rewardName; ?></p>
                            </div>
                        </div>

                        <div class="card-footer">
                            <!-- "Registered At" Section -->
                            <small class="text-muted">
                                <strong>Registered At:</strong> <?php echo date('Y-m-d H:i:s', strtotime($registration->registration_date)); ?>
                            </small>

                            <div style="margin-top: 10px;">
                              
 


                                <?php if ($isFeedbackAllowed) : ?>
                                    <!-- Display the feedback button if feedback is allowed -->

                                    

                                    <a href="<?php echo URLROOT . "/activities/feedback/" . $registration->act_id; ?>" class="btn btn-primary" style="background: linear-gradient(to bottom right, #7C1C2B, #5A1420); border: none; color: #FFFFFF; text-decoration: none; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s ease-in-out; cursor: pointer;">Leave Feedback</a>
                                <?php else : ?>
                                    <!-- Display a message or any other content if feedback is not allowed -->
                                    <p style="color: #FFFFFF; font-style: italic;">Feedback will be available after the event ends.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <div class="alert alert-info" role="alert" style="background: linear-gradient(to bottom right, #7C1C2B, #5A1420); color: #FFFFFF; border: none; border-radius: 10px;">
                    No activities registered.
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

    document.addEventListener('DOMContentLoaded', function () {
        // Add event listener to all delete buttons
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var registrationId = button.getAttribute('data-registration-id');
                if (confirm('Are you sure you want to delete this registration?')) {
                    // Update this URL based on your application structure
                    var deleteUrl = '/activities' + registrationId;

                    // Perform the AJAX request or navigate to the delete URL
                    fetch(deleteUrl, {
                        method: 'POST'
                    })
                    .then(function (response) {
                        if (response.ok) {
                            // If the deletion is successful, remove the parent card element
                            var cardElement = button.closest('.card');
                            if (cardElement) {
                                cardElement.remove();
                            } else {
                                console.error('Card element not found.');
                            }
                        } else {
                            console.error('Failed to delete registration.');
                        }
                    })
                    .catch(function (error) {
                        console.error('Error:', error);
                    });
                }
            });
        });
    });
</script>
