<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mentee_details";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];  
    $email = $_POST["email"]; 

    $sql = $conn->prepare("SELECT * FROM mentees WHERE full_name=? AND email=?");
    $sql->bind_param("ss", $full_name, $email);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
    
        header("Location: index.php");
        exit;  
    } else {
       
        echo "Invalid username or email!";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: black;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 220px auto;
            position: relative;
            z-index: 1;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            background-color: blue;
            color: white;
            padding: 14px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: blue;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            overflow: hidden;
            z-index: 0;
        }

        .cube {
            position: absolute;
            width: 50px;
            height: 50px;
            border: 2px solid white; 
            background-color: transparent; 
            animation: move 3s infinite linear;
        }

        .cube:nth-child(1) {
            top: 10%;
            left: 20%;
        }

        .cube:nth-child(2) {
            top: 30%;
            left: 40%;
            animation-duration: 2s;
        }

        .cube:nth-child(3) {
            top: 50%;
            left: 60%;
            animation-duration: 4s;
        }

        .cube:nth-child(4) {
            top: 70%;
            left: 80%;
            animation-duration: 6s;
        }

        .cube:nth-child(5) {
            top: 90%;
            left: 10%;
            animation-duration: 5s;
        }

        @keyframes move {
            0% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(100px, 100px);
            }
            100% {
                transform: translate(0, 200px);
            }
        }
    </style>
</head>
<body>

<div class="background">
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
</div>


<div class="login-container">
    <h2>Login</h2>
    <form action="" method="POST">
        <input type="text" name="full_name" placeholder="Full Name" required><br> 
        <input type="email" name="email" placeholder="Email" required><br>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
