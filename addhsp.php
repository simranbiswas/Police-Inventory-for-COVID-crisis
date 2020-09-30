<?php

include("pdo/connection.php");
error_reporting(0);

?>

<html>

<head>
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
                            <input type="text" class="form-control" name="hsp_id" placeholder="enter hsp_id" id="hsp_id" value="" /><br>
                        </div>
                    </div>
                    <div class="form group">
                        <label class="control-label col-sm-4" for="cz_id">Containment Zone ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="cz_id" placeholder="enter cz_id" id="cz_id" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="noa">Number of Ambulances* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="noa" placeholder="enter noa" id="noa" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="ba">Bed Available* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="ba" placeholder="enter bed available" id="ba" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="los">Date of last medical supplies*</label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="los" placeholder="enter date" id="los" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="er">Expiration Range of Medicines* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="er" placeholder="enter er" id="er" value="" /><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3 center">
            <button type="submit" class="btn btn-primary btn-large mb-2 " name="submit" value="submit" style="height:35px; width:70px;font-size:15px;" id="submit">Submit</button>
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
            $query = "INSERT INTO hospital VALUES ('$hid','$czid','$noa', '$ba', '$los','$er')";
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
        <a href="hosp.php">Back</a></button>
</body>

</html>