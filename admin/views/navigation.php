   <body class="grey lighten-3">
        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed unique-color-dark">
            <div class="card mt-2">
                <div class="view overlay">
                    <img class="card-img-top" src="../<?= $_SESSION['user']->avatar ?>" />
                    <a href="#!">
                        <div class="mask flex-center rgba-black-light text-white">
                            <?= $_SESSION['user']->username ?>
                        </div>
                    </a>
                </div>

            </div>
            <div class="box mt-2">
                <p class="lead text-light">
                    <?= $_SESSION['user']->username ?>
                </p>
                <p class="text-light">
                    Online
                    <span class="font-weight-bold text-success">&#9679;</span>
                </p>



            </div>

            <div class="list-group list-group-flush">
                <a href="admin.php?page=dashboard" class="list-group-item <?= ($page === 'dashboard') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?>  ">
                <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                <a href="admin.php?page=users" class="list-group-item <?= ($page === 'users') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                    <i class="fa fa-user mr-3"></i>Users
                </a>
                <a href="admin.php?page=players" class="list-group-item <?= ($page === 'players') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                <i class="fas fa-users mr-3"></i>Players
                </a>
                <a href="admin.php?page=posts" class="list-group-item <?= ($page === 'posts') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Posts
                </a>
                <a href="admin.php?page=comments" class="list-group-item <?= ($page === 'comments') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                <i class="fas fa-comments mr-3"></i>Comments
                </a>
                <a href="admin.php?page=links" class="list-group-item <?= ($page === 'links') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                <i class="fas fa-link mr-3"></i>Links
                </a>
                <a href="admin.php?page=teams" class="list-group-item <?= ($page === 'teams') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                    <i class="fas fa-basketball-ball mr-3"></i>Teams
                </a>
                <a href="admin.php?page=survey" class="list-group-item <?= ($page === 'survey') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                <i class="fas fa-tasks mr-3"></i>Survey
                </a> 
                <a href="admin.php?page=question" class="list-group-item <?= ($page === 'question') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                <i class="fas fa-question mr-3"></i>Question
                </a> 
                <a href="admin.php?page=suggestion" class="list-group-item <?= ($page === 'suggestion') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                <i class="fas fa-asterisk mr-3"></i>Suggestions
                </a>
                <a href="admin.php?page=coach" class="list-group-item <?= ($page === 'coach') ? 'active' : 'list-group-item list-group-item-action waves-effect' ?> list-group-item-action waves-effect">
                <i class="fas fa-user-tie mr-3"></i>Coach
                </a>             
            </div>
            <a href="views/logout.php" class="btn btn-primary btn-block mt-4"> <i class="fas fa-sign-out-alt "></i>Logout</a>
        </div>
        
</header>