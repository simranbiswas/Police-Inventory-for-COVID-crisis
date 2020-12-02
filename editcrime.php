<?php
error_reporting(0);
include("pdo/connection.php");


$crime_id = $_GET['crime_id'];
$officer_id = $_GET['officer_id'];

$quer = "SELECT * from `crime` WHERE crime_id='$crime_id' ";
$query = "SELECT * from `accused` WHERE crime_id='$crime_id' ";
$query1 = "SELECT * from `victim` WHERE crime_id='$crime_id' ";
$query2 = "SELECT * from `section` WHERE crime_id='$crime_id' ";
$query3 = "SELECT * from `witness` WHERE crime_id='$crime_id' ";
$query4 = "SELECT * from `complainer` WHERE crime_id='$crime_id' ";
$query5 = "SELECT * from `officer` WHERE officer_id='$officer_id'";

$cr = mysqli_query($conn, $quer);
$a = mysqli_query($conn, $query);
$v = mysqli_query($conn, $query1);
$s = mysqli_query($conn, $query2);
$w = mysqli_query($conn, $query3);
$c = mysqli_query($conn, $query4);
$o = mysqli_query($conn, $query5);

while ($rows = mysqli_fetch_array($cr)) {
    $fir = $rows['fir_no'];
    $dor = $rows['date_of_report'];
    $desc = $rows['description'];
    $off = $rows['officer_id'];
    $cs = $rows['case_status'];
}
while ($rows = mysqli_fetch_array($a)) {
    $aid = $rows['accused_id'];
    $aname = $rows['name'];
    $astat = $rows['status'];
    $arem = $rows['remarks'];
    $aage = $rows['age'];
    $agen = $rows['gender'];
}
while ($rows = mysqli_fetch_array($v)) {
    $vid = $rows['victim_id'];
    $vname = $rows['name'];
    $vphone = $rows['phone'];
    $vrem = $rows['remarks'];
    $vage = $rows['age'];
    $vgen = $rows['gender'];
}
while ($rows = mysqli_fetch_array($w)) {
    $wid = $rows['witness_id'];
    $wname = $rows['name'];
    $wphone = $rows['phone'];
    $wrem = $rows['remarks'];
}
while ($rows = mysqli_fetch_array($c)) {
    $coid = $rows['complainer_id'];
    $cname = $rows['name'];
    $cphone = $rows['phone'];
    $crem = $rows['remarks'];
    $cage = $rows['age'];
    $cgen = $rows['gender'];
}
while ($rows = mysqli_fetch_array($s)) {
    $sid = $rows['section_id'];
    $sdesc = $rows['description'];
}
while ($rows = mysqli_fetch_array($o)) {
    $pos = $rows['position'];
    $oname = $rows['name'];
    $branch = $rows['branch'];
    $add = $rows['address'];
}

?>

<html>

<head>
    <title>Edit Crime Records</title>

</head>

