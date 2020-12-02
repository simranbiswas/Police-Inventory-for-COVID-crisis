<?php

include("pdo/connection.php");
error_reporting(0);

$cz_id = $_GET['cz_id'];

$query = "SELECT * from `czone` WHERE cz_id='$cz_id' ";

$cz = mysqli_query($conn, $query);
while ($rows = mysqli_fetch_array($cz)) {
    $name = $rows['name'];
    $locn = $rows['locn'];
    $nop = $rows['no_patients'];
    $mid = $rows['munic_id'];
    $noh = $rows['no_hsp'];
    $rem = $rows['remarks'];
}
?>

<html>

<head>
    <title>Edit Containment Zone Record</title>

</head>

<body id="acz">
    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">
    <br>
    <h1 style="margin-left:10px;">Edit Containment Zone Details</h1><br>
    <div id="form">
        <form action="" method="GET">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-8">
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-md-4" for="cz_id">Containment Zone ID* </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="cz_id" placeholder="enter cz_id" id="cz_id" value="<?php echo $_GET['cz_id']; ?>" /><br>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-md-4" for="name">Name* </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="name" placeholder="enter name" id="name" value="<?php echo $name ?>" /><br>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-md-4" for="locn">Location* </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="locn" placeholder="enter locn" id="locn" value="<?php echo $locn ?>" /><br>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-md-4" for="nop">Number of Patients*</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="nop" placeholder="enter no_patients" id="nop" value="<?php echo $nop ?>" /><br>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-md-4" for="munic_id">Municipality ID* </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="munic_id" placeholder="enter munic_id" id="munic_id" value="<?php echo $mid ?>" /><br>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-md-4" for="noh">Number of Hospitals*</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="noh" placeholder="enter no_hosp" id="noh" value="<?php echo $noh ?>" /><br>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-md-4" for="rem">Remarks*</label>
                                <div class="col-sm-3">
                                    <textarea class="form-control" name="rem" placeholder="enter remarks" id="rem" value="<?php echo $rem ?>"></textarea>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </div>

            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary btn-large mb-2 " style="height:35px; width:70px;font-size:15px;" name="submit" value="submit" id="submit">Update</button>
            </div>
        </form>
    </div><br>

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
            $query = "UPDATE czone SET name='$name',locn='$locn', no_patients='$nop', munic_id='$mid',no_hsp='$noh',remarks='$rem' WHERE cz_id='$cz_id'";
            $res = mysqli_query($conn, $query);

            if ($res) {
                echo "<font color='green'><h4>DATA EDITED SUCCESSFULLY!</h4></font>";
            } else {
                echo "<font color='red'><h4>Some Error Occured </h4></font>";
            }
        } else {
            echo "<font color='red'><h4>* fields are required!</h4></font>";
        }
    } else {
        echo "<h3><font color='blue'>Click on Update to update you Record</font></h3>";
    }
    ?><br>
    <button type="submit" class="btn btn-outline-secondary mb-2" style="height:35px; width:70px;font-size:15px; margin-left:10px;">
        <a href="cont.php">Back</a></button>
</body>

</html>