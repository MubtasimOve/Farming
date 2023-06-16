<?php

	require_once('db.php');
	// if(isset($_COOKIE['astatus']) && isset($_SESSION['id']) && isset($_SESSION['pass']))
    // {
	function login($username, $password)
	{
		
		$conn = getconnection();
		$sql = "select * from usertable where UserID='{$username}' and Password='{$password}'";
		$result = mysqli_query($conn, $sql);
		$data = $result->fetch_assoc();
		$count = mysqli_num_rows($result);
		
		if($count > 0)
		{
			$_SESSION['id'] = $username;
			$_SESSION['pass'] = $password;
			$_SESSION['name'] = $data['Name'];
			// echo $data['Name'];
			return true;
		}
		else
		{
			return false;
		}
	}


	function signup($user){
		$conn = getconnection();
		$sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";
		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);

		if($count > 0){
			return true;
		}else{
			return false;
		}
	
	}
	function userCheck($userid)
	{
		// echo "abc";
		$conn = getconnection();
		$sql = "select * from usertable where UserID='{$userid}'";
		$result = mysqli_query($conn, $sql);
		$data = $result->fetch_assoc();
		$count = mysqli_num_rows($result);

		if ($count>0)
			return true;
		else
			return false;
	}
	function changePass($password)
	{
		$conn = getconnection();
		$sql = "UPDATE usertable SET Password = '{$password}' WHERE UserID = '{$_SESSION['id']}'";
		$result = mysqli_query($conn, $sql);
		// $data = $result->fetch_assoc();
		// $count = mysqli_num_rows($result);

		if ($conn->query($sql) == true)
		{
			return true;
		}
		else
			return false;

	}
// }
// else
// {
// 	echo "Invalid request";
// 	echo "<br><a href='../view/login.php'>Login</a>";
// }
 
?>