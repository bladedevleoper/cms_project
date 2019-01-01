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



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>