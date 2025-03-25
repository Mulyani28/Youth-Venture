<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <h2 class="text-center mb-4">Dashboard</h2>

        <!-- Registrations Section -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total Registrations</h5>
                <p class="card-text">50</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pending Registrations</h5>
                <p class="card-text">10</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Completed Registrations</h5>
                <p class="card-text">40</p>
            </div>
        </div>

        <!-- Activities Section -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Activity Total</h5>
                <p class="card-text">150</p>
            </div>
        </div>

        <!-- Rewards Section -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rewards Earned</h5>
                <p class="card-text">20</p>
            </div>
        </div>

        <!-- Badges Section -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Badges Earned</h5>
                <p class="card-text">5</p>
            </div>
        </div>

    </div>

    <!-- Add Bootstrap JavaScript and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
