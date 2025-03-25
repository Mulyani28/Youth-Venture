<!-- activities/registrants.php -->
<?php require APPROOT . '/views/includes/head_metronic.php'; ?>
<?php require APPROOT . '/views/includes/begin_app.php'; ?>

<div class="container">
<h1 class="mt-4 mb-4 text-center display-4 font-weight-bold " style="font-size: 2.5rem;">
        Registrants List for <?php echo $data['selectedActivity']->act_title; ?>
    </h1>
    <div class="text-center mt-3">
    <!-- <button class="btn btn-success" id="generatePdfBtn">Generate Student List</button> -->

<!-- Add a link to generate the student list PDF -->
<!-- <a href="pdfRegistrants.php" class="btn btn-light-primary" style="background-color: #7C1C2B;">Generate List</a> -->
    </div>

<script>
    $(document).ready(function () {
        // Handle click on the "Generate Student List" button
        $('#generatePdfBtn').on('click', function () {
            // Create an array to store the data for each row
            var dataRows = <?php echo json_encode($data['registrants']); ?>;

            // Create PDF using jsPDF
            var doc = new jsPDF();
            doc.setFontSize(16);
            doc.text('Registrants List for <?php echo $data['selectedActivity']->act_title; ?>', 20, 20);

            // Set column headers
            var headers = ['No', 'Name', 'Gender', 'Phone', 'Email', 'Address', 'Institution', 'Programme'];

            // Set table position
            var x = 20;
            var y = 30;

            // Draw column headers
            doc.setFontStyle('bold');
            for (var i = 0; i < headers.length; i++) {
                doc.text(headers[i], x, y);
                x += 40;
            }

            // Reset position for table rows
            x = 20;
            y += 10;

            // Draw table rows
            doc.setFontStyle('normal');
            for (var j = 0; j < dataRows.length; j++) {
                var row = dataRows[j];
                doc.text((j + 1).toString(), x, y);
                x += 40;
                doc.text(row.firstname, x, y);
                x += 40;
                doc.text(row.gender, x, y);
                x += 40;
                doc.text(row.phone, x, y);
                x += 40;
                doc.text(row.email, x, y);
                x += 40;
                doc.text(row.street + ', ' + row.city + ', ' + row.postal_code + ', ' + row.state + ', ' + row.country, x, y);
                x += 40;
                doc.text(row.institution, x, y);
                x += 40;
                doc.text(row.major, x, y);
                x = 20;
                y += 10;
            }

            doc.save('pdfRegistrants.pdf');
        });
    });
</script>


    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="box-shadow: 0 8px 16px rgba(24, 61, 100, 0.1); border-radius: 15px;">
                <div class="card-body">
                    <?php if (!empty($data['registrants'])) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="border-color: #183D64;">
                                <thead class="thead-dark" style="background-color: #7C1C2B; color: #FCBD32;">
                                    <tr>
                                        <th class="text-white text-center">No</th>
                                        <th class="text-white text-center">Name</th>
                                        <th class="text-white text-center">Phone Number</th>
                                        <th class="text-white text-center">E-mail</th>

                                        <th class="col-md-2 text-white text-center ">Action</th>
                                        <!-- Add more columns if needed -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['registrants'] as $index => $registrant) : ?>
                                        <tr>
                                            <td class="text-center font-weight-bold col-md-1" ><?php echo $index + 1; ?></td>
                                            <td class="text-left font-weight-bold col-md-5"><?php echo strtoupper($registrant->firstname); ?></td>
                                            <td class="text-center font-weight-bold col-md-2"><?php echo $registrant->phone ?>
                                            <td class="text-center font-weight-bold col-md-2">
                                            <style>
                                                .gmail-link {
                                                    color: black;
                                                    transition: color 0.3s; /* Add a smooth color transition effect */
                                                }

                                                .gmail-link:hover {
                                                    color: blue;
                                                }
                                            </style>
                                                <a href="https://mail.google.com/mail/?view=cm&to=<?php echo $registrant->email; ?>" class="gmail-link">
                                                    <?php echo $registrant->email; ?>
                                                </a>
                                            </td>
                                            </td>
                                            <!-- Add more cells with registrant details as needed -->
                                      <!-- Add more cells with registrant details as needed -->
                                      <td class="text-center">
                                      <button class="btn btn-primary btn-sm view-details-btn"
        data-toggle="modal"
        data-target="#studentDetailsModal_<?php echo $registrant->users_id; ?>"
        data-registrantid="<?php echo $registrant->users_id; ?>">
    Student Details
