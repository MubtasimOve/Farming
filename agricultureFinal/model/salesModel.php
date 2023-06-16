<?php
    // session_start();
    require_once('db.php');
    if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    {
    function viewSales()
    {
        $conn = getconnection();
        $sql = "SELECT * FROM saleslist";
        $result = mysqli_query($conn, $sql); 
        $count = mysqli_num_rows($result);   

        if($count > 0)
            {
                while ($user = mysqli_fetch_row($result))
                {
                    // $user = $result->fetch_array();
                    echo "<tr style='text-align: center' class='data' id='id'>";
                        for($i = 0; $i<count($user); $i++)
                        {
                            //echo "<br>";
                            echo "<td>".$user[$i]."</td>";
                        }
                    echo "</tr>";
                }
            }
        else
        {
            echo "could not fetch array";
        }


    }

    function updateData($userdata)
    {
        // $years = $userdata->epyears.' years';
        $conn = getconnection();
        $sql = "UPDATE saleslist 
            SET 
            name='{$userdata->name}',
            type='{$userdata->type}',
            gender='{$userdata->gender}',
            email='{$userdata->email}',
            phone='{$userdata->phone}',
            dob='{$userdata->dob}',
            distribution='{$userdata->distribution}',
            experience='{$userdata->epyears}',
            salary='{$userdata->salary}', 
            education='{$userdata->education}', 
            degree='{$userdata->degree}'
            where s_id='{$userdata->id}';";
        $result = mysqli_query($conn, $sql); 

        // $count = mysqli_num_rows($result);
    }
}
else
{
    echo "Invalid request";
    echo "<br><a href='../view/login.php'>Login</a>";
}

function deleteManager($id)
{
        $conn = getconnection();
        $sql = "DELETE FROM saleslist WHERE s_id='{$id}';";
        $result = mysqli_query($conn, $sql);
    
}

function addManager($userdata)
{
    $conn = getconnection();
        $sql = "INSERT INTO saleslist 
            VALUES( 
            '{$userdata->id}',
            '{$userdata->name}',
            '{$userdata->type}',
            '{$userdata->distribution}',
            '{$userdata->gender}',
            '{$userdata->phone}',
            '{$userdata->email}',
            '{$userdata->dob}',
            '{$userdata->epyears}',
            '{$userdata->education}', 
            '{$userdata->degree}', 
            '{$userdata->salary}');";
        $result = mysqli_query($conn, $sql); 

}
?>