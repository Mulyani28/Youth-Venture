<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Activities</title>
    <!-- Add your CSS links and DataTables CSS here -->

    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add DataTables JavaScript and CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<style>
   
    .text-center {
        text-align: center;
    }

    .btn-light-info:focus,
.btn-light-info:active,
.btn-light-danger:focus,
.btn-light-danger:active {
    background-color: #183D64;
    color: white;}

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        font-size: 14px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-size: 12px;
        padding: 5px 10px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #7C1C2B;
        color: white;
    }

      /* Custom styles to fix table size */
      .table-wrapper {
        overflow-x: auto;
    }

    /* Custom styles to display only date for Start Date */
    .date-column {
        white-space: nowrap;
    }
</style>

</style>
<body>

    <div class="card shadow-sm">
        <div class="card-header" style="background-color: #183D64; color: white;">
            <h3 class="card-title text-white">Manage Activities</h3>
            <div class="card-toolbar">
                <?php if(isLoggedIn()): ?>
                    <a href="<?php echo URLROOT;?>/activities/create" class="btn btn-light-primary" style="background-color: #7C1C2B;">Create</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="globalSearch" class="form-label">Search Activities</label>
                <input type="text" id="globalSearch" class="form-control" placeholder="Type to search">
            </div>

            <div class="table-wrapper">
                <table id="kt_datatable_posts" class="table table-row-bordered gy-5">
                    <thead style="background-color: #7C1C2B; color: white; ">
                        <tr class="fw-semibold fs-6 text-muted text-white text-center">
                            <th class="text-center font-weight-bold text-center" style="width: 50px;">No</th>
                            <th class="text-center font-weight-bold text-center">Title</th>
                            <th class="text-center font-weight-bold text-center">Description</th>
                            <th class="text-center font-weight-bold text-center ">Start Date</th>
                            <th class="text-center font-weight-bold text-center">Details</th>
                            <th class="text-center font-weight-bold text-center">Action</th>
                            <th class="text-center font-weight-bold text-center">About</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['allActivities'] as $index => $activity): ?>
                            <tr style="background-color: <?php echo $index % 2 == 0 ? '#FFF' : '#FCBD32'; ?>;">
                                <td class="text-center font-weight-bold text-center"><?php echo $index + 1; ?></td>
                                <td><?php echo $activity->act_title; ?></td>
                                <td><?php echo $activity->act_desc; ?></td>
                                <td class="text-center font-weight-bold text-center date-column">
                <?php
                $startDate = new DateTime($activity->act_start_date);
                echo $startDate->format('d-m-Y');
                ?>
            </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#details<?php echo $activity->act_id?>" style="color: #7C1C2B; text-decoration: underline;">Details</a>
                                    
                                    <!-- Details Modal -->
                                    <div class="modal fade" tabindex="-1" id="details<?php echo $activity->act_id?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Activity Details</h3>
                                                    <div class="btn btn-icon btn-sm btn-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                    <p><strong>Title:</strong> <?php echo $activity->act_title; ?></p>
                                                    <p><strong>Description:</strong> <?php echo $activity->act_desc; ?></p>
                                                    <p><strong>Start Date:</strong> <?php echo $activity->act_start_date; ?></p>
                                                    <p><strong>Duration(days):</strong> <?php echo $activity->act_duration; ?></p>
                                                    <p><strong>Venue:</strong> <?php echo $activity->act_venue; ?></p>
                                                    <p><strong>Reward:</strong> <?php echo $activity->rewardName; ?></p>
                                                    <!-- Add more details as needed -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                <?php if ($_SESSION['roles'] == "client" && $_SESSION['users_id'] == $activity->users_id): ?>
    <a href="<?php echo URLROOT . "/activities/update/" . $activity->act_id ?>" class="btn btn-light-info text-white" style="background-color: #183D64;">Update</a>
    <a href="#" data-bs-toggle="modal" data-bs-target="#delete<?php echo $activity->act_id?>" class="btn btn-light-danger text-white" style="background-color: #183D64;">Delete</a>
<?php elseif ($_SESSION['roles'] == "admin"): ?>
    <a href="<?php echo URLROOT . "/activities/update/" . $activity->act_id ?>" class="btn btn-light-info text-white" style="background-color: #183D64;">Update</a>
    <a href="#" data-bs-toggle="modal" data-bs-target="#delete<?php echo $activity->act_id?>" class="btn btn-light-danger text-white" style="background-color: #183D64;">Delete</a>
<?php else: ?>
    <span class="text-muted">Action not available</span>
<?php endif; ?>


                                    
                                    <!-- Delete Activity Modal -->
                                    <div class="modal fade" tabindex="-1" id="delete<?php echo $activity->act_id?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Delete Activity</h3>
                                                    <div class="btn btn-icon btn-sm btn-light-danger ms-2" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                    </div>
                                                </div>

                                                <div class="modal-body">
                                                    Are you sure want to delete this activity?
                                                </div>

                                                <div class="modal-footer">
                                                    <!-- Form for Deletion -->
                                                    <form action="<?php echo URLROOT . "/activities/delete/" . $activity->act_id; ?>" method="POST">
                                                        <button type="submit" class="btn btn-danger font-weight-bold" style="color: #7C1C2B;">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo URLROOT . "/activities/registrants/" . $activity->act_id ?>" style="color: #183D64; text-decoration: underline;">Registrants</a>
                                    <a href="<?php echo URLROOT . "/activities/feedbacklist/" . $activity->act_id ?>" style="color: #183D64; text-decoration: underline;">Feedbacks</a>

                                    

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <!-- DataTables initialization script -->
    <script>
       $(document).ready(function () {
        var table = $('#kt_datatable_posts').DataTable({
            "searching": true,
            "order": [],
            "columnDefs": [
                { "className": "text-center", "targets": "_all" }, // Set text-center class for all columns
                { "orderable": false, "targets": [ 4, 5, 6] } // Disable sorting for the 4th, 5th, 6th, and 7th columns
            ]
        });

        $('#globalSearch').keyup(function () {
            table.search($(this).val()).draw();
        });
    });

    </script>

</body>

</html>
