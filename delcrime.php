<?php
include("pdo/connection.php");
$crime_id = $_GET['crime_id'];
$officer_id=$_GET['officer_id'];

$cquery = "DELETE FROM crime WHERE crime_id='$crime_id'";
$aquery = "DELETE FROM accused WHERE crime_id='$crime_id'";
$vquery = "DELETE FROM victim WHERE crime_id='$crime_id'";
$coquery = "DELETE FROM complainer WHERE crime_id='$crime_id'";
$wquery = "DELETE FROM witness WHERE crime_id='$crime_id'";
$squery = "DELETE FROM section WHERE crime_id='$crime_id'";
$oquery = "DELETE FROM officer WHERE officer_id='$officer_id'";

$da = mysqli_query($conn, $aquery);
$dv = mysqli_query($conn, $vquery);
$dco = mysqli_query($conn, $coquery);
$dw = mysqli_query($conn, $wquery);
$ds = mysqli_query($conn, $squery);
$do = mysqli_query($conn, $oquery);
$dc = mysqli_query($conn, $cquery);


if ($dc && $da && $dv && $dco && $dw && $ds && $do) {
    echo "<script>alert('RECORD DELETED')</script>";
?>
    <meta HTTP-EQUIV="Refresh" CONTENT="0;" URL="http://localhost/hack/viewcrime.php">
<?php
} else {
    echo "<font color='red'>Sorry, some error occured";
}

?>