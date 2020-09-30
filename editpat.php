<?php

include("pdo/connection.php");
error_reporting(0);

$pat_id = $_GET['pat_id'];

$query = "SELECT * from `patient` WHERE pat_id='$pat_id' ";

$pt = mysqli_query($conn, $query);
while ($rows = mysqli_fetch_array($pt)) {
    $pid = $rows['pat_id'];
    $czid = $rows['cz_id'];
    $hid = $rows['hsp_id'];
    $fn = $rows['fname'];
    $ln = $rows['lname'];
    $adhno = $rows['aadhar_no'];
    $add = $rows['address'];
    $pro = $rows['proffession'];
    $ph = $rows['phone'];
    $age = $rows['age'];
    $gen = $rows['gender'];
    $dob = $rows['dob'];
    $doa = $rows['doa'];
    $nof = $rows['no_flymem'];
    $mh = $rows['medic_hist'];
}
?>
<html>

<head>
    <title>Edit Patients Record</title>
</head>

<body id="acz">
    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">

    <h1 style="margin-left:10px;">Edit Patient Details</h1><br>
    <form action="" method="GET">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="pat_id">Patient ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="pat_id" placeholder="enter pat_id" id="pat_id" value="<?php echo $pid ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="cz_id">Containment Zone ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="cz_id" placeholder="enter cz_id" id="cz_id" value="<?php echo $czid ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="hsp_id">Hospital ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="hsp_id" placeholder="enter hsp_id" id="hsp_id" value="<?php echo $hid ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="fname">First Name* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="fname" placeholder="enter fname" id="fname" value="<?php echo $fn ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="lname">Last Name* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="lname" placeholder="enter lname" id="lname" value="<?php echo $ln ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="adhno">Aadhar Number* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="adhno" placeholder="enter adhno" id="adhno" value="<?php echo $adhno ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="addr">Address* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="addr" placeholder="enter addr" id="addr" value="<?php echo $add ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="prof">Profession</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="prof" placeholder="enter prof" id="prof" value="<?php echo $pro ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="phone">Phone Number* </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="phone" placeholder="enter phone" id="phone" value="<?php echo $ph ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-3" for="age">Age </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="age" placeholder="enter age" id="age" value="<?php echo $age ?>" />
                        </div>
                    </div>
                    <div class="form group ">
                        <label class="control-label col-sm-2" for="gen">Gender </label>
                        <div class="col-sm-5">
                            <select id="gen" class="form-control" name="gen" selected="<?php echo $gen ?>">
                                <option value="Male" <?php if ($gen == "Male") echo 'selected="selected"'; ?>>Male</option>
                                <option value="Female" <?php if ($gen == "Female") echo 'selected="selected"'; ?>>Female</option>
                                <option value="Other" <?php if ($gen == "Other") echo 'selected="selected"'; ?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="dob">Date Of Birth* </label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="dob" placeholder="enter date_of_birth" id="dob" value="<?php echo $dob ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="doa">Date Of Admission* </label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="doa" placeholder="enter date_of_admission" id="doa" value="<?php echo $doa ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="nof">Number of Family Member </label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="nof" placeholder="enter nof" id="nof" value="<?php echo $nof ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="mh">Medical History*</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="mh" placeholder="enter mh" id="mh" value="<?php echo $mh ?>" /><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3 center">
            <button type="submit" class="btn btn-primary btn-large mb-2 " style="height:35px; width:70px;font-size:15px;" name="submit" value="submit" id="submit">Update</button>
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
            $ph != "" && $dob != "" && $doa != "" && $nof != "" && $mh !== ""
        ) {

            $quer = "UPDATE patient SET cz_id='$czid', hsp_id='$hid', fname='$fn',lname='$ln',aadhar_no='$adhno',address='$add',
             proffession='$pro',phone='$ph',age='$age',gender='$gen', dob='$dob', doa='$doa', no_flymem='$nof',medic_hist='$mh' WHERE pat_id='$pid'";

            $res = mysqli_query($conn, $quer);

            if ($res) {
                echo "<font color='green'><h4>DATA UPDATED SUCCESSFULLY!</h4></font>";
            } else {
                echo "<font color='red'><h4>SOME ERROR OCCURED!</h4></font>";
            }
        } else {
            echo "<font color='red'><h4>* fields are required!</h4></font>";
        }
    } else {
        echo "<h4><font color='blue'>Click on Update to update you Record</font></h4>";
    }
    ?><br>
    <button type="submit" class="btn btn-outline-secondary mb-2" style="height:35px; width:70px;font-size:15px; margin-left:10px;">
        <a href="pat.php">Back</a></button>
</body>

</html>