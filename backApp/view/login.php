<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <h1>Login</h1>
        <p>Please fill this form to log in!</p>

        <label for="email">E-mail</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">

        <p>Already have an account ?</p>
        <h2><a href="<?php echo URLROOT; ?>/users/register">Register</a></h2>


    </form>
</body>

</html>