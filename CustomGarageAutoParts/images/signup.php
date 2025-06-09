<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_recovery_service";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
		header('location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style type="text/css">
    body {

    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

section {
    margin: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
}

form {
    display: flex;
    flex-direction: column;
}

form label {
    margin-top: 10px;
}

form input, form textarea {
    margin-top: 5px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form button {
    margin-top: 20px;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

h2 {
    color: #333;
}

ul {
    list-style-type: disc;
    padding-left: 20px;
}
 footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 0px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
		 </style>
</head>
<body>

<header>
    <h1>Sign Up</h1>
</header>

<nav>
    <ul>
        <li><a href="index.php" class="roundedButton">Home</a></li>
        <li><a href="login.php" class="roundedButton">Login</a></li>
    </ul>
</nav>

<section>
    <h2>Create an account</h2>
    <form action="signup.php" method="post">
        <div>
            <label for="username">Username: </label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="Sign Up" class="roundedButton">
        </div>
		<p> <a href="index.html">Back</a></p>
    </form>
</section>
    <footer>
        <p>&copy;2024 Recovery service by Vasile </p>
    </footer>
</html>
