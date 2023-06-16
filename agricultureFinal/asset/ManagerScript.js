
// let flag = false;
$(document).ready(function()
{

    // updateFarmer();
    $(document).on('click','#table tbody .data', function()
    {
        // let flag = false;
        
        var id = $(this).find('td:eq(0)').text();
        var name = $(this).find('td:eq(1)').text();
        var type = $(this).find('td:eq(2)').text();
        var distribution = $(this).find('td:eq(3)').text();
        var gender = $(this).find('td:eq(4)').text();
        var phone = parseInt($(this).find('td:eq(5)').text());
        var email = $(this).find('td:eq(6)').text();
        var dob = $(this).find('td:eq(7)').text();
        var epyears = parseInt($(this).find('td:eq(8)').text());
        var education = $(this).find('td:eq(9)').text();
        var degree = $(this).find('td:eq(10)').text();
        var salary = parseInt($(this).find('td:eq(11)').text());       

              
            document.getElementById('editid').value = id;
            document.getElementById('editname').value = name;
            document.getElementById('edittype').value = type;
            document.getElementById('editdistribution').value = distribution;
            document.getElementById('editnum').value = phone;
            document.getElementById('editemail').value = email;
            document.getElementById('editdob').value = dob;
            document.getElementById('editep').value = epyears;
            document.getElementById('editsalary').value = salary;
            document.getElementById('editeducation').value = education;
            document.getElementById('editdegree').value = degree;

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

            if(document.getElementById('updatebutton').clicked == true)
            {
                updateSales();
            }
            else if(document.getElementById('deletebutton').clicked == true)
            {
                deleteManager();
            }
        $('#table tr').removeClass('highlightdata');
        $(this).addClass('highlightdata');

    });
});


function updateSales()
{  
    document.getElementById('deletebutton').clicked = false;  
    document.getElementById('edit').innerHTML = `
    <fieldset style="width:82.5%">
            <legend id="legend">Update Manager</legend>
            <form action="../controller/SalesEdit.php" method="post">
                <table>
                    
                    <tr>
                        <td>ID: </td>
                        <td id='userid'><input type="text" name="changeID" id="editid" placeholder="Enter ID to update" readonly/></td>

                        <td>Phone: </td>
                        <td><input type="number" name="changeID" min="0" id="editnum" placeholder="Enter ID to update"/></td>

                        <td>Experience: </td>
                        <td><input type="number" name="changeID" id="editep" min="0" placeholder="Enter ID to update"/></td>

                    </tr>
                    
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="changeID" id="editname" placeholder="Enter ID to update"/></td>

                        <td>Email: </td>
                        <td><input type="email" name="changeID" id="editemail" placeholder="Enter ID to update"/></td>

                        <td>Distribution: </td>
                        <td><input type="text" name="changeID" id="editdistribution" placeholder="Enter ID to update"/></td>

                    </tr>

                    <tr>
                        <td>User Type: </td>
                        <td><input type="text" name="changeID" id="edittype" placeholder="Enter ID to update" readonly/></td>

                        <td>Date of Birth: </td>
                        <td><input type="date" name="changeID" id="editdob" placeholder="Enter ID to update"/></td>

                        <td>Education: </td>
                        <td><input type="text" name="changeID" id="editeducation" placeholder="Enter ID to update"/></td>
                    </tr>

                    <tr>
                        <td>Gender: </td>
                        <td><input type="radio" name="gender" id="genderinputm" value="Male"/>Male <input type="radio" name="gender" id="genderinputf" value="Female"/>Female</td>

                        <td>Degree: </td>
                        <td><input type="text" name="changeID" id="editdegree" placeholder="Enter ID to update"/></td>

                        <td>Salary: </td>
                        <td><input type="number" name="changeID" min="0" id="editsalary" placeholder="Enter ID to update"/></td>
                    </tr>

                    <tr><td id="applyChanges"><input type="button" name="submit" value="Apply changes" onclick="change()"></td></tr>
                </table>
            </form>
        </fieldset>`;


 
}

