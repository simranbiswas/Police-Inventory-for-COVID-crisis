<?php

include("pdo/connection.php");
error_reporting(0);

?>

<html>

<head>
    <title>Add Containment Zone Record</title>

</head>

<body id="acz">
    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">
    <br>
    <h1 style="margin-left:10px;">Enter New Containment Details</h1>
    <form action="" method="GET">
        <div class="container">
            <div class="col-12">
                <br>
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
                        <label class="control-label col-sm-4" for="name">Name* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="name" placeholder="enter name" id="name" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="locn">Location* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="locn" placeholder="enter locn" id="locn" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="nop">Number of Patients*</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nop" placeholder="enter no_patients" id="nop" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="munic_id">Municipality ID* </label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="munic_id" placeholder="enter munic_id" id="munic_id" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="noh">Number of Hospitals*</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="noh" placeholder="enter no_hosp" id="noh" value="" /><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form group">
                        <label class="control-label col-sm-4" for="rem">Remarks*</label>
                        <div class="col-sm-3">
                            <textarea class="form-control" name="rem" placeholder="enter remarks" id="rem" value=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3 center">
            <button type="submit" class="btn btn-primary btn-large mb-2 " style="height:35px; width:70px;font-size:15px;" name="submit" value="submit" id="submit">Submit</button> </div>
    </form>
    <?php
    if ($_GET['submit']) {

        $czid = $_GET['cz_id'];
        $name = $_GET['name'];
        $locn = $_GET['locn'];
        $nop = $_GET['nop'];
        $mid = $_GET['munic_id'];
        $noh = $_GET['noh'];
        $rem = $_GET['rem'];

        if ($czid != "" && $name != "" && $locn != "" && $nop != "" && $mid != "" && $noh != "" && $rem !== "") {
            $query = "INSERT INTO czone VALUES ('$czid','$name','$locn', '$nop', '$mid','$noh','$rem')";
            $res = mysqli_query($conn, $query);

            if ($res) {
                echo "<h5><font color='green'>DATA INSERTED INTO DATABASE SUCCESSFULLY!</font></h5>";
            }
        } else {
            echo "<h4><font color='red'>* fields are required</font></h4>";
        }
    } else {
        echo "<h4 ><font color='blue'>Click on Submit to add you Record</font></h4>";
    }
    ?>
    <br>
    <button type="submit" class="btn btn-outline-secondary mb-2" style="height:35px; width:70px;font-size:15px; margin-left:10px;">
        <a href="cont.php">Back</a></button>
</body>

</html>