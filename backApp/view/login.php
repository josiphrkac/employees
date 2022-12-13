<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">
        <h1>Login</h1>
        <p>Please fill this form to login!</p>
        <label for="email">E-mail</label>
        <input type="email" name="email" value="<?php echo $data['email']; ?>">
        <p><?php if (isset($data['email_error'])) {
                echo $data['email_error'];
            } ?>
        </p>
        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo $data['password']; ?>">
        <p><?php if (isset($data['password_error'])) {
                echo $data['password_error'];
            } ?>
        </p>

        <input type="submit" value="Submit">
        <p>Do not have an account?</p>
        <h2><a href="<?php echo URLROOT; ?>/users/register">Register</a></h2>
    </form>
</body>

</html>