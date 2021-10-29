function validation()
{
    var user_email =document.loginFrm.user.value;  
    var user_password =document.loginFrm.pass.value;

    if (user_email == "" && user_password == "")
    {
        alert("Email and Password fields are empty.");
        return false;
    }
    else
    {
        if(user_email =="")
        {
            alert("Email field is empty.");
            return false;
        }
        if(user_password == "")
        {
            alert("Password field is empty.")
            return false;
        }
    }

}
