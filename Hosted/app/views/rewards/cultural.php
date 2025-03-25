

<?php
function getRandomColor() {
    $colors = array('#183D64', '#7C1C2B', '#FCBD32');
    return $colors[array_rand($colors)];
}
?>

<div class="card shadow-sm">
    <div class="card-header">
        <span class="card-title fw-bold text-gray-900 fs-3">Cultural Events</span>
        <div class="card-toolbar">

    <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] !== 'student') {  ?>
                <a href="<?php echo URLROOT; ?>/rewards/create" class="btn btn-light-primary">Create</a>
    <?php }  ?>






        </div>
    </div>

    <div class="card-body">
        <!-- untuk display set 10,25,100 etc -->
        <div class="table-responsive">
            <input type="text" id="rewardSearch" placeholder="Search" style="max-width: 500px; width: 100%;">
            <br><br>
            <table id="kt_datatable_posts" class="table table-row-bordered gy-2">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Rewards Name</th>
                        <!-- <th class="text-center">Student</th> -->
                        <?php 
                        if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'admin') {
                        ?>
                        <th class="text-center">Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['rewards']['cultural'] as $reward): ?>
                        <tr>
                            <td>
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-8">
                                    <!--begin::Bullet-->
                                    <span class="bullet bullet-vertical h-40px" style="background-color: <?php echo getRandomColor(); ?>; margin-right: 5px;"></span>
                                    <!--end::Bullet-->

                                    <!--begin::Description-->
                                    <div class="flex-grow-1">
                                        <!-- Add data-criteria attribute with the reward criteria -->
                                        <a href="#" class="text-gray-800 fw-semibold d-block" data-toggle="modal" data-target="#rewardCriteriaModal" data-criteria="<?php echo $reward->rewardCriteria; ?>">
                                            <?php echo strtoupper($reward->rewardName); ?>
                                        </a>
                                        <span class="text-muted text-hover-primary fw-bold fs-6"><?php echo $reward->rewardDesc; ?></span>
                                        <!-- <td class="text-center"><?php echo $reward->rewardPoints; ?></td> -->
                                        <?php 
                                        if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'admin') {
                                        ?><td>
                                            <div class="btn-group btn-group-vertical">
                                                <a href="<?php echo URLROOT . "/rewards/update/" . $reward->rewardId ?>" class="btn btn-light-warning btn-sm">Update</a>
                                                <a href="<?php echo URLROOT . "/rewards/delete/" . $reward->rewardId ?>" onclick="return confirm ('Are you sure?');" class="btn btn-light-danger btn-sm">Delete</a>
                                            </div>
                                        </td>
                                        <?php } ?>
                                    </div>
                                    <!--end::Description-->
                                </div>
                                <!--end:Item-->
                            </td>
                            <?php require APPROOT . '/views/rewards/popupcriteria.php'; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- For search -->
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#kt_datatable_posts').DataTable({
            // Your DataTable configurations go here
        });

        // Handle search input
        $('#rewardSearch').on('keyup', function() {
            table.search($(this).val()).draw();
        });
    });
</script>


    </div>
</div>
