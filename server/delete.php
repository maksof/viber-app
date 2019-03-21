<?php 
	if(isset($_POST['ipid'])) {
		$ipAddress = $_POST['ipid'];
		$fileType = explode("-", $ipAddress);
		if($fileType[0] == 'NETWORKING') $fileUrl = "tbl_networking.txt";
		else if($fileType[0] == 'MAPPING') $fileUrl = "tbl_mapping.txt";
		else if($fileType[0] == 'ROUTING') $fileUrl = "tbl_routing.txt";
		echo $ipAddress = $fileType[1];
	} else {
		header("Location: ../index.php");
		die();
	}
?>