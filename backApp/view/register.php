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
        <h1>Register</h1>
        <p>Please fill this form to create an account!</p>
        <label for="name">Username</label>
        <input type="text" name="name">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <label for="repeat_password">Repeat Password</label>
        <input type="password" name="repeat_password">
        <p>Already have an account ?</p>
        <h2><a href="<?php echo URLROOT; ?>/users/login">Sign up</a></h2>


    </form>
</body>

</html>