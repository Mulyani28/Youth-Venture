<!-- views/activities/feedbacklist.php -->

<?php require APPROOT . '/views/includes/head_metronic.php'; ?>
<?php require APPROOT . '/views/includes/begin_app.php'; ?>

<div class="container">
    <h1 class="mt-8 mb-4 text-center display-4 font-weight-bold" style="font-size: 2.5rem;">
        Feedback List for <?php echo $data['selectedActivity']->act_title; ?>
    </h1>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow: 0 8px 16px rgba(24, 61, 100, 0.1); border-radius: 15px;">
                <div class="card-body">
                    <?php if (!empty($data['feedbackList'])) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="border-color: #183D64;" id="feedbackTable">
                                <thead class="thead-dark" style="background-color: #7C1C2B; color: #FCBD32;">
                                    <tr>
                                        <th class="text-white text-center col-md-1">No</th>
                                        <th class="text-white text-center col-md-3">Name</th>
                                        <th class="col-md-2 text-white text-center col-md-1">Rating (Stars)</th>
                                        <th class="text-white text-center">Comments</th>
                                        <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['feedbackList'] as $index => $feedback) : ?>
                                        <tr>
                                            <td class="text-center font-weight-bold"><?php echo $index + 1; ?></td>
                                            <td class="text-left font-weight-bold"><?php echo strtoupper($feedback->firstname); ?></td>
                                            <td class="text-center"><?php echo $feedback->rating; ?></td>
                                            <td><?php echo $feedback->comment; ?></td>
                                            <!-- Add more cells with feedback details as needed -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <p class="text-center text-muted">No feedback available for this activity yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include DataTables and its dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<script>
    // Initialize DataTables
    $(document).ready(function () {
        $('#feedbackTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": [3] } // Disable sorting on the "Comments" column
            ],
            "order": [
                [0, 'asc'],
                [1, 'asc'], // Sort by the second column (Name) in ascending order
                [2, 'desc'] // Sort by the third column (Rating) in descending order
            ]
        });
        
    });
</script>

<?php require APPROOT . '/views/includes/end_app.php'; ?>
<?php require APPROOT . '/views/includes/footer_metronic.php'; ?>
