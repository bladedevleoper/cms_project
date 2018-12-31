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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h3>Register</h5>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" class="form-control" name="fullname" id="fullname" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" class="form-control"  id="name" type="text" />
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control"  name="password" id="password"/>
    </div>
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" name="username" id="username"/>
    </div>
       

        <button class="btn btn-primary" type="submit">Register</button>
        <a href="login.php" class="btn btn-secondary">Back to Login</a>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>