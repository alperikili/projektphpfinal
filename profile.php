<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: user_info.php"); 
    } else {
        echo "<p style='color: red; text-align: center;'>Invalid credentials!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}


.login-container {
    background-color: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

.login-title {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}


.login-input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: #f9f9f9;
}

.login-input:focus {
    border-color: #4CAF50;
    background-color: #fff;
}
.login-btn {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.login-btn:hover {
    background-color: #45a049;
}

p {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}

@media (max-width: 600px) {
    .login-container {
        width: 90%;
    }
}

    </style>
</head>
<body>

    <div class="login-container">
        <h2 class="login-title">Login Details</h2>
        <form method="post" action="login.php" class="login-form">
            <input type="text" name="username" placeholder="Username" required class="login-input">
            <input type="password" name="password" placeholder="Password" required class="login-input">
        </form>
    </div>
</body>
</html>


