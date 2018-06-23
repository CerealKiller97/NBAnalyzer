<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php?page=home');     
} elseif ((isset($_SESSION['user']) && $_SESSION['user']->role ==='User')) {
    header('Location: ../index.php?page=home');
}
    include '../application/connection.php';
    include '../includes/models/users/select.php';
    include '../includes/models/comments/select.php';
    $numOfComments = countComments($conn);
    $numOfUsers = getAllUsersCount($conn);
    $users = getAllUsersTeam($conn);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Material Design Bootstrap</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.min.css" rel="stylesheet">
    </head>

    <body class="grey lighten-3">
        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed unique-color-dark">
            <div class="card mt-4">
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
                <a href="admin.php" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-pie-chart mr-3"></i>Dashboard
                </a>
                <a href="user.php" class="list-group-item list-group-item-action waves-effect active waves-effect">
                    <i class="fa fa-user mr-3"></i>Users
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-table mr-3"></i>Players
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-map mr-3"></i>Posts
                </a>
                <a href="#" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-money mr-3"></i>Comments
                </a>
            </div>

        </div>
        <!-- Sidebar -->

        </header>
        <!--Main Navigation-->

        <!--Main layout-->
        <main class="pt-5 mx-lg-5">
            <div class="container-fluid">

                <!-- Heading -->
                <div class="card mb-4 wow fadeIn">

                    <!--Card content-->
                    <div class="card-body d-sm-flex justify-content-between">

                        <h4 class="mb-2 mb-sm-0 pt-1">
                            <a href="https://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">User Page</a>
                            <span>/</span>
                            <span>Dashboard</span>                          
                        </h4>

                    </div>

                </div>
                <h2 class="text-center">Users</h2>
                <!--Table-->
<table class="table table-hover mt-5">
  <thead class="bg-primary text-white">
      <tr>
          <th>Avatar</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Favorite Team</th>
          <th>Member since</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
            <td><img class="avatar table-avatar  <?= ($user->avatar === 'assets/avatars/user.png')? 'bg-primary': '' ?>" src="../<?= $user->avatar ?>" alt="<?= $user->firstName . ' ' . $user->lastName ?> avatar"></td>
            <td> <?= $user->firstName ?> </td>
            <td> <?= $user->lastName ?> </td>
            <td> <?= $user->username ?> </td>
            <td> <?= $user->email ?> </td>
            <td> <?= $user->name ?> </td>
            <td>
                <?php 
                 $dates = $user->registredAt;            
                 $date = explode(' ',$dates);             
                 $dateFull = $date[0];            
                 $dateElemets = explode('-',$dateFull);         
                $formatedDate = $dateElemets[2]. '.' . $dateElemets[1].'.' .$dateElemets[0] ;       
                echo $formatedDate;
                    $user->registredAt
                 ?>
            </td>
            <td>
                <button class="btn btn-primary update" data-id="<?= $user->userID ?>" data-toggle="modal" data-target="#update">Update</button>
                <button class="btn btn-danger delete" data-id="<?= $user->userID ?>"  data-toggle="modal" data-target="#delete">Delete</button>
            </td>
         
        </tr>
      <?php endforeach; ?>
  </tbody>


</table>
<!--Table-->

 <!--   <textarea>Next, get a free Tiny Cloud API key!</textarea>  -->
                   <!--  <div class="row">
                        <div class="col-lg-4">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores totam earum praesentium asperiores blanditiis, assumenda tempora, exercitationem nisi eaque, voluptas et esse facilis placeat possimus vitae rem vel reprehenderit mollitia.
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores totam earum praesentium asperiores blanditiis, assumenda tempora, exercitationem nisi eaque, voluptas et esse facilis placeat possimus vitae rem vel reprehenderit mollitia.
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores totam earum praesentium asperiores blanditiis, assumenda tempora, exercitationem nisi eaque, voluptas et esse facilis placeat possimus vitae rem vel reprehenderit mollitia.
                            </p>
                        </div>
                    </div> -->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </div>
        </main>
        <!--Main layout-->

        <!--Footer-->
        <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

            <!--Call to action-->

            <!--/.Call to action-->

            <hr class="my-4">

            <!-- Social icons -->
            <div class="pb-4">
                <a href="https://www.facebook.com" target="_blank">
                    <i class="fa fa-facebook mr-3"></i>
                </a>

                <a href="https://twitter.com" target="_blank">
                    <i class="fa fa-twitter mr-3"></i>
                </a>

                <a href="https://www.youtube.com/" target="_blank">
                    <i class="fa fa-youtube mr-3"></i>
                </a>

                <a href="https://plus.google.com" target="_blank">
                    <i class="fa fa-google-plus mr-3"></i>
                </a>

                <a href="https://dribbble.com" target="_blank">
                    <i class="fa fa-dribbble mr-3"></i>
                </a>

                <a href="https://pinterest.com" target="_blank">
                    <i class="fa fa-pinterest mr-3"></i>
                </a>

                <a href="https://github.com/CerealKiller97" target="_blank">
                    <i class="fa fa-github mr-3"></i>
                </a>

            </div>
            <!-- Social icons -->

            <!--Copyright-->
            <div class="footer-copyright py-3">
                © 2018 Copyright:
                <a href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"> Stefan Bogdanovic </a>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>     
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
        //tinymce.init({ selector:'textarea' })
</script>

    </body>

    </html>