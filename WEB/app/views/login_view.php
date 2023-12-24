<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glegoo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/signInUp.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/header.css">
</head>

<body>
    <div class="backGroundLogin">
        <?php include_once("header_template.php") ?>
        <form class="form" id="form">
            <div class="block">
                Login
            </div>
            <input type="text" class="loginInput firstInput" name="login" placeholder="Enter a Login" required><br>
            <input type="password" name="password" placeholder="Enter a password" required><br>

            <button type="submit">Login</button><br>
            <p class="or">OR</p>
            <a href="/ilya/EXAM/WEB/user/registration" class="href">Register</a>
        </form>
    </div>

    <script src="/ilya/EXAM/WEB/app/scripts/login.js"></script>
</body>
</html>