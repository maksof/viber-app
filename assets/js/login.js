var loginValidation = function(){
    var email = document.forms['loginForm']['email'].value;
    var pass = document.forms['loginForm']['pass'].value;
    if(!email){
        toaster('Warning','Enter email','warning');
        return false;
    }else if(!pass){
        toaster('Warning','Enter password','warning');
        return false;
    }else{
        return true;
    }
}

var NetworkValidation = function(){
    var service = document.forms['netForm']['netService'].value;
    var IP = document.forms['netForm']['netIP'].value;
    if(!service){
        toaster('Warning','Enter Service','warning');
        return false;
    }else if(!IP){
        toaster('Warning','Enter IP','warning');
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
        toaster('Warning','Enter previous password','warning');
        return false;
    }else if(!newPass){
        toaster('Warning','Enter new password','warning');
        return false;
    }else if(!confirmPass){
        toaster('Warning','Enter confirm password','warning');
        return false;
    }else if(newPass != confirmPass){
        toaster('Warning','Password not match','warning');
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