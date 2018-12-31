<?php
require_once( '../src/config.php' );
    Session::start();
    //Session::destroy();
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
        <div class="tag">
            <?php
                ErrorHandling::success('Logged in Successfully');
            ?>   
        </div>

        <div class="row">
            <div class="col-sm-10">
                <span>Welcome <?php 
                    if(isset($_SESSION['username'])){
                        echo  $_SESSION['username'];
                    }
                    //var_dump($_SESSION, self::$sessionStart);
                    ?>
                </span>

                
                <div>
                    
                    
                    <a href="<?php //Session::destroy(); ?>">Log out</a>
                   
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script>

let tag = document.querySelector('.tag');

setInterval(() => {
    tag.style.display = 'none';
}, 3000);

</script>
</body>
</html>