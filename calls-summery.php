<?php

require 'vendor/autoload.php';
require './services/util.service.php';
require './services/api.service.php';

$data = getTableDataByCSV('file-loader');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css" />

    <title>Phone Record Info</title>
</head>

<body>
    <main class="main-content calls-summery">
        <table class="my-table">
            <thead>
                <tr>
                    <td>Costumer ID</td>
                    <td>Total Calls</td>
                    <td>Total Calls Within Continent</td>
                    <td>Total Duration</td>
                    <td>Total Duration Within Continent</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $row['costumer_id'] ?></td>
                        <td><?= $row['total_calls'] ?></td>
                        <td><?= $row['total_calls_within_continent'] ?></td>
                        <td><?= $row['total_duration'] ?></td>
                        <td><?= $row['total_duration_within_continent'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

 
    </main>
</body>

</html>