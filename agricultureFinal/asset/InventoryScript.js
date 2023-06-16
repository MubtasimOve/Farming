$(document).ready(function()
{

    // updateFarmer();
    $(document).on('click','#table tbody .data', function()
    {
        // let clicked = document.getElementById('updatebutton').clicked;
        
        let flag = false;
        
        var id = $(this).find('td:eq(0)').text();
        var name = $(this).find('td:eq(1)').text();
        var price = $(this).find('td:eq(2)').text();
        var status = $(this).find('td:eq(3)').text();
        var stock = parseInt($(this).find('td:eq(4)').text());   

             
                document.getElementById('editid').value = id;
                document.getElementById('editname').value = name;
                document.getElementById('editnum').value = price;
                document.getElementById('editdob').value = stock;

            if(status == 'Healthy')
            {
                document.getElementById('genderinputm').checked = true;
                flag = false;
            }
            else
            {
                document.getElementById('genderinputf').checked = true;
                flag = true;
            } 

            if(document.getElementById('updatebutton').clicked == true)
            {
                updateInventory();        
            
            } 
            if(document.getElementById('deletebutton').clicked == true)
            {
                deleteInventory();        
            
            } 
        
        $('#table tr').removeClass('highlightdata');
        $(this).addClass('highlightdata');

    });
});


function updateInventory()
{  
    document.getElementById('deletebutton').clicked = false;  
    document.getElementById('edit').innerHTML = `
    <fieldset style="width:82.5%">
            <legend id="legend">Update Inventory</legend>
            <form action="../controller/editorFarmer.php" method="post">
                <table>
                    
                    <tr>
                        <td>ID: </td>
                        <td><input type="text" name="changeID" id="editid" placeholder="Enter ID to update" readonly/></td>

                        <td>Unit Price: </td>
                        <td><input type="number" name="changeID" id="editnum" placeholder="Enter ID to update"/></td>

                    </tr>
                    
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="changeID" id="editname" placeholder="Enter ID to update"/></td>

                        </tr>

                    <tr>
                        <td>Status: </td>
                        <td><input type="radio" name="gender" id="genderinputm" value="Healthy"/>Healthy <input type="radio" name="gender" id="genderinputf" value="Unhealthy"/>Unhealthy</td>

                        <td>Stock: </td>
                        <td><input type="number" min='0' name="changeID" id="editdob" placeholder="Enter ID to update"/></td>
                    </tr>
                    <tr><td><input type="button" name="submit" id="applyChanges" value="Apply changes" onclick="change()"></td></tr>
                </table>
            </form>
        </fieldset>`;


 
}

// function to update changes made
function change()
{   
    let flag = false; 
    let userdata = [];

    if(document.getElementById('genderinputf').checked == true)
    {
        userdata = {
                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'price':document.getElementById('editnum').value,
                        'stock':document.getElementById('editdob').value,
                        'status':document.getElementById('genderinputf').value
                    };
    }
    else if (document.getElementById('genderinputm').checked == true)
    {
        userdata = {
                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'price':document.getElementById('editnum').value,
                        'stock':document.getElementById('editdob').value,
                        'status':document.getElementById('genderinputm').value
                    };
    }

    const error = " is empty";
    
    for (var key in userdata) 
    {
        console.log(userdata[key]);
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
        
        xhttp.open('POST', '../controller/iupdator.php', true);
        xhttp.onreadystatechange = function()
        {

            if(this.readyState == 4 && this.status == 200)
            {
                location.reload();
                // document.getElementById("edit").innerHTML = this.responseText;
            }             
        }
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");     
        xhttp.send('data='+json);
    }
     
                    
}

function deleteInventory()
{
    document.getElementById('updatebutton').clicked = false;
    document.getElementById("edit").innerHTML = `Select Product to Delete
                    <br/>ID:
<input type="text" name="changeID" id="editid" placeholder="Enter ID to update" readonly/> <input type="button" name="submit" value="Delete" onclick="confirmDelete()">`;

    // console.log(id);

}

function confirmDelete()
{
    id = document.getElementById('editid').value;

    if(id == "")
    {
        alert("Please enter id to drop");
    }
    else
    {
        confirmation = confirm("Are you sure you want to delete the user?");

        if (confirmation == true)
        {
            console.log(id);

            let xhttp = new XMLHttpRequest();
        
            xhttp.open('POST', '../controller/ideletor.php', true);
            xhttp.onreadystatechange = function()
            {

                if(this.readyState == 4 && this.status == 200)
                {
                    location.reload();
                    // document.getElementById("edit").innerHTML = this.responseText;
                }             
            }
            
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");     
            xhttp.send("ID="+id);

        }
        else{
            console.log('not delete');
        }
    }
}

function addProduct()
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
        newid = "P-00" + idnum.toString();
    }
    else if(idnum.toString().length = 2)
    {
        newid = "P-0" + idnum.toString();
    }
    else if(idnum.toString().length = 3)
    {
        newid = "P-" + idnum.toString();
    }


    console.log(newid);

    updateInventory();
    
    document.getElementById('legend').innerHTML = 'Add Product';
    // document.getElementById('edittype').value = '';
    document.getElementById('editid').value = newid;
    document.getElementById('applyChanges').innerHTML = '<input type="button" name="submit" value="Apply Changes" onclick="Add()">';

}

function Add()
{
    
    // alert('add apply button');
    let flag = false;

    let userdata = [];
    // let years = document.getElementById('editep').value.toString() + " years";

    if(document.getElementById('genderinputf').checked == true)
    {
        userdata = {
                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'price':document.getElementById('editnum').value,
                        'stock':document.getElementById('editdob').value,
                        'status':document.getElementById('genderinputf').value
                    };
    }
    else if (document.getElementById('genderinputm').checked == true)
    {
        // console.log(typeof years);
        userdata = {
                        'id':document.getElementById('editid').value,
                        'name':document.getElementById('editname').value,
                        'price':document.getElementById('editnum').value,
                        'stock':document.getElementById('editdob').value,
                        'status':document.getElementById('genderinputm').value
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
        
        xhttp.open('POST', '../controller/iadder.php', true);
        xhttp.onreadystatechange = function()
        {

            if(this.readyState == 4 && this.status == 200)
            {
                // location.reload();
                // console.log(123);
                document.getElementById('edit').innerHTML = this.responseText; 
                // alert('works');
            }             
        }
        
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");     
        xhttp.send('data='+json);
    }
}