<body id="edit">
    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">

    <h1 style="margin-left:10px;"><br>Edit Existing Records</h1><br>
    <div id="form">
        <form action="" method="GET">
            <div class="container ">
                <div class="col-12"><br>
                    <div class="row">
                        <h2>Primary Details</h2><br>
                    </div><br>
                    <div class="row">
                        <div class="form group">
                            <label class="control-label col-sm-3" for="crime_id">Crime ID* </label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="crime_id" placeholder="enter crime_id" id="crime_id" value="<?php echo $_GET['crime_id']; ?>" /><br>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="fir_no">FIR number* </label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="fir_no" placeholder="enter fir_no" id="fir_no" value=<?php echo $fir; ?> /><br>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="date_of_report">Date Of Report* </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="date_of_report" placeholder="enter date_of_report" id="date_of_report" value=<?php echo $dor; ?> /><br>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="case_status">Case Status*</label>
                            <div class="col-sm-2">
                                <select id="case_status" class="form-control" name="case_status">
                                    <option value="Pending" <?php if ($cs == "Pending") echo 'selected="selected"'; ?>>Pending</option>
                                    <option value="Solved" <?php if ($cs == "Solved") echo 'selected="selected"'; ?>>Solved</option>
                                    <option value="Unsolved" <?php if ($cs == "Unsolved") echo 'selected="selected"'; ?>>Unsolved</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form group">
                            <label class="control-label col-sm-4" for="cdes">Description*</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="cdes" placeholder="enter description" id="cdes" value=<?php echo $desc; ?>></input>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="officer_id">Officer ID* </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="officer_id" placeholder="enter officer_id" id="officer_id" value=<?php echo $off; ?> /><br>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h2>Accused Details</h2><br>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="accused_id">Accused ID* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="accused_id" placeholder="enter accused_id" id="accused_id" value=<?php echo $aid; ?> /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="aname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="aname" placeholder="enter name" id="aname" value=<?php echo $aname; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="astat">Status* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="astat" placeholder="enter status" id="astat" value=<?php echo $astat; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="arem">Remarks* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="arem" placeholder="enter remarks" id="arem" value=<?php echo $arem; ?>></input>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="aage">Age </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="aage" placeholder="enter age" id="aage" value=<?php echo $aage; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="agen">Gender </label>
                                <div class="col-sm-5">
                                    <select id="agen" class="form-control" name="agen" selected="<?php echo $agen ?>">
                                        <option value="Male" <?php if ($agen == "Male") echo 'selected="selected"'; ?>>Male</option>
                                        <option value="Female" <?php if ($agen == "Female") echo 'selected="selected"'; ?>>Female</option>
                                        <option value="Other" <?php if ($agen == "Other") echo 'selected="selected"'; ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h2>Victim Details</h2><br>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="victim_id">Victim ID* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="victim_id" placeholder="enter victim_id" id="victim_id" value=<?php echo $vid; ?> /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="vname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="vname" placeholder="enter name" id="vname" value=<?php echo $vname; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="vphone">Phone* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="vphone" placeholder="enter phone" id="vphone" value=<?php echo $vphone; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="vrem">Remarks* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="vrem" placeholder="enter remarks" id="vrem" value=<?php echo $vrem; ?>></input>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="vage">Age </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="vage" placeholder="enter age" id="vage" value=<?php echo $vage; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="vgen">Gender </label>
                                <div class="col-sm-5">
                                    <select id="vgen" class="form-control" name="vgen" selected="<?php echo $vgen ?>">
                                        <option value="Male" <?php if ($vgen == "Male") echo 'selected="selected"'; ?>>Male</option>
                                        <option value="Female" <?php if ($vgen == "Female") echo 'selected="selected"'; ?>>Female</option>
                                        <option value="Other" <?php if ($vgen == "Other") echo 'selected="selected"'; ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <hr>
                <div class="row">
                    <div class="col 12 col-sm-6">
                        <h2>Complainer Details</h2><br>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="complainer_id">Complainer ID* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="complainer_id" placeholder="enter complainer_id" id="complainer_id" value=<?php echo $coid; ?> /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="cname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="cname" placeholder="enter name" id="cname" value=<?php echo $cname; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="cphone">Phone* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="cphone" placeholder="enter phone" id="cphone" value=<?php echo $cphone; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="crem">Remarks* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="crem" placeholder="enter remarks" id="crem" value=<?php echo $crem; ?>></input>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="cage">Age </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="cage" placeholder="enter age" id="cage" value=<?php echo $cage; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="cgen">Gender </label>
                                <div class="col-sm-5">
                                    <select id="cgen" class="form-control" name="cgen" selected="<?php echo $cgen ?>">
                                        <option value="Male" <?php if ($cgen == "Male") echo 'selected="selected"'; ?>>Male</option>
                                        <option value="Female" <?php if ($cgen == "Female") echo 'selected="selected"'; ?>>Female</option>
                                        <option value="Other" <?php if ($cgen == "Other") echo 'selected="selected"'; ?>>Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <h2>Witness Details</h2><br>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="witness_id">Witness ID* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="witness_id" placeholder="enter witness_id" id="witness_id" value=<?php echo $wid; ?> /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="wname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="wname" placeholder="enter name" id="wname" value=<?php echo $wname; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="wphone">Phone* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="wphone" placeholder="enter phone" id="wphone" value=<?php echo $wphone; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="wrem">Remarks* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="wrem" placeholder="enter remarks" id="wrem" value=<?php echo $wrem; ?>></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h2>Section Details</h2><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="section_id">Section ID* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="section_id" placeholder="enter section_id" id="section_id" value=<?php echo $sid; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="sdesc">Description* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="sdesc" placeholder="enter description" id="sdesc" value=<?php echo $sdesc; ?>></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h2>Officer Details</h2><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-2" for="pos">Position* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="pos" placeholder="enter position" id="pos" value=<?php echo $pos; ?> />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-2" for="oname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="oname" placeholder="enter name" id="oname" value=<?php echo $oname; ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-2" for="branch">Branch </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="branch" placeholder="enter branch" id="branch" value="<?php echo $branch; ?>" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-2" for="add">Address </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="add" placeholder="enter address" id="add" value=<?php echo $add; ?> />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="container my-3 center">
                <button type="submit" class="btn btn-primary mb-2" style="height:35px; width:70px;font-size:15px;" name="submit" value="submit" id="submit">Update</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_GET['submit'])) {
        $cid = $_GET['crime_id'];
        $fir = $_GET['fir_no'];
        $dor = $_GET['date_of_report'];
        $desc = $_GET['cdes'];
        $off = $_GET['officer_id'];
        $cs = $_GET['case_status'];
        /*accused*/
        $aid = $_GET['accused_id'];
        $aname = $_GET['aname'];
        $astat = $_GET['astat'];
        $arem = $_GET['arem'];
        $aage = $_GET['aage'];
        $agen = $_GET['agen'];
        /*victim*/
        $vid = $_GET['victim_id'];
        $vname = $_GET['vname'];
        $vphone = $_GET['vphone'];
        $vrem = $_GET['vrem'];
        $vage = $_GET['vage'];
        $vgen = $_GET['vgen'];
        /*complainer*/
        $coid = $_GET['complainer_id'];
        $cname = $_GET['cname'];
        $cphone = $_GET['cphone'];
        $crem = $_GET['crem'];
        $cage = $_GET['cage'];
        $cgen = $_GET['cgen'];
        /*witness*/
        $wid = $_GET['witness_id'];
        $wname = $_GET['wname'];
        $wphone = $_GET['wphone'];
        $wrem = $_GET['wrem'];
        /*section*/
        $sid = $_GET['section_id'];
        $sdesc = $_GET['sdesc'];
        /*officer*/
        $pos = $_GET['pos'];
        $oname = $_GET['oname'];
        $branch = $_GET['branch'];
        $add = $_GET['add'];


        $cquery = "UPDATE crime SET db_id='1', fir_no ='$fir', date_of_report = '$dor', description = '$desc',officer_id ='$off',case_status = '$cs' WHERE crime_id= '$cid'";
        $aquery = "UPDATE accused SET crime_id='$cid', name = '$aname', status = '$astat', remarks = '$arem', age = '$aage', gender = '$agen' WHERE accused_id= '$aid'";
        $vquery = "UPDATE victim SET crime_id='$cid', name='$vname', remarks='$vrem', phone='$vphone', age='$vage', gender='$vgen' WHERE victim_id= '$vid'";
        $coquery = "UPDATE complainer SET crime_id='$cid', name = '$cname', remarks= '$crem', phone='$cphone', age='$cage', gender='$cgen' WHERE complainer_id= '$coid'";
        $wquery = "UPDATE witness SET crime_id='$cid', name='$wname', remarks='$wrem', phone='$wphone' WHERE witness_id= '$wid'";
        $squery = "UPDATE section SET crime_id='$cid', description='$sdesc' WHERE section_id= '$sid'";
        $oquery = "UPDATE officer SET position='$pos', name='$oname', branch='$branch', address='$add' WHERE officer_id='$off'";

        $da = mysqli_query($conn, $aquery);
        $dv = mysqli_query($conn, $vquery);
        $dco = mysqli_query($conn, $coquery);
        $dw = mysqli_query($conn, $wquery);
        $ds = mysqli_query($conn, $squery);
        $do = mysqli_query($conn, $oquery);
        $dc = mysqli_query($conn, $cquery);

        if ($dc && $da && $dv && $dco && $dw && $ds && $do) {
            echo "<font color='blue'>DATA EDITED SUCCESSFULLY!";
        } else {
            echo "<font color='red'>Some error occured";
        }
    }
    ?><br>
    <button type="submit" class="btn btn-outline-secondary mb-2" style="height:35px; width:70px;font-size:15px; margin-left:10px;">
        <a href="viewcrime.php">Back</a></button>
</body>

</html>