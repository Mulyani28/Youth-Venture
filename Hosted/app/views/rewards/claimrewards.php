<!-- views/rewards/claimrewards.php -->

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
require APPROOT . '/views/includes/head_metronic.php';
require APPROOT . '/views/includes/begin_app.php';?>

<div class="row">
<?php if ($_SESSION['roles'] !== 'student') {?>

    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Claimed Rewards List</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <a href="rewards/index" class="btn btn-sm btn-primary align-self-center">Back</a>
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">

            <table id="kt_datatable_posts" class="table table-row-bordered gy-2">

            <form id="searchForm">
        <div class="mb-3 row">
            <div class="col">
                <input type="text" class="form-control" id="rewardSearch" name="rewardSearch" placeholder="Search by Reward Name or Student Name" style="max-width: 500px; width: 100%;">
            </div>
            <br><br>
        </div>
    </form>

                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Rewards Name</th>
                        <th class="text-left">Student Name</th>
                        <?php if ($_SESSION['roles'] !== 'student') {?>

                        <!-- <th class="text-center">Action</th> -->
                        <?php } ?>

                    </tr>
                </thead>
                <tbody>
                <?php
$displayedRewardNames = array(); // To keep track of displayed reward names

foreach ($data['claimRewardId'] as $claimReward) :
    $usersId = $claimReward->users_id;
    $rewardName = $claimReward->rewardName;

    // Initialize the array for the users_id if not already set
    if (!isset($displayedRewardNames[$usersId])) {
        $displayedRewardNames[$usersId] = array();
    }

    // Check if the rewardName for this users_id has already been displayed
    if (!in_array($rewardName, $displayedRewardNames[$usersId])) :
?>
    <tr>
        <td><?php echo strtoupper($rewardName); ?></td>
        <td class="text-left"><?php echo strtoupper($claimReward->firstname); ?></td>
        <td class="text-center">
            <?php if ($_SESSION['roles'] !== 'student') : ?>
                <!-- <a href="<?php echo URLROOT . "/rewards/deleteclaim/" . $claimReward->claimRewardId; ?>" onclick="return confirm('Are you sure?');" class="btn btn-light-danger btn-sm">Delete</a> -->
            <?php endif; ?>
        </td>
    </tr>
<?php
        // Add the displayed rewardName to the list
        $displayedRewardNames[$usersId][] = $rewardName;
    endif;
endforeach;
?>


                </tbody>
            </table>

        </div>
    </div>

</div>
<script>
    // Get the input element
    var rewardSearchInput = document.getElementById('rewardSearch');

    // Attach an input event listener to the input element
    rewardSearchInput.addEventListener('input', function () {
        // Get the search value
        var rewardSearch = rewardSearchInput.value.toLowerCase();

        // Loop through each row in the table
        var table = document.getElementById('kt_datatable_posts');
        var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        for (var i = 0; i < rows.length; i++) {
            var rewardName = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();
            var firstname = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();

            // Check if either rewardName or firstname contains the search term
            if (rewardName.includes(rewardSearch) || firstname.includes(rewardSearch)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>


<?php } else { ?>

<div class="row">
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer d-flex justify-content-between align-items-center">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Claimed Rewards </h3>
            </div>
            <!--end::Card title-->

            <?php
            // Calculate and display the count of rewards
            $displayedRewardNames = array(); // To keep track of displayed reward names
            $countRewards = 0;
            
            foreach ($data['studentReward'] as $claimReward) :
                if ($_SESSION['users_id'] == $claimReward->users_id) :
                    $rewardName = $claimReward->rewardName;
            
                    // Initialize the array for the users_id if not already set
                    if (!isset($displayedRewardNames[$_SESSION['users_id']])) {
                        $displayedRewardNames[$_SESSION['users_id']] = array();
                    }
            
                    // Check if the rewardName for this users_id has already been displayed
                    if (!in_array($rewardName, $displayedRewardNames[$_SESSION['users_id']])) :
                        ?>
                        <tr>
                            <!-- <td class="fw-bold fs-6 fw-semibold text-muted"><?php echo $claimReward->rewardDesc; ?></td> -->
                        </tr>
                        <?php
                        // Add the displayed rewardName to the list
                        $displayedRewardNames[$_SESSION['users_id']][] = $rewardName;
                        $countRewards++;
                    endif;
                endif;
            endforeach;
            ?>
            
            <!-- Display the count of rewards after the loop -->
            <div>
            <div>
            <?php echo '<span class="fw-bold fs-6 fw-semibold text-muted">(' . $countRewards . ' rewards)</span>'; ?>
            </div></div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body p-9">
            <?php if (!empty($data['studentReward'])) : ?>
                <table id="kt_datatable_posts" class="table table-row-bordered gy-2">
                    <tbody>
                        <?php
                        $claimRewards = $this->rewardModel->getAllClaimRewards();
                        $displayedRewardNames = array(); // To keep track of displayed reward names
                        
                        foreach ($data['studentReward'] as $claimReward) :
                            if ($_SESSION['users_id'] == $claimReward->users_id) :
                                $rewardName = $claimReward->rewardName;
                        
                                // Initialize the array for the users_id if not already set
                                if (!isset($displayedRewardNames[$_SESSION['users_id']])) {
                                    $displayedRewardNames[$_SESSION['users_id']] = array();
                                }
                        
                                // Check if the rewardName for this users_id has already been displayed
                                if (!in_array($rewardName, $displayedRewardNames[$_SESSION['users_id']])) :
                        ?>
                                    <tr>
                                        <td class="fw-bold fs-6 text-gray-800"><?php echo $rewardName; ?></td>
                                        <!-- <td class="fw-bold fs-6 fw-semibold text-muted"><?php echo $claimReward->rewardDesc; ?></td> -->

                                    </tr>
                        <?php
                                    // Add the displayed rewardName to the list
                                    $displayedRewardNames[$_SESSION['users_id']][] = $rewardName;
                                endif;
                            endif;
                        endforeach;
                        ?>
                        
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php } ?>
<?php
require APPROOT . '/views/includes/end_app.php';
require APPROOT . '/views/includes/footer_metronic.php';
?>
