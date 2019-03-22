<?php session_start(); if(!$_SESSION['username']) header("Location:login.php"); ?>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Security Panel</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Security Panel">
    <meta name="author" content="maksof.com">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/premium.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/notify.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript"> $(function() { $(".knob").knob(); }); </script>
    <script src="assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
  </head>
  <body class="theme-blue">
    <div class="navbar navbar-default" role="navigation">
      <div class="navbar-collapse collapse" style="height: 1px;">
        <div style="height: 49px;width: 200px;float: left;padding: 15px;">
          <a href="" style="color: #fff; font-size: 15px;">Security Panel</a>
        </div>
        <ul id="main-menu" class="nav navbar-nav navbar-right">
          <li class="dropdown hidden-xs">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="fa fa-user padding-right-small" style="position:relative;top: 3px;"></span> <?php echo $_SESSION['username']; ?>
            <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a href="change-pass.php">Password Change</a></li>
              <li class="divider"></li>
              <li><a tabindex="-1" href="server/logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div class="main-content">
        <div class="btn-toolbar list-toolbar">
          <div class="col-sm-12 col-md-9">
            <a href="#myModaladd" role="button" data-toggle="modal" style="background-color: #e93030;color: #0d0d0e;"><button class="btn btn-primary1"> Network IP</button></a>
            <a href="#myModaladdrouting" role="button" data-toggle="modal"><button class="btn btn-primary2"> Routing IP</button></a>
            <a href="#myModaladdmapping" role="button" data-toggle="modal"><button class="btn btn-primary3"> Mapping IP</button></a>
          </div>
          <div class="col-sm-12 col-md-3" style="float:right">
            <a href="#myModal2" role="button" data-toggle="modal"><button class="btn btn-danger"> Stop Firewall </button></a>
            <a href="#myModal3" role="button" data-toggle="modal"><button class="btn btn-danger"> Server Restart</button></a>
          </div>
          <div class="btn-group">
          </div>
        </div>
        <div style="width:100%">
          <!-- NETWORKING IP TABLE -->
          <div style="width:33%;float:left;padding: 3px;">
            <table class="table">
              <thead>
                <tr style="color: #b63434;">
                  <th>#</th>
                  <th>Network Name</th>
                  <th>Public IP</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php              
                  $myFile = getcwd().DIRECTORY_SEPARATOR."server".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."tbl_networking.txt";  
                  $file = explode("\n", file_get_contents($myFile));
                  for($i=0; $i < count($file); $i++ ) { 
                    $data = explode("#",$file[$i]);
                    $SRNo = $i+1;
                        if(count($data) > 1){
                ?>
                  <tr style="color: #b63434;font-weight: bold;">
                    <td><?php echo $SRNo; ?></td>
                    <td><?php echo $data[1]; ?></td>
                    <td><?php echo $data[0]; ?></td>
                    <td>
                      <a href="#myModal" id="removeip" role="button" data-toggle="modal" data-id="<?php echo 'NETWORKING-'.$data[0]; ?>"><i class="fa fa-trash-o"></i></a>
                      <a href="#updateModal" id="updateIp" role="button" data-toggle="modal" data-id="<?php echo 'NETWORKING-'.$data[0]; ?>"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                <?php                       
                      }
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- ROUTING IP TABLE -->
          <div style="width:33%;float:left;padding: 3px;">
            <table class="table">
              <thead>
                <tr style="color: #247748;">
                  <th>#</th>
                  <th>Routing Name</th>
                  <th>Public IP</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php              
                  $myFile = getcwd().DIRECTORY_SEPARATOR."server".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."tbl_routing.txt";  
                  $file = explode("\n", file_get_contents($myFile));
                  for($i=0; $i < count($file); $i++ ) { 
                    $data = explode("#",$file[$i]);
                    $SRNo = $i+1;
                        if(count($data) > 1){
                ?>
                  <tr style="color: #b63434;font-weight: bold;">
                    <td><?php echo $SRNo; ?></td>
                    <td><?php echo $data[1]; ?></td>
                    <td><?php echo $data[0]; ?></td>
                    <td>
                      <a href="#myModal" id="removeip" role="button" data-toggle="modal" data-id="<?php echo 'ROUTING-'.$data[0]; ?>"><i class="fa fa-trash-o"></i></a>
                      <a href="#updateModal" id="updateIp" role="button" data-toggle="modal" data-id="<?php echo 'ROUTING-'.$data[0]; ?>"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                <?php                       
                      }
                  }
                ?>
              </tbody>
            </table>
          </div>
          <!-- MAPPING IP TABLE -->
          <div style="width:33%;float:left;padding: 3px;">
            <table class="table">
              <thead>
                <tr style="color: #5528bc;">
                  <th>#</th>
                  <th>Mapping Name</th>
                  <th>Public IP</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php              
                  $myFile = getcwd().DIRECTORY_SEPARATOR."server".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."tbl_mapping.txt";  
                  $file = explode("\n", file_get_contents($myFile));
                  for($i=0; $i < count($file); $i++ ) { 
                    $data = explode("#",$file[$i]);
                    $SRNo = $i+1;
                        if(count($data) > 1){
                ?>
                  <tr style="color: #b63434;font-weight: bold;">
                    <td><?php echo $SRNo; ?></td>
                    <td><?php echo $data[1]; ?></td>
                    <td><?php echo $data[0]; ?></td>
                    <td>
                      <a href="#myModal" id="removeip" role="button" data-toggle="modal" data-id="<?php echo 'MAPPING-'.$data[0]; ?>"><i class="fa fa-trash-o"></i></a>
                      <a href="#updateModal" id="updateIp" role="button" data-toggle="modal" data-id="<?php echo 'MAPPING-'.$data[0]; ?>"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                <?php                       
                      }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
     
        <!-- DELETE CONFIRMATION MODAL -->
        <div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h3 id="myModalLabel">Delete Confirmation</h3>
              </div>
              <div class="modal-body">
                <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete this record?</p>
              </div>
              <form class="removeips" action="server/delete.php" method="post">
                <input type="hidden" name="ipid" id="ipid">
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </div>
              </form>
            </div>
          </div>
        </div>
		<!-- Update Modal -->
        <div class="modal small fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h3 id="myModalLabel">Update Modal</h3>
              </div>
              <form class="updateips" action="server/update.php" method="post">
                <input type="hidden" name="ipid" id="ipid">
                  <div class="modal-body">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-3 col-md-3">
                          <label>Service</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                          <input name="serviceName" id="service" value="" type="text" class="form-control" required="">
                        </div>
                        <div class="col-sm-3 col-md-3">
                          <label>Enter IP</label>
                        </div>
                        <div class="col-sm-9 col-md-9">
                          <input name="ipName" id="ip" value="117.102.60.113" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}" type="text" class="form-control" required="">
                        </div>
                   </div>
                  </div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                  <button class="btn btn-danger" type="submit">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- STOP FIREWALL CONFIRMATION MODAL -->
        <div class="modal small fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="http://173.82.52.190:6969/login/index.php/ipallow/firewallstop" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                  <h3 id="myModalLabel">Stop IP Filter</h3>
                </div>
                <div class="modal-body">
                  <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to Stop this service?<br>The system will become vulnerable to attacks.</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                  <button class="btn btn-danger">Disable</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- SERVER RESTART CONFIRMATION MODAL -->
        <div class="modal small fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="http://173.82.52.190:6969/login/index.php/ipallow/vosrestart" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                  <h3 id="myModalLabel">Restart VOS Services</h3>
                </div>
                <div class="modal-body">
                  <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to Restart Your Server?</p>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">NO</button>
                  <button class="btn btn-danger">Yes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- ADD NETWORKING IP RECORDS MODAL -->
        <div class="modal small fade" id="myModaladd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 id="myModalLabel">Add New Network IP</h3>
              </div>
              <form action="server/save.php?table=NETWORKING" method="post">
                <div class="modal-body">
                  <div class="col-sm-12 col-md-12">
                    <div class="col-sm-3 col-md-3">
                      <label>Service</label>
                    </div>
                    <div class="col-sm-9 col-md-9">
                      <input name="name" value="" type="text" class="form-control" required="">
                    </div>
                    <div class="col-sm-3 col-md-3">
                      <label>Enter IP</label>
                    </div>
                    <div class="col-sm-9 col-md-9">
                      <input name="ip" value="117.102.60.113" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}" type="text" class="form-control" required="">
                    </div>
                  </div>
                  <div style="float: right;margin-top:20px;">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-danger">Add</button>
                  </div>
                </div>
                <br>
                <div class="modal-footer">
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- ADD ROUTING IP RECORDS MODAL -->
        <div class="modal small fade" id="myModaladdrouting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 id="myModalLabel">Add New Routing IP</h3>
              </div>
              <form action="server/save.php?table=ROUTING" method="post">
                <div class="modal-body">
                  <div class="col-sm-12 col-md-12">
                    <div class="col-sm-3 col-md-3">
                      <label>Service</label>
                    </div>
                    <div class="col-sm-9 col-md-9">
                      <input name="name" value="" type="text" class="form-control" required="">
                    </div>
                    <div class="col-sm-3 col-md-3">
                      <label>Enter IP</label>
                    </div>
                    <div class="col-sm-9 col-md-9">
                      <input name="ip" value="117.102.60.113" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}" type="text" class="form-control" required="">
                    </div>
                  </div>
                  <div style="float: right;margin-top:20px;">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-danger">Add</button>
                  </div>
                </div>
                <br>
                <div class="modal-footer">
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- ADD MAPPING IP RECORDS MODAL -->
        <div class="modal small fade" id="myModaladdmapping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                <h3 id="myModalLabel">Add New Mapping IP</h3>
              </div>
              <form action="server/save.php?table=MAPPING" method="post">
                <div class="modal-body">
                  <div class="col-sm-12 col-md-12">
                    <div class="col-sm-3 col-md-3">
                      <label>Service</label>
                    </div>
                    <div class="col-sm-9 col-md-9">
                      <input name="name" value="" type="text" class="form-control" required="">
                    </div>
                    <div class="col-sm-3 col-md-3">
                      <label>Enter IP</label>
                    </div>
                    <div class="col-sm-9 col-md-9">
                      <input name="ip" value="117.102.60.113" pattern="\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}" type="text" class="form-control" required="">
                    </div>
                  </div>
                  <div style="float: right;margin-top:20px;">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-danger">Add</button>
                  </div>
                </div>
                <br>
                <div class="modal-footer">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/login.js"></script>
    <script src="assets/js/notify.js"></script>

   <?php
        if(isset($_GET['login'])){
            $email = $_GET['email'];
            $pass = $_GET['pass'];

            $filename = getcwd().DIRECTORY_SEPARATOR."server".DIRECTORY_SEPARATOR."user.txt";
            $file = fopen( $filename, "r" );

            if( $file == false ) {
                echo ( "Error in opening file" );
                exit();
            }

            $filesize = filesize( $filename );
            $filetext = fread( $file, $filesize );
            fclose( $file );

            $userObj = unserialize($filetext);

            if($email == $userObj->user && $pass == $userObj->pass){       
                header('Location:public/dashboard.php');
            }else{
                echo "<pre style='color:white;'>User Not Login</pre>";
            }
        }

        if(isset($_SESSION['delete'])){
            echo "<script> toaster('Success','Data delete successfully','success'); </script>";
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update'])){
            echo "<script> toaster('Success','Data update successfully','success'); </script>";
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['save'])){
            echo "<script> toaster('Success','Data Add successfully','success'); </script>";
            unset($_SESSION['save']);
        }
    ?>
   
    <script type="text/javascript">
      $(document).on("click", "#removeip", function () {
          var id = $(this).data('id');
          $(".removeips #ipid").val( id );
      });
      
      $(document).on("click", "#updateIp", function () {
          var id = $(this).data('id');
          $(".updateips #ipid").val( id );
          var ip = id.split('-');
          var fileUrl = '';
          
          if(ip[0] == 'NETWORKING') fileUrl = "tbl_networking.txt";
   	      else if(ip[0] == 'MAPPING') fileUrl = "tbl_mapping.txt";
   	      else if(ip[0] == 'ROUTING') fileUrl = "tbl_routing.txt";

            $.get('server/db/'+fileUrl, function(data) {
                var lines = data.split("\n");
                $.each(lines, function(n, elem) {
                    var fileData = elem.split('#');
                    if(ip[1] == fileData[0]){
                        $("#ip").val(fileData[0].trim());
                        $("#service").val(fileData[1].trim());
                    }
                });
            });
      });
      
      function startfirewall()
      {
      $.ajax({
         type: "POST",
         url: "http://173.82.52.190:6969/login/index.php/login/check_user",
         success: function(msg)
         {
           if(msg=="true")
           {
          $("#usr_verify").css({ "display": "none" });
           }
           else
          {
                document.getElementById('profileUsername').value='';
                 $("#usr_verify").css({ "display": "inline" });
          }
        }
        });
      };
      
    </script>
    <footer>
      <hr>
      <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
      <br><br>
      <center>
        <p>Copyright © <script type="text/javascript">document.write(new Date().getFullYear());</script> <a href="" target="_blank">VPN4BD  Security Authentication Panel </a> All Rights Reserved.
          Developed by <a target="_blank" href="http://maksof.com">MAKSOF</a></p>
      </center>
      <p></p>
    </footer>
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
      $("[rel=tooltip]").tooltip();
      $(function() {
          $('.demo-cancel-click').click(function(){return false;});
      });
    </script>
  </body>
  <loom-container id="lo-engage-ext-container">
    <loom-shadow classname="resolved"></loom-shadow>
  </loom-container>
</html>