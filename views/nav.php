<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Test CMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="member.php">Current Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="postarticle.php">Post an Article</a>
            </li>
            </ul>
            
        </div>
        <div class="float-right">
                <ul class="navbar-nav">
                    
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php 
                                    if(isset($_SESSION['username'])){
                                        echo 'Welcome' . ' ' .  ucwords($_SESSION['username']);
                                    }
                    ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="profile.php">Profile</a>
                        <a class="nav-link" href="?logout=true" onclick="clearStorage();">Log out</a>
                    </div>
                    </li>
                </ul>
            </div>
</nav>