<?php 
	if(isset($_POST['ipid'])) {
        session_start();
        $name = $_POST['serviceName'];
        $ip = $_POST['ipName'];
		$ipAddress = $_POST['ipid'];
		$fileType = explode("-", $ipAddress);
        
		if($fileType[0] == 'NETWORKING') $fileUrl = "tbl_networking.txt";
		else if($fileType[0] == 'MAPPING') $fileUrl = "tbl_mapping.txt";
		else if($fileType[0] == 'ROUTING') $fileUrl = "tbl_routing.txt";
		$ipAddress = $fileType[1];
        
        $myFile = getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR.$fileUrl;  
        $lineBreak = "\n";
        $file = explode($lineBreak, file_get_contents($myFile));
        for($i=0; $i < count($file); $i++){
            $data = explode("#",$file[$i]);
            if($data[0] == $ipAddress){
                shell_exec("sudo /sbin/iptables -A Admin -s ".$ipAddress." -j ACCEPT");
                shell_exec("sudo service iptables save");
                $file[$i] = $ip." #".$name;
            }
        }
        $file = implode("\n",$file);
        file_put_contents($myFile, $file);
        $_SESSION['update'] = 'update';
        header("Location: ../index.php");
		die();
	} else {
		header("Location: ../index.php");
		die();
	}
?>