

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public\img\logo.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>



                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                <!--begin::Row-->
                            
                          
                                <div class="container mt-5">

<!-- New Card for Message and Button -->
<div class="card bg-info text-white shadow-lg rounded">
    <div class="card-body">
        <h5 class="card-title">We have a few available activities to register. Look for more</h5>
        <a href="<?php echo URLROOT; ?>/registers/linklist" class="btn btn-light btn-lg">Click here</a>
    </div>
</div>

<!-- Existing Card for Registration List -->
<div class="card shadow-sm">
    <div class="card-header text-white">
        <h3 class="card-title">Registration List</h3>
      <!--  <div class="card-toolbar">
            <?php if(isLoggedIn()): ?>
            <a href="<?php echo URLROOT;?>/registers/create" class="btn btn-light-primary">Create</a>
            <?php endif; ?>
       
        </div>-->
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kt_datatable_registers" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['registers'] as $key => $register): ?>
                        <tr class="<?php echo ($key % 2 == 0) ? 'even' : 'odd'; ?>">
                            <td><?php echo $register->reg_id; ?></td>
                            <td><?php echo $register->reg_title; ?></td>
                            <td><?php echo date('F j, Y h:m A', strtotime($register->reg_date)); ?></td>
                            <td>
                                <!-- Add some conditional styling based on status -->
                                <span class="badge <?php echo ($register->reg_status == 'Active') ? 'bg-success' : 'bg-danger'; ?>">
                                    <?php echo $register->reg_status; ?>
                                </span>
                            </td>
                            <td>
                                <!-- Add buttons for actions (e.g., edit, delete) with Bootstrap styling -->
                                <a href="<?php echo URLROOT; ?>/registers/edit/<?php echo $register->reg_id; ?>" class="btn btn-sm btn-outline-info">Edit</a>
                                <a href="<?php echo URLROOT; ?>/registers/delete/<?php echo $register->reg_id; ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                var table = $('#kt_datatable_registers').DataTable({
                    "order": [], // Disable initial sorting
                    "lengthMenu": [5, 10, 25], // Show entries dropdown
                    "pageLength": 10 // Set default page length
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                var table = $('#kt_datatable_posts').DataTable({

                });
            });
        </script>
    </div>
    <div class="card-footer">
        <!-- Optional footer content -->
    </div>
</div>

</div>

                        
                            <!--end::Row-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                


    

</body>

</html>






