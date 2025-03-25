<?php require APPROOT . '/views/includes/head_metronic.php'; ?>
<?php require APPROOT . '/views/includes/begin_app.php'; ?>

<!-- Your existing HTML content -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Display Search Results -->
            <?php var_dump($searchResults); if (!empty($data['searchResults'])) : ?>
                <h3>Search Results:</h3>
                <ul class="list-group">
                    <?php foreach ($data['searchResults'] as $result) : ?>
                        <li class="list-group-item"><?php echo $result->firstname; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Your existing HTML content -->

<?php require APPROOT . '/views/includes/end_app.php'; ?>
<?php require APPROOT . '/views/includes/footer_metronic.php'; ?>
