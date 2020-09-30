<?php

$conn = mysqli_connect("localhost", "root", "sim#0729#", "assam_police");

if($conn)
{
    echo "";
}
else{
    die("Connection failed because ".mysqli_connect_error());

}

?>