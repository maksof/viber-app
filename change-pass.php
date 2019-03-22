<?php session_start(); if(!$_SESSION['username']) header("Location:login.php"); ?>
<!DOCTYPE html>
<html lang="">
    <head>
        <link rel="stylesheet" href="assets/css/style.css" >
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
        <link rel="stylesheet" type="text/css" href="assets/css/premium.css">
        <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/notify.css">
    </head>
    <body class="background">
       <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <form method="post" class='col-12' onsubmit="return changePassValidate()" name="changePass" action="server/changePass.php">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Previous Password" name="pPass">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="New Password" name="nPass">
                        </div>
                         <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="cPass">
                        </div>
                        <button type="submit" class="btn btn-primary button" name="ChangePassword">
                            <i class="fa fa-sign-in-alt"></i> Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="assets/js/login.js"></script>
<script src="assets/js/notify.js"></script>


<?php 
    if(isset($_SESSION['notFound'])){
        echo "<script> toaster('Reset Error!','Old password not match','error') </script>";
        unset($_SESSION['notFound']);
    }

?>