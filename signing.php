<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #333;
        }
        #login {
            margin-top: 100px;
            padding: 40px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #007bff;
            margin-bottom: 30px;
        }
        .btn-info {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-info:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .text-info {
            color: #007bff;
        }
        .text-info:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="login" class="container">
        <h3 class="text-center">Login Form</h3>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="login-box">
                    <form id="login-form" class="form" action="/signing-func.php" method="post">
                        <h3 class="text-center">Sign In</h3>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            <div class="mt-2">
                                <a href="/signup.php" class="text-info"><strong>Register here</strong></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


