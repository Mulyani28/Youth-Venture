 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="shortcut icon" href="<?php echo URLROOT ?>/public\img\logo.jpg" /> 

    <!-- Add Bootstrap CSS  -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style> 
         @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

        h1 {
            font-family: 'Pacifico', cursive;
            font-size: 3rem;
            color: #ffffff;
            text-align: center;
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            height: 100%;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
            background-color: rgba(255, 255, 255, 0.8);
        } 
 
        .card:hover {
            transform: scale(1.05);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            color: #000000;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            flex-grow: 1;
            font-size: 1.2rem;
            line-height: 1.4;
        }

        .card-footer {
            border-top: 1px solid #dee2e6;
            padding: 10px;
            text-align: right;
        }

        .btn-primary {
            background-color: #007bff;
            border: 1px solid #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border: 1px solid #0056b3;
        }

        .alert-info {
            margin-top: 20px;
        } 
    </style>
 </head> 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



 <body>

 <?php
    require APPROOT . '/views/includes/head_metronic.php';
?>

 <?php
    require APPROOT . '/views/includes/begin_app.php';
 ?>

 <!-- begin::Content --> 
<div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
    <div class="container mt-5">
        <h1>Open Registration</h1>

        <div class="row">
            <?php if (!empty($data['registerLinks'])): ?>
                <?php foreach ($data['registerLinks'] as $link): ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $link->title; ?></h5>
                                <p class="card-text"><?php echo $link->description; ?></p>
                                <div class="card-footer">
                                    <small class="text-muted">
                                        <strong>Created At:</strong> <?php echo $link->created_at; ?>
                                        <br>
                                        <strong>Updated At:</strong> <?php echo $link->updated_at; ?>
                                    </small>
                                    <br>
                                    <a href="<?php echo $link->url; ?>" target="_blank" onclick="return confirm('Are you sure you want to register?');" class="btn btn-primary mt-2">Register here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        No registration links available.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
    <!-- Add Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php
    require APPROOT . '/views/includes/end_app.php';
?>



<?php
    require APPROOT . '/views/includes/footer_metronic.php';
 ?>

</body>

</html> 

