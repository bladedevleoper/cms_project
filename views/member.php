<?php
require_once( '../src/config.php' );

$members = new Members();
Session::start();
if(!isset($_SESSION['username'])){  
    Session::redirect('login.php');
}
    
if(isset($_GET['logout']) && $_GET['logout'] == true){

         
         $logout = new Login();
         $logout->isNotActive($_SESSION['user_id']);
         Session::destroy();
}
   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Members Section | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
    <?php include __DIR__ . '/nav.php'; ?>
        <div class="tag">
            <?php ErrorHandling::success('Logged in Successfully'); ?>   
        </div>


        <div class="row">

                        <?php if(count($members->activeMembers($_SESSION['username'])) == 0 ){
                            echo '<h4>No Active Users</h4>';
                        } else {
                            echo "<h4>Current Active Users</h4>";
                        }
                        ?>
                        
        </div>
        <div class="row">
                   
                    <div class="col-sm-2">
                        <ul class="list-group">
                            <?php foreach($members->activeMembers($_SESSION['username']) as $key => $user) : ?>
                                    <li class="list-group-item"><?= implode($user); ?></li> 
                            <?php endforeach;?>
                        </ul>
                    </div>               
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/js/functions.js"></script>
    <script>
    
        let tag = document.querySelector('.tag');
        var storage = window.localStorage;

        if(storage.logged == 'true'){
            tag.setAttribute('hidden','');

        } else {
            setInterval(() => {
            
                tag.style.display = 'none';
                storage.setItem('logged', true);
            
            }, 3000);
        }
    </script>

</body>
</html>