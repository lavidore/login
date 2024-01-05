<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	body {
            background-color: #2ecc71;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 300px;
            width: 100%;
        }

        #box div {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        #text {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #button {
            width: 100%;
            padding: 10px;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #button:hover {
            background-color: #27ae60;
        }

        a {
            color: #2ecc71;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

	</style>

	<div id="box">
		
		<form method="post">
			<div>Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>