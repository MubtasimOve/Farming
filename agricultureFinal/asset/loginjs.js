
    const username = document.getElementById('userid')
    const password = document.getElementById('pass')
    const login = document.getElementById('loginform')
    const errorMes = document.getElementById('error')
    const iderror = document.getElementById('iderror')

    login.addEventListener('Submit', (e) =>
    {
        let messages = []

        if(username.value == null || username.value == '')
        {
            messages.push('ID is required')
            iderror.innerHTML('ID is required')

        }

        if(password.value == null || password.value == '')
        {
            messages.push('Password is required')

        }

        if (messages.length > 0)
        {
            console.log(messages.length)
            // console.log(password.value)
            e.preventDefault()
            errorMes.innerText = messages.join(', ')
        }
    })
    
                // function validId()
                // {
                //     // document.write();
                //     let username = document.getElementsByName('username').value;
                //     if (username != 'A')
                //     {
                //         document.getElementById("userid").innerHTML = "Enter Valid ID";
                //     }
                //     else
                //     {
                //         document.getElementById("userid").innerHTML = "";
                //     }


                // }
                // function validPass()
                // {
                //     let password = document.getElementsByName('password').value;
                //     var len = password.length;
                //     // document.write(len);
                //     if(len < 8)
                //     {
                //         document.getElementById("pass").innerHTML = "Password must be atleast 8 letters";
                //     }
                // }
