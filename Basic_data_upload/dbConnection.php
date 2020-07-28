<?php
    $connection = mysqli_connect("localhost","root","","testing");
    if (!$connection) {
        echo "Error Connecting Database<br>".mysqli_error($connection);
        die();
    }
?>