<?php
include_once 'dbhinc.php';

	$temp = $_GET['id'];
	$sql = "DELETE FROM member WHERE member_id='$temp'";

	if (mysqli_query($conn, $sql)) {
		echo "<p>Record deleted successfully</p>";
	} 
	else {
		echo "Error deleting record: " . mysqli_error($conn);
	}
