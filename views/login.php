<?php require_once( '../src/config.php' ); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Screen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
 
<div class="container">
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $login = new Login;
        $login->checkUser($_POST['username'], $_POST['password']);

    }
?>
</div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="container">
            <h4>Login Here</h4>
                <div class="form-grpup">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"/>
                </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-secondary">Register</a>
        </div>
    </form>


    <?php include __DIR__ . '/footer.php'; ?>