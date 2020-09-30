<?php

include("pdo/connection.php");

error_reporting(0);

$hsp_id = $_GET['hsp_id'];

$query = "SELECT * from `hospital` WHERE hsp_id='$hsp_id' ";

$hsp = mysqli_query($conn, $query);
while ($rows = mysqli_fetch_array($hsp)) {
    $hid = $rows['hsp_id'];
    $czid = $rows['cz_id'];
    $noa = $rows['no_amb'];
    $ba = $rows['bed_avail'];
    $los = $rows['los'];
    $er = $rows['exp_range'];
}
?>
<html>

<head>
    <title>Edit Hospitals Record</title>

</head>

<body id="acz">
    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">

    <h1 style="margin-left:10px;">Enter New Hospital Details</h1><br>
    <form action="" method="GET">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="hsp_id">Hospital ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="hsp_id" placeholder="enter hsp_id" id="hsp_id" value="<?php echo $hid; ?>" /><br>
                        </div>
                    </div>
                    <div class="form group">
                        <label class="control-label col-sm-4" for="cz_id">Containment Zone ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="cz_id" placeholder="enter cz_id" id="cz_id" value="<?php echo $czid; ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="noa">Number of Ambulances* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="noa" placeholder="enter noa" id="noa" value="<?php echo $noa; ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="ba">Bed Available* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="ba" placeholder="enter bed available" id="ba" value="<?php echo $ba; ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="los">Date of last medical supplies*</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="los" placeholder="enter date" id="los" value="<?php echo $los; ?>" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="er">Expiration Range of Medicines* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="er" placeholder="enter er" id="er" value="<?php echo $er; ?>" /><br>
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
        $hid = $_GET['hsp_id'];
        $czid = $_GET['cz_id'];
        $noa = $_GET['noa'];
        $ba = $_GET['ba'];
        $los = $_GET['los'];
        $er = $_GET['er'];

        if ($hid != "" && $czid != "" && $noa != "" && $ba != "" && $los != "" && $er != "") {
            $query = "UPDATE hospital SET cz_id='$czid',no_amb='$noa', bed_avail='$ba', los='$los',exp_range='$er' WHERE hsp_id='$hid'";
            $res = mysqli_query($conn, $query);

            if ($res) {
                echo "<font color='green'><h4>DATA EDITED SUCCESSFULLY!</h4></font>";
            } else {
                echo "<font color='red'><h4>SOME ERROR OCCURED!</h4></font>";
            }
        } else {
            echo "<font color='red'><h4>* fields are required!</h4></font>";
        }
    } else {
        echo "<font color='blue'><h4>Click on Update to update you Record</h4></font>";
    }
    ?><br>
    <button type="submit" class="btn btn-outline-secondary mb-2" style="height:35px; width:70px;font-size:15px; margin-left:10px;">
        <a href="hosp.php">Back</a></button>
</body>

</html>