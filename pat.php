<?php

session_start();

include "pdo/connection.php";
$sql = "SELECT * from patient";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Patients</title>

    <?php include 'pdo/headers.php'; ?>

    <link rel="stylesheet" href="pdo/style.css">

</head>

<body id="view">
    <div class="container">
            <div class="container h-100" id="login">
                <img src="pdo/pic.png" alt="Assam Police Logo"><br>
                <p id="login"></p>
                <script src="pdo/script.js"></script>
            </div>
            <h1>List of Covid-19 Affected Patients</h1><br>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <th>Patient-ID</th>
                        <th>Containment Zone-ID</th>
                        <th>Hospital-ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Aadhar NO</th>
                        <th>Address</th>
                        <th>Profession</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>DOA</th>
                        <th>No of Family members</th>
                        <th>Medical History</th>
                        <th>Action</th>
                    </thead>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["pat_id"]; ?> </td>
                                <td><?php echo $row["cz_id"]; ?> </td>
                                <td><?php echo $row["hsp_id"]; ?> </td>
                                <td><?php echo $row["fname"]; ?></td>
                                <td><?php echo $row["lname"]; ?></td>
                                <td><?php echo $row["aadhar_no"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>
                                <td><?php echo $row["proffession"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["age"]; ?></td>
                                <td><?php echo $row["gender"]; ?></td>
                                <td><?php echo $row["dob"]; ?></td>
                                <td><?php echo $row["doa"]; ?></td>
                                <td><?php echo $row["no_flymem"]; ?></td>
                                <td><?php echo $row["medic_hist"]; ?></td>
                                <td><a href="editpat.php?pat_id=<?php echo $row['pat_id']; ?>"> Edit</a>
                            </tr>
                    <?php
                        }
                    }

                    ?>
                </table>

            </div>
            <br>
            <p><a href="addpat.php">
                    <h3>Add Data</h3>
                </a><br>
                <a href="index.php">
                    <h3>Done</h3>
                </a></p>

        </div>

</body>

</html>