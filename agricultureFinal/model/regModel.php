<?php

	require_once('db.php');

    function registration($user)
    {
        
        $conn = getconnection();
        $sql = "INSERT INTO registrationtable VALUES(";
        $sql2 = "INSERT INTO usertable VALUES('$user[0]','$user[1]','$user[2]')";

        for($i = 0; $i < count($user); $i++)
        {
            if($i == count($user)-1)
                $sql = $sql."'".$user[$i]."'".');';
            else
                $sql = $sql."'".$user[$i]."'".', ';
        }
        // echo $sql;
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        


        return true;
    }

    function fetchData($userid)
    {
        $conn = getconnection();
		$sql = "select * from registrationtable where UserID='{$userid}';";
		$result = mysqli_query($conn, $sql);
		$data = $result->fetch_array();
		$count = mysqli_num_rows($result);
        return $data;
    }

    function updateData($userdata, $id)
    {
        echo $id;
        $conn = getconnection();
		$sql = "UPDATE registrationtable 
                SET 
                name='{$userdata->name}',
                email='{$userdata->email}',
                phone='{$userdata->phone}',
                address='{$userdata->address}',
                dob='{$userdata->dob}',
                gender='{$userdata->gender}',
                degree='{$userdata->degree}',
                experience='{$userdata->ep}',
                skills='{$userdata->skills}' 
                where UserID='{$id}';";

        $sqluser = "UPDATE usertable SET name='{$userdata->name}' WHERE UserID='{$id}';";

		$result = mysqli_query($conn, $sql);
		$resultuser = mysqli_query($conn, $sqluser);
		// $data = $result->fetch_array();
		// $count = mysqli_num_rows($result);
        // return $data;



    }
?>


