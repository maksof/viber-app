<?php
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $myFile = getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."tbl_login.txt";  
        $tbl_date = getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."tbl_date.txt";
        $loginDate = file_get_contents($tbl_date);
        $lineBreak = "\n";
        $file = explode($lineBreak, file_get_contents($myFile));
        $date = date("Y/m/d");
        echo $loginDate;
        if($date < $loginDate){
            for($i=0; $i < count($file); $i++){
                $data = explode("#",$file[$i]);
                $femail = rtrim($data[0]);
                $fpass = rtrim($data[1]);
                if($pass == $fpass && $email == $femail){
                    session_start();
                    $_SESSION["usename"] = $femail;
                    header("Location: ../index.php");
                    die();
                }
            } 
            header("Location: ../login.php?invalid");
            die();
        }else{
            header("Location: ../login.php?dateError");
            die();
        }
    }
?>