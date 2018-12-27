<?php
    require_once( '../src/config.php' );
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $database = new Database();
        $database->register($_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['username']);
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h3>Register</h5>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    
        <label for="fullname">Full Name</label>
        <input type="text" name="fullname" id="fullname" /> </br>
        <label for="email">Email</label>
        <input name="email" id="name" type="text" /></br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password"/></br>
        <label for="username">User Name</label>
        <input type="text" name="username" id="username"/>

        <button type="submit">Register</button>
    </form>
</body>
</html>