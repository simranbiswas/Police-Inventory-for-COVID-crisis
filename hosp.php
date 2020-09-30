<?php

session_start();

include "pdo/connection.php";
$sql = "SELECT * from hospital";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hospitals</title>
    <link rel="stylesheet" href="pdo/style.css">

    <?php include 'pdo/headers.php'; ?>

</head>

<body id="view">
    <div class="container">
        <div class="container h-100" id="login">
            <img src="pdo/pic.png" alt="Assam Police Logo"><br>
            <p id="login"></p>
            <script src="pdo/script.js"></script>
        </div>
        <h1>List of Covid Treating Hospitals</h1><br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <th>Hospital-ID</th>
                    <th>Containment Zone-ID</th>
                    <th>Number of <br>Ambulances</th>
                    <th>Number of <br>Beds Available</th>
                    <th>Date of Last Medical Supplies</th>
                    <th>Expiration Range</th>
                    <th>Action</th>
                </thead>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["hsp_id"]; ?> </td>
                            <td><?php echo $row["cz_id"]; ?> </td>
                            <td><?php echo $row["no_amb"]; ?></td>
                            <td><?php echo $row["bed_avail"]; ?></td>
                            <td><?php echo $row["los"]; ?></td>
                            <td><?php echo $row["exp_range"]; ?></td>
                            <td><a href="edithsp.php?hsp_id=<?php echo $row['hsp_id']; ?>"> Edit</a>
                        </tr>
                <?php
                    }
                }

                ?>
            </table>

        </div>

        <br>
        <p><a href="addhsp.php">
                <h3>Add Data</h3>
            </a><br>
            <a href="index.php">
                <h3>Done</h3>
            </a></p>

    </div>

</body>

</html>