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


<?php include __DIR__ . '/footer.php'; ?>