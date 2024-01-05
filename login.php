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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
            
                    if ($user_data['password'] === $password) {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        $_SESSION['login_success'] = true;
                        header("Location: index.php"); // Redirect to a PHP file instead of HTML
                        exit();
                    }
                }
            }
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	body {
            background-color: #3498db;
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
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #button:hover {
            background-color: #2980b9;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

	</style>

	<div id="box">
		
		<form method="post">
			<div>Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

            <p>Don't have an account yet? 
			<a href="signup.php">Sign up</a><br><br>
    </p>
		</form>
	</div>
</body>
</html>