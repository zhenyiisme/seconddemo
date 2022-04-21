<?php
$conn = new mysqli("localhost","root","","library");
    
    if(isset($_POST['delete'])){
		
		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
		
		$sql = "DELETE FROM library WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			//success
			header('Location: index.php');

		}{
			//failure
			echo 'query error: ' .mysqli_error($conn);
		}
		
	}
	$conn->close();
?>