<?php

session_start();

include "pdo/connection.php";
$sql = "SELECT * from czone";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Containment Zones</title>
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
        <br>
        <h1>List of Containment Zones</h1><br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <th>Containment Zone-ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Number of Patients</th>
                    <th>Municipality ID</th>
                    <th>No of Hospitals</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </thead>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <td><?php echo $row["cz_id"]; ?> </td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["locn"]; ?></td>
                            <td><?php echo $row["no_patients"]; ?></td>
                            <td><?php echo $row["munic_id"]; ?></td>
                            <td><?php echo $row["no_hsp"]; ?></td>
                            <td><?php echo $row["remarks"]; ?></td>
                            <td><a href="editcz.php?cz_id=<?php echo $row['cz_id']; ?>"> Edit</a> /
                                <a href="delcz.php?cz_id=<?php echo $row['cz_id']; ?>" onclick="return checkdelete()"> Delete</a></td>
                        </tr>
                <?php
                    }
                }

                ?>
            </table>

        </div>
        <br>
        <p><a href="addcz.php">
                <h3>Add Data</h3>
            </a><br>
            <a href="index.php">
                <h3>Done</h3>
            </a></p>

    </div>

</body>
<script>
    function checkdelete() {
        return confirm("Are you sure you want to delete this data?");
    }
</script>

</html>