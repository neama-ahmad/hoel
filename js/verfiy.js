/*verfiy user input value*/
function check(){
    var email = document.getElementById('email');
    var fullName = document.getElementById('fullName');
    var password = document.getElementById('password');
    var ConfirmPassword = document.getElementById('ConfirmPassword');
    var error = document.getElementById('error');
    /*must to fill all inputs */  
    if(email.value==""|| fullName.value==""|| password.value=="" || ConfirmPassword.value==""){
        error.innerHTML ="**لا بد من تعبيئة كل البيانات**";
        return false; 
    }
    /*must password equal confirm password  */
    else if(password.value!= ConfirmPassword.value){
       ConfirmPassword.style.borderBottomColor = "indianred";
       ConfirmPassword.style.backgroundColor = "lightpink";
       ConfirmPassword.setCustomValidity("**كلمة المرور غير متطابقة**");
       error.innerHTML ="**كلمة المرور غير متطابقة**";
       return false;
    }

    else if(password.value == ConfirmPassword.value){
        ConfirmPassword.setCustomValidity('');
    }

    else {
        return true;
    }

    password.onchange = validatePassword;
    ConfirmPassword.onkeyup = validatePassword;


}





  
