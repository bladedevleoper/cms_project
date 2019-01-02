<?php
    require_once( '../src/config.php' );

    Session::start();
    if(!isset($_SESSION['username'])){  
        Session::redirect('login.php');
    }
        
    if(isset($_GET['logout']) && $_GET['logout'] == true){
    
             Session::destroy();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $post = new Post();
        $post->postArticle($_POST['title'], $_POST['body'], $_SESSION['user_id']);
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Post Article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php include __DIR__ . '/nav.php'; ?>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

    <div class="container">

        <div class="form-group">
            <label for="title">Title of Post</label>
            <input type="text" class="form-control" name="title" id="title"/>
        </div>

        <div class="form-group">
            <label for="body">Article Story</label>
            <textarea class="form-control" name="body" id="body"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Article</button>

    </div>


</form>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>