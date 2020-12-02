<?php

include("pdo/connection.php");

error_reporting(0);

$cz_id = $_GET['cz_id'];

$query = "DELETE from `czone` WHERE cz_id='$cz_id' ";
$cz = mysqli_query($conn, $query);

if ($cz) {
    echo "<script>alert('RECORD DELETED')</script>";
?>
    <META HTTP-EQUIV="Refresh" CONTENT="0;" URL="http://localhost/hack/cont.php">
<?php
    header('Location: cont.php');

} else {
    echo "<font color='red'>Sorry, some error occured";
}

?>