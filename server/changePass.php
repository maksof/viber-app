<?php
    
    if(isset($_POST['ChangePassword'])){
        
        session_start();
        $prePass = $_POST['pPass'];
        $newPass = $_POST['nPass'];
        $user = $_SESSION['username'];

        $myFile = getcwd().DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."tbl_login.txt";
        $lineBreak = "\n";
        $file = explode($lineBreak, file_get_contents($myFile));
        $isPasswordChange = false;
        for($i=0; $i < count($file); $i++){
            
            $data = explode("#",$file[$i]);
            $fuser = rtrim($data[0]);
            $fpass = rtrim($data[1]);
            $user = rtrim($user);
            $prePass = rtrim($prePass);
            
            if($fpass == $prePass && $fuser == $user){
                $file[$i] = $user." #".$newPass;
                $isPasswordChange = true;
            }
        }
        if($isPasswordChange){       
            $file = implode("\n",$file);
            file_put_contents($myFile, $file);
            session_destroy();
            header("Location: ../login.php");
            die();
        }else{
            header("Location: ../change-pass.php?notFound");
            die();
        }
    }
?>