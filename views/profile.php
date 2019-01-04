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
            <h4>Profile</h4>
        </div>
    </div>  
        <div class="col-sm-5 mx-auto">
        <?php if(isset($_GET['success']) == true ){?>
        
            <div class="alert alert-success alert-dismissable fade show">
            <!-- output success message -->
                Profile updated successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php } ?>
             
             <?php 
            //  // move this into a class on Profile
            //  $dir = "profile_photos";
            // $fileArray = [];

            //  if(is_dir($dir)){
            //     if($dh = opendir($dir)){
            //         //print_r($dh);
            //         while(($file = readdir($dh)) != false){
            //             //echo "filename: " . $file . "</br>";
            //             //push to an array
            //             //look at base64 and include in the database
            //             array_push($fileArray, $file);
            //         }
            //         $tempArray = [];
            //         foreach($fileArray as $key => $value){
            //             $newString = substr($value, 0, strpos($value, "."));
            //             array_push($tempArray, $newString);
            //         }
            //         var_dump($tempArray);
            //         var_dump($fileArray);
            //         if(in_array($_SESSION['username'], $tempArray)){
            //             //foreach()
            //             // echo 'name in array';
            //             // foreach(){

            //             // }

            //         } else {
            //             echo 'not in array';
            //         }
            //         //close file directory
            //         closedir($dh);

                    
                    
            //     }
            //  }

             ?>
                <img class="img-thumbnail" src="<?php echo 'profile_photos/' . $user['user_img'];  ?>" />
             
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" value="<?= $user['FullName']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" value="<?= $user['email']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" value="<?= $user['username']; ?>" disabled>
                </div>
                <div class="form-group">
                    <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
                </div>
        </div>
    
</div>


<?php include __DIR__ . '/footer.php'; ?>