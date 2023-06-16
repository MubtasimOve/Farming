
function LoginValid(LoginForm) 
{
    const username = LoginForm.username.value;
    const password = LoginForm.password.value;

    /console.log(fname + " " + lname);/

    if (username===""  || password==="") {
        document.getElementById("message").innerHTML = "Username and Password required!";
        return false;
    }

    return true;
}

function changeValid(LoginForm) 
{
    // const username = LoginForm.username.value;
    const currpassword = LoginForm.currpassword.value;
    const newpassword = LoginForm.newpassword.value;
    const newconpassword = LoginForm.newconpassword.value;

    /console.log(fname + " " + lname);/

    if (newconpassword === "" || currpassword === "" || newpassword === "") {
        document.getElementById("message").innerHTML = "Password required!";
        return false;
    }

    return true;
}
