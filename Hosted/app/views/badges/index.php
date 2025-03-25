<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
    require APPROOT . '/views/includes/head_metronic.php';
?>

 <?php
    require APPROOT . '/views/includes/begin_app.php';
 ?>


                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                <!--begin::Row-->
 
<div class="row">
    <?php foreach ($data['badges'] as $badge): ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-left">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <!-- Add a button to trigger the modal -->
                                <button type="button" class="btn btn-link badge-button" data-toggle="modal" data-target="#badgeModal_<?php echo $badge->badgeId; ?>">
                                    <?php echo $badge->badgeName; ?>
                                </button>
                            </div>

                        </div>
                        <div class="col-auto">
                        <img src="https://media.istockphoto.com/id/1439874970/photo/3d-badge-with-check-mark.jpg?b=1&s=612x612&w=0&k=20&c=YFYlpoGJPDhuW64PL2kJvdSpHFq91FzfXgmCV_O-yEE="
                                alt="Badge Icon" style="max-width: 60px; height: auto;">
                        </div>
                    </div>
                </div>
            </div>

<!-- Modal for badge description -->
<div class="modal fade" id="badgeModal_<?php echo $badge->badgeId; ?>" tabindex="-1" role="dialog" aria-labelledby="badgeModalLabel_<?php echo $badge->badgeId; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-left" id="badgeModalLabel_<?php echo $badge->badgeId; ?>"><?php echo $badge->badgeName; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo $badge->badgeDesc; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        </div>
    <?php endforeach; ?>
</div>




<div class="container">

<!-- <?php foreach($data['badges']as $badges):?>
    <div class="container-item">
        <h2>
            <?php echo $badges->badgeName;?>
        </h2>
    </div>

    <?php endforeach;?>
</div> -->                           
                          
                                    

                        
                            <!--end::Row-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                
<?php
    require APPROOT . '/views/includes/end_app.php';
?>



<?php
    require APPROOT . '/views/includes/footer_metronic.php';
 ?>

