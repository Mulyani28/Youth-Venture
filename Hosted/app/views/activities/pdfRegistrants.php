<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity List</title>
</head>

<body>
    <h1>Activity List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Start Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allActivities as $activity) : ?>
                <tr>
                    <td><?php echo $activity->act_title; ?></td>
                    <td><?php echo $activity->act_desc; ?></td>
                    <td><?php echo $activity->act_start_date; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
