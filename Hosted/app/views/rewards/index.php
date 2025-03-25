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

        <?php
            require APPROOT . '/views/rewards/rewardsCategory.php';
        ?>
                         
        <?php
        require APPROOT . '/views/rewards/rightcolumn.php';
        require APPROOT . '/views/rewards/cultural.php';
        ?>

</div>					             
<?php
    require APPROOT . '/views/includes/end_app.php';
    require APPROOT . '/views/includes/footer_metronic.php';
 ?>
  