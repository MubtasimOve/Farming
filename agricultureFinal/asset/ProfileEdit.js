let names = document.getElementById("namediv").innerText;
let email = document.getElementById("emaildiv").innerText;
let phone = document.getElementById("phonediv").innerText;
let address = document.getElementById("addressdiv").innerText;
let dob = document.getElementById("dobdiv").innerText;
let gender = document.getElementById("genderdiv").innerText;
let degree = document.getElementById("degreediv").innerText;
let epyears = document.getElementById("epdiv").innerText;
let skills = document.getElementById("skillsdiv").innerText;

let flag = false;

function EditOpt()
{
    document.getElementById("namediv").innerHTML = "<input type='text' id='nameinput'/>";
    document.getElementById("nameinput").value = names;

    document.getElementById("emaildiv").innerHTML = "<input type='email' id='emailinput'/>";
    document.getElementById("emailinput").value = email;

    document.getElementById("phonediv").innerHTML = "<input type='text' id='phoneinput' />";
    document.getElementById("phoneinput").value = phone;

    document.getElementById("addressdiv").innerHTML = "<input type='text' id='addressinput' />";
    document.getElementById("addressinput").value = address;

    document.getElementById("dobdiv").innerHTML = '<input type="date" name="dob" id="dobinput" value=""/></td>';
    document.getElementById("dobinput").value = dob;

    document.getElementById("genderdiv").innerHTML = '<input type="radio" name="gender" id="genderinputm" value="Male"/>Male <input type="radio" name="gender" id="genderinputf" value="Female"/>Female';
    // document.getElementById("genderinput").ariaChecked = true;
    if(gender == 'Male')
    {
        document.getElementById('genderinputm').checked = true;
        // flag = false;
    }
    else
    {
        document.getElementById('genderinputf').checked = true;
        // flag = true;
    }

    document.getElementById("degreediv").innerHTML = "<input type='text' id='degreeinput' '/>";
    document.getElementById('degreeinput').value = degree;

    document.getElementById("epdiv").innerHTML = "<input type='text' id='epinput' '/>";
    document.getElementById("epinput").value = epyears;

    document.getElementById("skillsdiv").innerHTML = "<input type='text' id='skillsinput' '/>";
    document.getElementById("skillsinput").value = skills;

    document.getElementById('editButton').innerHTML = '<a href="javascript:change()">Save</a>';

    
}

function change()
{    
    let userdata = [];
    if(document.getElementById('genderinputf').checked == true)
    {
        userdata = {
                        'name':document.getElementById("nameinput").value,
                        'email':document.getElementById("emailinput").value,
                        'phone':document.getElementById("phoneinput").value,
                        'address':document.getElementById("addressinput").value,
                        'dob':document.getElementById("dobinput").value,
                        'gender':document.getElementById("genderinputf").value,
                        'degree':document.getElementById('degreeinput').value,
                        'ep':document.getElementById("epinput").value,
                        'skills':document.getElementById("skillsinput").value
                    };
    }
    else if (document.getElementById('genderinputm').checked == true)
    {
        userdata = {
                        'name':document.getElementById("nameinput").value,
                        'email':document.getElementById("emailinput").value,
                        'phone':document.getElementById("phoneinput").value,
                        'address':document.getElementById("addressinput").value,
                        'dob':document.getElementById("dobinput").value,
                        'gender':document.getElementById("genderinputm").value,
                        'degree':document.getElementById('degreeinput').value,
                        'ep':document.getElementById("epinput").value
                    };
    }

    // let field;
    // for(field in userdata)
    // {
    //     alert(field);
    //     if (field == null)
    //     {
    //         alert('field cannot be empty');
    //         break;
    //     }
    // }

    const error = " is empty";
    
    for (var key in userdata) 
    {
        // console.log(userdata[key]);
        if(userdata[key] === "")
        {            
            alert(key+error);
            flag = true;
            break;
        }
        else 
        {
            flag = false;
        }
    }


    if(!flag)
    {
        let json = JSON.stringify(userdata);
        console.log(userdata);

        let xhttp = new XMLHttpRequest();
        //xhttp.open('GET', 'userCheck.php?username='+username, true);
        xhttp.open('POST', '../controller/profile_edit.php', true);
        xhttp.onreadystatechange = function()
        {

            if(this.readyState == 4 && this.status == 200)
            {
                // document.getElementById('editButton').innerHTML = this.responseText;
                // history.back();
                location.reload();
            }             
        }
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");     
        xhttp.send('data='+json);
    }    
                    
}