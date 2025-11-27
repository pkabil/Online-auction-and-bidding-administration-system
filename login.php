<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background: linear-gradient(120deg, #f5f7fa, #c3cfe2);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .container {
            perspective: 1000px;
            width:500px;
        }

        .form-signin {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            transform-style: preserve-3d;
            transform: rotateY(0deg);
            transition: transform 0.8s ease, box-shadow 0.5s ease;
        }

        .form-signin:hover {
            transform: rotateY(5deg);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.25);
        }

        .form-signin-heading {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 6px;
            padding: 12px;
            font-size: 15px;
        }

        .checkbox {
            margin-bottom: 20px;
        }

        .btn-block {
            border-radius: 6px;
            padding: 12px;
            font-size: 16px;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="form-signin" action="login_result.php" method="post">
            <h2 class="form-signin-heading">User Login</h2>
            <label for="inputemail" class="sr-only">email</label>
            <input type="text" id="inputemail" class="form-control" placeholder="email" required autofocus name="email">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <?php
                $register = 'register.php';
                echo '<p>Not a user? <a href="' . $register . '">Register</a></p>';
            ?>
        </form>
    </div>
</body>

</html>
