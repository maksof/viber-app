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
       <div class="modal-dialog text-center">
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
        </div>
    </body>
</html>
<script src="assets/js/login.js"></script>
<script src="assets/js/notify.js"></script>

<?php 
    
    if(isset($_GET['invalid'])){
        echo "
            <script>
                window.notificationService.notify({
                  // title
                  title: 'Login Error!',
                  // notification message
                  text: 'Invalid username or password',
                  // 'success', 'warning', 'error'
                  type: 'error',
                  // 'top-right', 'bottom-right', 'top-left', 'bottom-left'
                  position: 'top-right',
                  // auto close
                  autoClose: true,
                  // 5 seconds
                  duration: 5000,
                  // shows close button
                  showRemoveButton: true
                })

            </script>";
    }

    if(isset($_GET['dateError'])){
        echo "
            <script>
                window.notificationService.notify({
                  title: 'Login Error!',
                  text: 'Date is expire please contact admin',
                  type: 'error',
                  position: 'top-right',
                  autoClose: true,
                  duration: 5000,
                  showRemoveButton: true
                })

            </script>";
    }

?>






















