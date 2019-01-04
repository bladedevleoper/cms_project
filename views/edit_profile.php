<?php
require_once( '../src/config.php' );

Session::start();
if(!isset($_SESSION['username'])){  
    Session::redirect('login.php');
}
    
if(isset($_GET['logout']) && $_GET['logout'] == true){

         
         $logout = new Login();
         $logout->isNotActive($_SESSION['user_id']);
         Session::destroy();
}

$profile = new Profile();
$user = $profile->getProfileDetails($_SESSION['username']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $profile->updateUser($_POST['fullname'], $_POST['email'], $_POST['username'],$_FILES['file'], $_SESSION['user_id']);
    // $profile->uploadImage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile of <?= ucwords($_SESSION['username']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
<div class="container">
        <?php include __DIR__ . '/nav.php'; ?>
    <div class="row">
        <div class="col">
            <h4>Edit Profile</h4>
        </div>
    </div>
        <div class="col-sm-5 mx-auto">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                       
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="<?= $user['FullName']; ?>">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>">
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="username" value="<?= $user['username']; ?>">
                </div>

                <div class="form-group">
                    <label>Upload Image</label>
                    <input type="file" class="form-control" name="file" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                    <a href="profile.php" class="btn btn-secondary">Cancel Edit</a>
                </div>
            
            </form>
        </div>
    
</div>

<?php include __DIR__ . '/footer.php'; ?>