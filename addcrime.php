<?php

include("pdo/connection.php");
error_reporting(0);

?>

<html>

<head>
    <title>Add Crime Records</title>
</head>

<body id="addd">
    <?php include 'pdo/headers.php'; ?>
    <link rel="stylesheet" href="pdo/style.css">

    <h1 style="margin-left:10px;"><br>Enter Crime Details</h1><br>
    <div id="form">
        <form action="" method="GET">
            <div class="container">
                <div class="col-12">
                    <br>
                    <div class="row">
                        <h2>Primary Details</h2><br>
                    </div><br>
                    <div class="row">

                        <div class="form group">
                            <label class="control-label col-sm-3" for="crime_id">Crime ID* </label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="crime_id" placeholder="enter crime_id" id="crime_id" value="" /><br>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="fir_no">FIR number* </label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" name="fir_no" placeholder="enter fir_no" id="fir_no" value="" /><br>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="date_of_report">Date Of Report* </label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" name="date_of_report" placeholder="enter date_of_report" id="date_of_report" value="" /><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form group">
                            <label class="control-label col-sm-4" for="cdes">Description*</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="cdes" placeholder="enter description" id="cdes" value=""></textarea>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="officer_id">Officer ID* </label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="officer_id" placeholder="enter officer_id" id="officer_id" value="" /><br>
                            </div>
                        </div>
                        <div class="form group">
                            <label class="control-label col-sm-3" for="case_status">Case Status*</label>
                            <div class="col-sm-2">
                                <select id="case_status" class="form-control" name="case_status">
                                    <option value="Pending">Pending</option>
                                    <option value="Solved">Solved</option>
                                    <option value="Unsolved">Unsolved</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <br>
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h2>Accused Details</h2><br>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="accused_id">Accused ID* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="accused_id" placeholder="enter accused_id" id="accused_id" value="" /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="aname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="aname" placeholder="enter name" id="aname" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="astat">Status* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="astat" placeholder="enter status" id="astat" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="arem">Remarks* </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="arem" placeholder="enter remarks" id="arem" value=""></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="aage">Age </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="aage" placeholder="enter age" id="aage" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="agen">Gender </label>
                                <div class="col-sm-5">
                                    <select id="agen" class="form-control" name="agen">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
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
                                    <input type="text" class="form-control" name="victim_id" placeholder="enter victim_id" id="victim_id" value="" /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="vname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="vname" placeholder="enter name" id="vname" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="vphone">Phone* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="vphone" placeholder="enter phone" id="vphone" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="vrem">Remarks* </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="vrem" placeholder="enter remarks" id="vrem" value=""></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="vage">Age </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="vage" placeholder="enter age" id="vage" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="vgen">Gender </label>
                                <div class="col-sm-5">
                                    <select id="vgen" class="form-control" name="vgen">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
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
                                    <input type="text" class="form-control" name="complainer_id" placeholder="enter complainer_id" id="complainer_id" value="" /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="cname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="cname" placeholder="enter name" id="cname" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="cphone">Phone* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="cphone" placeholder="enter phone" id="cphone" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="crem">Remarks* </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="crem" placeholder="enter remarks" id="crem" value=""></textarea>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="cage">Age </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="cage" placeholder="enter age" id="cage" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="cgen">Gender </label>
                                <div class="col-sm-5">
                                    <select id="cgen" class="form-control" name="cgen">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
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
                                    <input type="text" class="form-control" name="witness_id" placeholder="enter witness_id" id="witness_id" value="" /><br>
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="wname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="wname" placeholder="enter name" id="wname" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="wphone">Phone* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="wphone" placeholder="enter phone" id="wphone" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="wrem">Remarks* </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="wrem" placeholder="enter remarks" id="wrem" value=""></textarea>
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
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="section_id">Section ID* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="section_id" placeholder="enter section_id" id="section_id" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="sdesc">Description* </label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="sdesc" placeholder="enter description" id="sdesc" value=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h2>Officer Details</h2><br>
                        <div class="row">
                            <div class="form group">
                                <label class="control-label col-sm-3" for="pos">Position* </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="pos" placeholder="enter position" id="pos" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="oname">Name* </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="oname" placeholder="enter name" id="oname" value="" />
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="branch">Branch </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="branch" placeholder="enter branch" id="branch" value="" />
                                </div>
                            </div>
                            <div class="form group ">
                                <label class="control-label col-sm-3" for="add">Address </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="add" placeholder="enter address" id="add" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container my-3 center">
                <button type="submit" class="btn btn-primary btn-large mb-2 " style="height:35px; width:70px;font-size:15px;" name="submit" value="submit" id="submit">Submit</button>
            </div>
        </form>
    </div><br>

    <?php
    if ($_GET['submit']) {
        /*crime*/
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


        if (
            $cid != "" && $fir != "" && $dor != "" && $desc != "" && $off != "" && $cs != "" && $aid != "" && $aname != "" && $astat != "" && $arem != ""
            && $vid != "" && $vname != "" && $vphone != ""  && $vrem != "" && $coid != "" && $cname != "" && $cphone != "" && $crem != ""
            && $wid != "" && $wname != "" && $wphone != "" && $wrem != "" && $sid != "" && $sdesc != "" && $pos != "" && $oname != ""
        ) {
            $cquery = "INSERT INTO crime VALUES ('1','$cid','$fir','$dor','$desc','$off','$cs')";
            $aquery = "INSERT INTO accused VALUES ('$aid','$cid','$aname','$astat', '$arem', '$aage', '$agen')";
            $vquery = "INSERT INTO victim VALUES ('$vid','$cid','$vname','$vrem', '$vphone', '$vage', '$vgen')";
            $coquery = "INSERT INTO complainer VALUES ('$coid','$cid','$cname','$crem', '$cphone', '$cage', '$cgen')";
            $wquery = "INSERT INTO witness VALUES ('$wid','$cid','$wname','$wrem', '$wphone')";
            $squery = "INSERT INTO section VALUES ('$sid', '$cid', '$sdesc')";
            $oquery = "INSERT INTO officer VALUES ('$off', '$pos', '$oname', '$branch', '$add')";

            $da = mysqli_query($conn, $aquery);
            $dv = mysqli_query($conn, $vquery);
            $dco = mysqli_query($conn, $coquery);
            $dw = mysqli_query($conn, $wquery);
            $ds = mysqli_query($conn, $squery);
            $do = mysqli_query($conn, $oquery);
            $dc = mysqli_query($conn, $cquery);


            if ($dc && $da && $dv && $dco && $dw && $ds && $do) {
                echo "<h4><font color='green'>DATA INSERTED INTO DATABASE SUCCESSFULLY!</font></h4>";
            }
        } else {
            echo "<h4><font color='red'>* fields are required</font></h4>";
        }
    } else {
        echo "<h3><font color='blue'>Click on Submit to add your Record</font></h3>";
    }
    ?>
    <br>
    <button type="submit" class="btn btn-outline-secondary mb-2" style="height:35px; width:70px;font-size:15px; margin-left:10px;">
        <a href="viewcrime.php">Back</a></button>
</body>

</html>