<?php 

if(isset($_GET['table']) && isset($_POST['name']) && isset($_POST['ip']))
{	
   	if($_GET['table'] == 'NETWORKING') $fileUrl = "tbl_networking.txt";
   	else if($_GET['table'] == 'MAPPING') $fileUrl = "tbl_mapping.txt";
   	else if($_GET['table'] == 'ROUTING') $fileUrl = "tbl_routing.txt";

   	$serviceName = $_POST['name'];
   	$ip = $_POST['ip'];
   	$myFile = getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR.$fileUrl;
   	echo $myFile;
   	$fh = fopen($myFile, 'a') or die("Sorry, file can not be opened!");
   	$lineBreak = "\n";
   	$stringData = $ip." #".$serviceName;
   	fwrite($fh, $lineBreak.$stringData);
   	fclose($fh);
   	header("Location: ../index.php");
	die();
} else {
	header("Location: ../index.php");
	die();
}
?>