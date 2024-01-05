<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
	<style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .hello-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 100%;
            color: #333333;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
        }

        p {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555555;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
	<div class="hello-container">
        <h2>Hello, <?php echo $user_data['user_name']; ?></h2>
        <p>Welcome to my games store website. I'm delighted to have you here.</p>
        <a onclick="exploreMore()">Explore More</a>
    </div>
    <script>
        function exploreMore() {
            <?php
            // Include the JavaScript redirection script
            if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
                echo 'window.location.href = "https://lavidore.github.io/lavie-studio/";';
                unset($_SESSION['login_success']); // Reset the flag after redirection
            }
            ?>
        }
    </script>
</body>
</html>