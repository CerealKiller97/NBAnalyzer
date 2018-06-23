<?php
  include_once 'application/connection.php';
  include_once 'includes/models/navigation/select.php';
  $links = getLinks($conn);
  $avatarUpload = isset($_SESSION['avatar'])? $_SESSION['avatar'] : '';
?>
<header>
    <nav class="navbar primary-color fixed-top navbar-expand-lg navbar-dark scrolling-navbar mb-5">
        <a class="navbar-brand" href="index.php?page=home">
            <strong>NBAnalyzer</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="#nav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mr-auto">      
                <?php foreach($links as $link) : ?> 
                    <li class="nav-item <?= ($page === $link->href)? 'active' : '' ?>">
                        <a class="nav-link " href="index.php?page=<?= $link->href ?>"><?= $link->page ?></a>
                    </li>
                <?php endforeach; ?>              
            <?php if (isset($_SESSION['user']) && ($_SESSION['user'])->role ==='Admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin/admin.php?page=dashboard">Admin</a>
                </li>
            <?php endif; ?>
            </ul>
            
            <ul id="drop" class="navbar-nav nav-flex-icons">

                <?php if (!isset($_SESSION['user'])) : ?>

                <li class="nav-item">
                    <a class="button nav-link" role="button" data-toggle="modal" data-target="#loginForm"> Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="button" data-toggle="modal" data-target="#registerForm"> Register </a>
                </li>

                <?php else: ?>
                <li class="nav-item">
                    <div class="label">
                        <img src="<?= (!isset($_SESSION['avatar'])) ? $_SESSION['user']->avatar : $avatarUpload ?>" class="rounded z-depth-1-half avatar " />
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['user']->username ?>
                        </a>
                        <div id="dropdown-holder" class="dropdown-menu dropdown-default" aria-labelledby="dropdown">
                            <a class="dropdown-item" href="index.php?page=profile">
                                <i class="fas fa-user pr-2"></i> Profile
                            </a>
                            <a class="dropdown-item" href="includes/views/logout.php">
                                <i class="fas fa-sign-out-alt pr-2"></i> Logout
                            </a>
                        </div>
                    </li>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>