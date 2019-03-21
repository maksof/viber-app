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

var deleteRow = function(ip,name){
    document.getElementById('removeIp').click();
}