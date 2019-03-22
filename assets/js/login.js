var loginValidation = function(){
    var email = document.forms['loginForm']['email'].value;
    var pass = document.forms['loginForm']['pass'].value;
    if(!email){
        alert("Please enter email address");
        return false;
    }else if(!pass){
        alert("Please enter password address")
        return false;
    }else{
        return true;
    }
}

var NetworkValidation = function(){
    var service = document.forms['netForm']['netService'].value;
    var IP = document.forms['netForm']['netIP'].value;
    if(!service){
        alert("Please enter Service");
        return false;
    }else if(!IP){
        alert("Please enter IP Address");
        return false;
    }else{
        return true;
    }
}

var changePassValidate = function(){
    var prePass = document.forms['changePass']['pPass'].value;
    var newPass = document.forms['changePass']['nPass'].value;
    var confirmPass = document.forms['changePass']['cPass'].value;
    if(!prePass){
        alert("Please previous password");
        return false;
    }else if(!newPass){
        alert("Enter new password");
        return false;
    }else if(!confirmPass){
        alert("Enter confirm password");
        return false;
    }else if(newPass != confirmPass){
        alert("Password not match");
        return false;
    }else{
        return true;
    }
}

var toaster = function (errorMsg,msg,type) {
   window.notificationService.notify({
        // title
        title: errorMsg,
        // notification message
        text: msg,
        // 'success', 'warning', 'error'
        type: type,
        // 'top-right', 'bottom-right', 'top-left', 'bottom-left'
        position: 'top-right',
        // auto close
        autoClose: true,
        // 5 seconds
        duration: 5000,
        // shows close button
        showRemoveButton: true
    });
}

var deleteRow = function(ip,name){
    document.getElementById('removeIp').click();
}