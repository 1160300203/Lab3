<?php

	$conn=mysqli_connect('localhost', 'debian-sys-maint', 'u0kdbTu0JPf01068', 'laixin') or die ('Error! '.mysqli_connect_error($conn));

	if($_POST['show'] =='add') {
		// add code here
        $name = $_POST['newname'];
        $major = $_POST['newmajor'];
        $course = $_POST['newcourse'];
        $date = $_POST['newdate'];
        $attendance = $_POST['newattendance'];
        $query = "insert into attendancelist (studentname, major, course, coursedate, attendOrNot) values ('$name','$major','$course','$date','$attendance')";
        $result = mysqli_query($conn, $query) or die('Error! '.mysql_error($conn));
        $query = "select * from attendancelist";
        $result = mysqli_query($conn, $query) or die('Error! '.mysql_error($conn));
        while($row = mysqli_fetch_array($result)) {
            print "<div id=".$row['id'].">";
            print "<span class='attendOrNot'>".$row['attendOrNot']."</span>"."<h3> ".$row['studentname']." (".$row['major'].")"."</h3>";
            print "<h5>".$row['course']." on ".$row['coursedate']."</h5>";
            print "</div>";
		}
	} elseif ($_POST['show'] == 'all') {
        $query = 'select * from attendancelist';
        $result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
        while($row = mysqli_fetch_array($result)) {
            print "<div id=".$row['id'].">";
            print "<span onclick='changeState(document.getElementById(".$row['id'].").firstChild)'>".$row['attendOrNot']."</span>"."<h3> ".$row['studentname']." (".$row['major'].")"."</h3>";
            print "<h5>".$row['course']." on ".$row['coursedate']."</h5>";
            print "</div>";
        }
	}
	elseif ($_POST['show'] == 'major') {
		// add code here
        $value = $_POST['value'];
        $query = "select * from attendancelist where major = '$value'";
        $result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
        while($row = mysqli_fetch_array($result)) {
            print "<div id=".$row['id'].">";
            print "<span class='attendOrNot'>".$row['attendOrNot']."</span>"."<h3> ".$row['studentname']." (".$row['major'].")"."</h3>";
            print "<h5>".$row['course']." on ".$row['coursedate']."</h5>";
            print "</div>";
        }
	} elseif ($_POST['show'] == 'course') {
		// add code here
        $value = $_POST['value'];
        $query = "select * from attendancelist where course = '$value'";
        $result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
        while ($row = mysqli_fetch_array($result)) {
            print "<div id=" . $row['id'] . ">";
            print "<span class='attendOrNot'>" . $row['attendOrNot'] . "</span>" . "<h3> " . $row['studentname'] . " (" . $row['major'] . ")" . "</h3>";
            print "<h5>" . $row['course'] . " on " . $row['coursedate'] . "</h5>";
            print "</div>";
        }
	}
	mysqli_free_result($result);
    mysqli_close($conn);

?>


