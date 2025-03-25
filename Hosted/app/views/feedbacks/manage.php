<div class="card shadow-sm">
    <div class="card-header">
        <h3 class="card-title">Manage Feedback</h3>
        <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
                <a href="<?php echo URLROOT; ?>/feedback/create" class="btn btn-light-primary">Give Feedback</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_feedback" class="table table-row-bordered gy-5">
                <thead>
                    <tr class="fw-semibold fs-6 text-muted">
                        <th>Event Title</th>
                        <th>Event Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['feedback'] as $index => $feedback): ?>
    <tr>
        <td><?php echo $data['feedbacksactivity'][$index]->act_title; ?></td>
        <td><?php echo date('F j h:m', strtotime($data['feedbacksactivity'][$index]->act_datetime)); ?></td>
        <td>
            <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] === 'student'): ?>
                <a href="<?php echo URLROOT . "/feedbacks/create/" . $data['feedbacksactivity'][$index]->act_id ?>" class="btn btn-light-warning">Add Feedback</a>
            <?php else: ?>
                <a href="<?php echo URLROOT . "/feedbacks/update/" . $data['feedbacksactivity'][$index]->act_id ?>" class="btn btn-light-warning">View Student Feedback</a>
            <?php endif; ?>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt<?php //echo $feedback->id ?>">
                Delete
            </button>

            <div class="modal fade" tabindex="-1" id="kt<?php //echo $feedback->id ?>">
                <!-- Modal content for deletion confirmation -->
                <!-- ... (similar to the post management modal) ... -->
            </div>
        </td>
    </tr>
<?php endforeach; ?>


                </tbody>
            </table>
        </div>
        <!-- Include DataTables script if not already included -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                var table = $('#kt_datatable_feedback').DataTable({
                    // Add any DataTable options if needed
                });
            });
        </script>
    </div>

</div>
