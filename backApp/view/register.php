<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo URLROOT; ?>/users/register" method="POST">
        <h1>Register</h1>
        <p>Please fill this form to create an account!</p>
        <label for="name">Username</label>
        <input type="text" name="name" value="<?php echo $data['name']; ?>">
        <p><?php if (isset($data['name_error'])) {
                echo $data['name_error'];
            } ?>
        </p>

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
        <label for="password">Repeat Password</label>
        <input type="password" name="repeat_password" value="<?php echo $data['repeat_password']; ?>">
        <p><?php if (isset($data['repeat_password_error'])) {
                echo $data['repeat_password_error'];
            } ?>
        </p>
        <input type="submit" value="Submit">
        <p>Already have an account ?</p>
        <h2><a href="<?php echo URLROOT; ?>/users/login">Log in</a></h2>
    </form>
</body>

</html>