// function to update changes made
function change()
{    
    let flag = false;
    let userdata = [];
    let years = document.getElementById('editep').value.toString() + " years";

    if(document.getElementById('genderinputf').checked == true)
    {
        userdata = {

                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'type':document.getElementById('edittype').value,
                        'distribution':document.getElementById('editdistribution').value,
                        'phone':document.getElementById('editnum').value,
                        'email':document.getElementById('editemail').value,
                        'dob':document.getElementById('editdob').value,
                        'epyears':years,
                        'gender':document.getElementById('genderinputf').value,
                        'salary':document.getElementById('editsalary').value,
                        'education':document.getElementById('editeducation').value,
                        'degree':document.getElementById('editdegree').value
                    };
    }
    else if (document.getElementById('genderinputm').checked == true)
    {
        console.log(typeof years);
        userdata = {
                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'type':document.getElementById('edittype').value,
                        'distribution':document.getElementById('editdistribution').value,
                        'phone':document.getElementById('editnum').value,
                        'email':document.getElementById('editemail').value,
                        'dob':document.getElementById('editdob').value,
                        'epyears':years,
                        'gender':document.getElementById('genderinputm').value,
                        'salary':document.getElementById('editsalary').value,
                        'education':document.getElementById('editeducation').value,
                        'degree':document.getElementById('editdegree').value
                    };
    }

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

        console.log(json);

        let xhttp = new XMLHttpRequest();
        
        xhttp.open('POST', '../controller/SalesEdit.php', true);
        xhttp.onreadystatechange = function()
        {

            if(this.readyState == 4 && this.status == 200)
            {
                location.reload();
                console.log(123);
                document.getElementById('edit').innerHTML = this.responseText; 
                // alert('works');
            }             
        }
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");     
        xhttp.send('data='+json);
    }
     
                    
}

function deleteManager()
{
    document.getElementById('updatebutton').clicked = false;
    document.getElementById("edit").innerHTML = `Select User to Delete
                    <br/>ID:
<input type="text" name="changeID" id="editid" placeholder="Select ID to Delete" readonly/> <input type="button" name="submit" value="Delete" onclick="confirmDelete()">`;

    // console.log(id);

}

function confirmDelete()
{
    let flag = false;
    id = document.getElementById('editid').value;

    if (id == "")
    {
            alert("Please select id to drop");
            flag = true;
        
    }
    else
    {
        confirmation = confirm("Are you sure you want to delete the user?");

        if (confirmation == true)
        {
            console.log(id);

            let xhttp = new XMLHttpRequest();
        
            xhttp.open('POST', '../controller/deletorSales.php', true);
            xhttp.onreadystatechange = function()
            {

                if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementById('edit').innerHTML = this.responseText; 
                    location.reload();
                }             
            }
            
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");     
            xhttp.send("ID="+id);
        
        }
        else
        {
            console.log('not delete');
        }
    }  
}

function addManager()
{
    var thizz = document.getElementById('table'); 
    var lastid = $(thizz).closest('table').find('tr').last().find('td').first().text();
    const splitid = lastid.split('-');
    console.log('last id = ', splitid);

    var idnum = parseInt(splitid[1]) + 1;


    console.log(idnum);
    // console.log(idnum.toString().length);

    if(idnum.toString().length = 1)
    {
        newid = "S-00" + idnum.toString();
    }
    else if(idnum.toString().length = 2)
    {
        newid = "S-0" + idnum.toString();
    }
    else if(idnum.toString().length = 3)
    {
        newid = "S-" + idnum.toString();
    }


    console.log(newid);
    



    updateSales();
    
    document.getElementById('legend').innerHTML = 'Add Manager';
    document.getElementById('edittype').value = 'Salesperson';
    document.getElementById('editid').value = newid;
    document.getElementById('applyChanges').innerHTML = '<input type="button" name="submit" value="Apply changes" onclick="Add()">';

}

function Add()
{
    let flag = false;
    // alert('add apply button');

    let userdata = [];
    let years = document.getElementById('editep').value.toString() + " years";

    if(document.getElementById('genderinputf').checked == true)
    {
        userdata = {

                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'type':document.getElementById('edittype').value,
                        'distribution':document.getElementById('editdistribution').value,
                        'phone':document.getElementById('editnum').value,
                        'email':document.getElementById('editemail').value,
                        'dob':document.getElementById('editdob').value,
                        'epyears':years,
                        'gender':document.getElementById('genderinputf').value,
                        'salary':document.getElementById('editsalary').value,
                        'education':document.getElementById('editeducation').value,
                        'degree':document.getElementById('editdegree').value
                    };
    }
    else if (document.getElementById('genderinputm').checked == true)
    {
        console.log(typeof years);
        userdata = {
                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'type':document.getElementById('edittype').value,
                        'distribution':document.getElementById('editdistribution').value,
                        'phone':document.getElementById('editnum').value,
                        'email':document.getElementById('editemail').value,
                        'dob':document.getElementById('editdob').value,
                        'epyears':years,
                        'gender':document.getElementById('genderinputm').value,
                        'salary':document.getElementById('editsalary').value,
                        'education':document.getElementById('editeducation').value,
                        'degree':document.getElementById('editdegree').value
                    };
    }

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
        
        xhttp.open('POST', '../controller/addersales.php', true);
        xhttp.onreadystatechange = function()
        {

            if(this.readyState == 4 && this.status == 200)
            {
                location.reload();
                console.log(123);
                document.getElementById('edit').innerHTML = this.responseText; 
                // alert('works');
            }             
        }
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");     
        xhttp.send('data='+json);
    }
}

