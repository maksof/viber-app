<!DOCTYPE html>
<html lang="">
    <head>
        <link rel="stylesheet" href="assets/css/style.css" >
         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
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
        <div class="loginMainContainer">
            <div class="loginCon text-center">
                <h2>Login</h2>
                <form method="post" class='col-12' onsubmit="return loginValidation()" name="loginForm" action="server/checkLogin.php">
                    <div class="row mx-0">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Username" name="email">
                                <span id="emailErr" class="error"></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter Password" name="pass">
                                <span id="passErr" class="error"></span>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-block button" name="login">
                                <i class="fa fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
       <!-- <div class="modal-dialog text-center">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <form method="post" class='col-12' onsubmit="return loginValidation()" name="loginForm" action="server/checkLogin.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Username" name="email">
                            <span id="emailErr" class="error"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter Password" name="pass">
                            <span id="passErr" class="error"></span>
                        </div>
                        <button type="submit" class="btn btn-primary button" name="login">
                            <i class="fa fa-sign-in-alt"></i> Login
                        </button>
                    </form>
                </div>
            </div>
        </div> -->
    </body>
</html>
<script src="assets/js/login.js"></script>
<script src="assets/js/notify.js"></script>

<?php 
    session_start();
    if(isset($_SESSION['invalid'])){
        echo "<script> toaster('Login Error','Invalid username or password','error'); </script>";
        unset($_SESSION['invalid']);
    }
    if(isset($_SESSION['passChange'])){
        echo "<script> toaster('Success','Password change please login again','success'); </script>";
        unset($_SESSION['passChange']);
    }
    if(isset($_SESSION['dateError'])){
        echo "<script> toaster('Login Error','Date is expire please contact admin','error'); </script>";
         unset($_SESSION['dateError']);
    }

?>






















