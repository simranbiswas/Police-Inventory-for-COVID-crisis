<?php

$conn = mysqli_connect("localhost", "root", "", "assam_police");

if($conn)
{
    echo "";
}
else{
    die("Connection failed because ".mysqli_connect_error());

}

?>