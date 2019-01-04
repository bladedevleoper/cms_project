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
        <div class="row">
            <div class="col">
                <h4>Recent Posts</h4>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-7">
            <?php 
                $articles = new Articles();
                $table = [
                    'Post Title',
                    'Article Message',
                    'Posted By',
                    'Date Posted',
                ];
                
                // foreach($articles->displayArticles() as $article => $row){
                //     echo 'Post Title';
                //     echo "<div>".$row['title']."</div>";
                    
                // }
            ?>

                <table class="table table-sm">
                    <thead>
                        <?php foreach($table as $key) :?>

                            <th scope="col"><?= $key; ?></th>
                            
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php foreach($articles->displayArticles() as $article => $row) : ?>

                            <tr>
                                <td><?= $row['title']; ?></td>
                                <td><?= $row['body']; ?></td>
                                <td><?= $row['entered_by']; ?></td>
                                <td><?= date('d/m/Y',strtotime($row['date'])); ?></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
                
    </div>

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

    <?php include __DIR__ . '/footer.php'; ?>