</button>

                                      


    <!-- Student Details Modal -->
    <div class="modal" id="studentDetailsModal_<?php echo $registrant->users_id; ?>" tabindex="-1" role="dialog" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <img src="<?php echo URLROOT."/public/".$registrant->st_image; ?>" alt="image" style="width: auto; max-height: 110px;">
                    <h4 class="modal-title" id="studentDetailsModalLabel"><?php echo strtoupper($registrant->firstname); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    <table class="table">
        <tr>
            <td><strong>Gender</strong></td>
            <td><?php echo ucfirst($registrant->gender); ?></td>
        </tr>
        <tr>
            <td><strong>Contact Number</strong></td>
            <td><?php echo $registrant->phone; ?></td>
        </tr>
        <tr>
            <td><strong>IC Number</strong></td>
            <td><?php echo $registrant->ic; ?></td>
        </tr>
        <tr>
            <td><strong>E-mail</strong></td>
            <td><?php echo $registrant->email; ?></a>
</a>
</td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td><?php echo strtoupper($registrant->street); ?>, <?php echo strtoupper($registrant->city); ?>, <?php echo $registrant->postal_code; ?>, <?php echo strtoupper($registrant->state); ?>,<?php echo strtoupper($registrant->country); ?></td>
        </tr>
        <tr>
            <td><strong>Institution</strong></td>
            <td><?php echo strtoupper($registrant->institution); ?></td>
        </tr>
        <tr>
            <td><strong>Programme</strong></td>
            <td><?php echo strtoupper($registrant->major); ?></td>
        </tr>

        
        <!-- Add more rows as needed -->
    </table>
</div>

            </div>
        </div>
    </div>
</td>
<!-- Feedback Modal -->
<div class="modal" id="feedbackModal_<?php echo $registrant->users_id; ?>" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Feedback for <?php echo $registrant->firstname; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Rating: <?php echo $registrant->rating; ?></h5>
                <p><strong>Comments:</strong></p>
                <p><?php echo $registrant->comments; ?></p>
            </div>
            <div class="modal-footer">
                <!-- Add your footer content here if needed -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <p class="text-center text-muted">No registrants for this activity yet.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        // Handle click on student name to show modal
        $('.registrant-row').on('click', function () {
            var registrantId = $(this).data('registrantid');
            $('#studentDetailsModal_' + registrantId).modal('show');
        });
    });
</script>


<?php require APPROOT . '/views/includes/end_app.php'; ?>
<?php require APPROOT . '/views/includes/footer_metronic.php'; ?>



<!-- Include jQuery before Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<script>
    $(document).ready(function () {
        // Handle click on the "Generate Student List" button
        $('#generatePdfBtn').on('click', function () {
            // Your existing script for generating PDF
        });

        // Handle click on student name to show modal
        $('.registrant-row').on('click', function () {
            var registrantId = $(this).data('registrantid');
            $('#studentDetailsModal_' + registrantId).modal('show');
        });
        $('#registrantsTable_filter').append('<label>Search:<input type="search" class="form-control form-control-sm" placeholder="Type to search"></label>');

        // Handle click on feedback button to show modal
        $('.feedback-btn').on('click', function () {
    var registrantId = $(this).data('registrantid');
    $('#feedbackModal_' + registrantId).modal('show');
});
    });
</script>