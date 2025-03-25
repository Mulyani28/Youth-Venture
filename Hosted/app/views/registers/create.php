<!-- Inside app/views/registers/create.php -->


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public\img\logo.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

<?php
    // require APPROOT . '/views/includes/head_metronic.php';
?>

 <?php
    // require APPROOT . '/views/includes/begin_app.php';
 ?>

    <div class="container mt-5">

        <h1>Create Registration Link</h1>

        <!-- Form for creating a registration link -->
        <form action="<?php echo URLROOT; ?>/registers/create" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <!-- <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div> -->
            <!-- <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div> -->
            <!-- Add other fields as needed -->

            <button type="submit" class="btn btn-primary">Create Link</button>
        </form>

        <?php if (!empty($data['registerLinks'])) : ?>
            <!-- Display existing registration links -->
            <h2>Available Registration Links</h2>
            <table class="table table-bordered table-hover">
                <!-- Table headers -->
                <tbody>
                    <!-- Table rows for existing registration links -->
                </tbody>
            </table>
        <?php endif; ?>

    </div>

    <?php
    // require APPROOT . '/views/includes/end_app.php';
?>



<?php
    // require APPROOT . '/views/includes/footer_metronic.php';
 ?>

</body>

</html>

