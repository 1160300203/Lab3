<?php
    $conn=mysqli_connect('localhost', 'debian-sys-maint', 'u0kdbTu0JPf01068', 'laixin') or die ('Error! '.mysqli_connect_error($conn));

    // Implement the code here.
    $id = $_GET['id'];
    $newattendance = $_GET['newattendance'];
    $query = "update attendancelist set attendOrNot = '$newattendance' where id = '$id'";
    $result = mysqli_query($conn, $query) or die("Error! ".mysqli_error($conn));

?>