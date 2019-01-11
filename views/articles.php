<?php
require_once( '../src/config.php' );

//$members = new Members();
Session::start();
if(!isset($_SESSION['username'])){  
    Session::redirect('login.php');
}
    
if(isset($_GET['logout']) && $_GET['logout'] == true){

         
         $logout = new Login();
         $logout->isNotActive($_SESSION['user_id']);
         Session::destroy();
}
    $viewPost = new ViewPost($_GET['id']);
    $display = $viewPost->displayPost();

    $displayComments = new Articles();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo 'Comment posted';
    $postComment = new Articles();
    $postComment->articleComment($_POST['personName'], $_POST['comment'], $_POST['id']);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Article Section - Viewing Article: <?= $display['title'];?> | Posted By <?= ucwords($display['username']); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css" crossorigin="anonymous">
    
</head>
<body>
    <div class="container">
    <?php include __DIR__ . '/nav.php'; ?>
            
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-2">
                                <img class="spinner-border text-secondary img-thumbnail" id="profile-pic" role="status" src="<?php echo ($display['user_img'] != '' ? 'profile_photos/' . $display['user_img'] : 'profile_photos/' . 'default.jpg');  ?>">
                            </div>
                            <div class="col-sm-3 mt-3">
                                <p class="font-weight-light font-italic">Article Posted - <?= date('d / m / Y ', strtotime($display['date'])); ?></p>
                                <p class="font-weight-light font-italic">Posted By - <?= ucwords($display['username']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?= $display['body']; ?></p>
                    </div>
                    
                </div>
            </div>   
        </div>
            
        
        <div class="row">

        <?php foreach($displayComments->displayArticlePosts($_GET['id']) as $key): ?>

            <div class="col">
                <?= $key['username']; ?>
            </div>
            <div class="col">
                <?= $key['comment']; ?>
            </div>
            <div class="col">
                <?= $key['date']; ?>
            </div>
            
        <?php endforeach;?>

        
        

            <div class="col">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="commentArea" method="POST">
                <input type="text" name="id" value="<?= $_GET['id']; ?>" hidden>
                </form>
            </div>
        </div>
        <button class="btn btn-primary" id="addButton">Add a Comment</button>
    </div>
                
    </div>


<?php include __DIR__ . '/footer.php'; ?>

