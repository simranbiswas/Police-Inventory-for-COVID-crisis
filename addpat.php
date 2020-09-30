<?php

include("pdo/connection.php");
error_reporting(0);


?>

<html>

<head>
    <title>Add Patients Record</title>

</head>

<body id="acz">
    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">
    <br>
    <h1 style="margin-left:10px;">Enter New Patient Details</h1>
    <form action="" method="GET">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="pat_id">Patient ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="pat_id" placeholder="enter pat_id" id="pat_id" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="cz_id">Containment Zone ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="cz_id" placeholder="enter cz_id" id="cz_id" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="hsp_id">Hospital ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="hsp_id" placeholder="enter hsp_id" id="hsp_id" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="fname">First Name* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="fname" placeholder="enter fname" id="fname" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="lname">Last Name* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="lname" placeholder="enter lname" id="lname" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="adhno">Aadhar Number* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="adhno" placeholder="enter adhno" id="adhno" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="addr">Address* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="addr" placeholder="enter addr" id="addr" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="prof">Profession</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="prof" placeholder="enter prof" id="prof" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="phone">Phone Number* </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="phone" placeholder="enter phone" id="phone" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-2" for="age">Age </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="age" placeholder="enter age" id="age" value="" />
                        </div>
                    </div>
                    <div class="form group ">
                        <label class="control-label col-sm-2" for="gen">Gender </label>
                        <div class="col-sm-3">
                            <select id="gen" class="form-control" name="gen">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="dob">Date Of Birth* </label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="dob" placeholder="enter date_of_birth" id="dob" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="doa">Date Of Admission* </label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="doa" placeholder="enter date_of_admission" id="doa" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="nof">Number of Family Member </label>
                        <div class="col-sm-2">
                            <input type="number" min="0" class="form-control" name="nof" placeholder="enter nof" id="nof" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="mh">Medical History*</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="mh" placeholder="enter mh" id="mh" value="" /><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3 center">
            <button type="submit" class="btn btn-primary btn-large mb-2 " style="height:35px; width:70px;font-size:15px;" name="submit" value="submit" id="submit">Submit</button>
        </div>
    </form>
    <?php
    if ($_GET['submit']) {
        $pid = $_GET['pat_id'];
        $czid = $_GET['cz_id'];
        $hid = $_GET['hsp_id'];
        $fn = $_GET['fname'];
        $ln = $_GET['lname'];
        $adhno = $_GET['adhno'];
        $add = $_GET['addr'];
        $pro = $_GET['prof'];
        $ph = $_GET['phone'];
        $age = $_GET['age'];
        $gen = $_GET['gen'];
        $dob = $_GET['dob'];
        $doa = $_GET['doa'];
        $nof = $_GET['nof'];
        $mh = $_GET['mh'];

        if (
            $pid != "" && $czid != "" && $hid != "" && $fn != "" && $ln != "" && $adhno != "" && $add != "" &&
            $ph != "" && $dob != "" && $doa != "" && $mh !== ""
        ) {

            $query = "INSERT INTO patient(`pat_id`,`cz_id`,`hsp_id`,`fname`,`lname`,`aadhar_no`,`address`,`proffession`,
            `phone`,`age`,`gender`,`dob`,`doa`,`no_flymem`,`medic_hist`) VALUES ('$pid','$czid','$hid','$fn','$ln','$adhno','$add','$pro',
                    '$ph','$age','$gen', '$dob', '$doa','$nof','$mh')";
            $res = mysqli_query($conn, $query);

            if ($res) {
                echo "<h4><font color='green'>DATA INSERTED INTO DATABASE SUCCESSFULLY!</font></h4>";
            } else {
                echo "<h4><font color='red'>Some error occured</font></h4>";
            }
        } else {
            echo "<h4><font color='red'>* fields are required</font></h4>";
        }
    } else {
        echo "<h4><font color='blue'>Click on Submit to add you Record</font></h4>";
    }
    ?>
    <br>
    <button type="submit" class="btn btn-outline-secondary mb-2" style="height:35px; width:70px;font-size:15px; margin-left:10px;">
        <a href="pat.php">Back</a></button>
</body>

</html>