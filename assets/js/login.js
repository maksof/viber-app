var loginValidation = function(){
    var email = document.forms['loginForm']['email'].value;
    var pass = document.forms['loginForm']['pass'].value;
    if(!email){
        toaster('Warning','Please enter email','warning');
        return false;
    }else if(!pass){
        toaster('Warning','Please enter password','warning');
        return false;
    }else{
        return true;
    }
}

var NetworkValidation = function(){
    var service = document.forms['netForm']['netService'].value;
    var IP = document.forms['netForm']['netIP'].value;
    if(!service){
        toaster('Warning','Please enter Service','warning');
        return false;
    }else if(!IP){
        toaster('Warning','Please enter IP','warning');
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
        toaster('Warning','Please enter old password','warning');
        return false;
    }else if(!newPass){
        toaster('Warning','Please enter new password','warning');
        return false;
    }else if(!confirmPass){
        toaster('Warning','Please enter confirm password','warning');
        return false;
    }else if(newPass != confirmPass){
        toaster('Warning','New password and confirm password must be same','warning');
        return false;
    }else{
        return true;
    }
}

var toaster = function (errorMsg,msg,type) {
   window.notificationService.notify({
        title: errorMsg,
        text: msg,
        type: type,
        position: 'top-right',
        autoClose: true,
        duration: 5000,
        showRemoveButton: true
    });
}

var deleteRow = function(ip,name){
    document.getElementById('removeIp').click();
}