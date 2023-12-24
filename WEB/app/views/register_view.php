<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Glegoo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/signInUp.css">
    <link rel="stylesheet" href="/ilya/EXAM/WEB/app/css/header.css">
</head>

<body>
    <div class="backGroundRegister">
        <?php include_once("header_template.php") ?>
        <form class="form" id="form">
            <div class="block">
                Register
            </div>
            <input type="text" class="login firstInput" name="login" placeholder="Enter a Login" required><br>
            <input type="email" class="email" name="email" placeholder="Enter an Email" required><br>
            <input type="text" class="address" name="address" placeholder="Enter an Address" required><br>
            <input type="password" name="password1" placeholder="Enter a password" required><br>
            <input type="password" name="password2" placeholder="Repeat password" required><br>

            <button type="submit">Register</button><br>
            <p class="or">OR</p>
            <a href="/ilya/EXAM/WEB/user/authentication" class="href">Login</a>
        </form>
    </div>
    <script src="/ilya/EXAM/WEB/app/scripts/register.js"></script>
</body>

</html>