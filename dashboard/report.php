<?php 

include '../dbConnection.php';

$month='';
$year='';
$result='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $month = $_POST['month'];
    $year = $_POST['year'];

    $query = "SELECT vehicle_no, SUM(days) AS rented_days, SUM(rental_price) AS total_income
              FROM contract
              INNER JOIN vehicle ON contract.vehicle_id = vehicle.vehicle_id
              WHERE MONTH(start_date) = '$month' AND YEAR(start_date) = '$year'
              GROUP BY vehicle_no
              ORDER BY rented_days DESC";
    $result = mysqli_query($con, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <a href="dashboard.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Home</a><br><br>
    <h1>Monthly Report</h1>
    <form action="#" method="POST">
        <label for="month">Select Month:</label>
        <select name="month" id="month" required>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">Octomber</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>

        <label for="year">Select Year:</label>
        <select name="year" id="year" required>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <!-- Add options for other years -->
        </select>

        <button type="submit">Generate Report</button>
    </form>
    <?php

    echo "<h2>Monthly Report for " . date("F Y", strtotime($year . '-' . $month . '-01')) . "</h2>";

    ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Vehicle No</th>
                <th>Rented Days</th>
                <th>Total Income</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['vehicle_no']; ?></td>
                    <td><?php echo $row['rented_days']; ?></td>
                    <td><?php echo $row['total_income']; ?></td>
                </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="3">No data available</td></tr>';
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
