<?php

session_start();
include "pdo/connection.php";

include 'pdo/pdo_helper.php';
global $x;
include 'pdo/log.php';
$conn = mysqli_connect("localhost", "root", "sim#0729#", "assam_police");
$sql = "SELECT crime.crime_id,crime.date_of_report, crime.description, crime.fir_no, crime.case_status, 
                accused.name, victim.name as vname, section.section_id,crime.officer_id FROM crime 
        INNER JOIN accused ON crime.crime_id=accused.crime_id
        INNER JOIN victim ON crime.crime_id=victim.crime_id
        INNER JOIN section ON crime.crime_id=section.crime_id";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Crime Records</title>
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
        <h1>Crime Records of Assam Police</h1>
        <br>
        <form action="" method="POST">
            <div class="form-group">
                <i class="fa fa-search" aria-hidden="true"></i>
                <div class="col 12 col-sm-2">
                    <input type="text" class="form-control" name="crime_id" style="height:30px; font-size:15px;" placeholder="enter crime_id" />
                </div>
                <button type="submit" class="btn btn-primary mb-2 " style="height:35px; width:70px;font-size:15px;" name="search" value="search">Search</button>
            </div>
        </form>
        <p>Enter Crime-ID from the below table to view details</p>
        <?php

        if (isset($_POST['search'])) {
            $crime_id = $_POST['crime_id'];
            $query = "SELECT * from `accused` WHERE crime_id='$crime_id' ";
            $query1 = "SELECT * from `victim` WHERE crime_id='$crime_id' ";
            $query2 = "SELECT * from `section` WHERE crime_id='$crime_id' ";
            $query3 = "SELECT * from `witness` WHERE crime_id='$crime_id' ";
            $query4 = "SELECT * from `complainer` WHERE crime_id='$crime_id' ";
            $query5 = "SELECT * from `officer`, `crime` WHERE crime.crime_id='$crime_id' AND officer.officer_id=crime.officer_id";


            $a = mysqli_query($conn, $query);
            $v = mysqli_query($conn, $query1);
            $s = mysqli_query($conn, $query2);
            $w = mysqli_query($conn, $query3);
            $c = mysqli_query($conn, $query4);
            $o = mysqli_query($conn, $query5);

            while ($rows = mysqli_fetch_array($a)) {
        ?><h2>Record of Crime-ID <?php echo $crime_id; ?></h2>
                <div class="container">
                    <div id="viewc">
                        <br>
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <h3><b>Accused Details</b></h3>
                                <p><b>Accused ID:</b> <?php echo $rows['accused_id']; ?></p>
                                <p><b>Name:</b> <?php echo $rows['name']; ?></p>
                                <p><b>Age:</b> <?php echo $rows['age']; ?></p>
                                <p><b>Status:</b> <?php echo $rows['status']; ?></p>
                                <p><b>Remarks:</b> <?php echo $rows['remarks']; ?></p>
                            </div>
                        <?php
                    }
                    while ($rows = mysqli_fetch_array($v)) {
                        ?>
                            <div class="col-5 col-sm-3">
                                <h3><b>Victim Details</b></h3>
                                <p><b>Victim ID:</b> <?php echo $rows['victim_id']; ?></p>
                                <p><b>Name:</b> <?php echo $rows['name']; ?></p>
                                <p><b>Age:</b> <?php echo $rows['age']; ?>&nbsp; <b>Gender:</b> <?php echo $rows['gender']; ?></p>
                                <p><b>Phone:</b> <?php echo $rows['phone']; ?></p>
                                <p><b>Remarks:</b> <?php echo $rows['remarks']; ?></p>
                            </div>

                        <?php
                    }
                    while ($rows = mysqli_fetch_array($w)) {
                        ?>
                            <div class="col-5 col-sm-3">
                                <h3><b>Witness Details</b></h3>
                                <p><b>Witness ID:</b> <?php echo $rows['witness_id']; ?></p>
                                <p><b>Name:</b> <?php echo $rows['name']; ?></p>
                                <p><b>Phone:</b> <?php echo $rows['phone']; ?></p>
                                <p><b>Remarks:</b> <?php echo $rows['remarks']; ?></p>
                            </div>
                        <?php
                    }
                    while ($rows = mysqli_fetch_array($c)) {
                        ?>
                            <div class="col-5 col-sm-3">
                                <h3><b>Complainer Details</b></h3>
                                <p><b>Complainer ID:</b> <?php echo $rows['complainer_id']; ?></p>
                                <p><b>Name:</b> <?php echo $rows['name']; ?></p>
                                <p><b>Age:</b> <?php echo $rows['age']; ?>&nbsp; <b>Gender:</b> <?php echo $rows['gender']; ?></p>
                                <p><b>Phone:</b> <?php echo $rows['phone']; ?></p>
                                <p><b>Remarks:</b> <?php echo $rows['remarks']; ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    while ($rows = mysqli_fetch_array($s)) {
                    ?>
                        <br>
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <h3><b>IPC Section</b></h3>
                                <p><b>Section ID:</b> <?php echo $rows['section_id']; ?></p>
                                <p><b>Description:</b> <?php echo $rows['description']; ?></p>
                            </div>
                        <?php
                    }
                    while ($rows = mysqli_fetch_array($o)) {
                        ?>
                            <div class="col-5 col-sm-3">
                                <h3><b>Officer Details</b></h3>
                                <p><b>Officer ID:</b> <?php echo $rows['officer_id']; ?></p>
                                <p><b>Name:</b> <?php echo $rows['name']; ?></p>
                                <p><b>Position:</b> <?php echo $rows['position']; ?></p>
                                <p><b>Branch:</b> <?php echo $rows['branch']; ?></p>
                                <p><b>Address:</b> <?php echo $rows['address']; ?></p>
                            </div>
                        </div>
                    </div><br>
                    <div class="row justify-content-center">
                        <p><a href="viewcrime.php">
                                <h2>Back</h2>
                            </a></p>
                    </div>
                </div><br><br>
        <?php
                    }
                }

        ?>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <thead class="thead-dark">
                        <th>Crime-ID</th>
                        <th>FIR_no</th>
                        <th>Accused Name</th>
                        <th>Victim Name</th>
                        <th>Date of Report</th>
                        <th>Description</th>
                        <th>Section</th>
                        <th>Case Status</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                            <?php $x = $row["crime_id"]; ?>
                            <td><?php echo $row["crime_id"]; ?> </td>
                            <td><?php echo $row["fir_no"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["vname"]; ?></td>
                            <td><?php echo $row["date_of_report"]; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $row["section_id"]; ?></td>
                            <td><?php echo $row["case_status"]; ?></td>
                            <td><a href="editcrime.php?crime_id=<?php echo $row['crime_id']; ?>&officer_id=<?php echo $row['officer_id']; ?>"> Edit</a> /
                                <a href="delcrime.php?crime_id=<?php echo $row['crime_id']; ?>&officer_id=<?php echo $row['officer_id']; ?>" onclick="return checkdelete()"> Delete</a></td>
                        </tr>
                <?php
                    }
                }

                ?>
            </table>

        </div>

        <p><a href="addcrime.php">
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