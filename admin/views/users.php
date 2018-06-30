<?php

if (!isset($_SESSION['user'])) {
    header('Location: ../index.php?page=home');     
} elseif ((isset($_SESSION['user']) && $_SESSION['user']->role ==='User')) {
    header('Location: ../index.php?page=home');
}
    // queries -> data
    $numOfComments = countComments($conn);
    $numOfUsers = getAllUsersCount($conn);
    $users = getAllUsersTeam($conn);
?>

    <main class="pt-5 mx-lg-5">
        <div class="container-fluid">
            <div class="card mb-4 wow fadeIn">

                <div class="card-body d-sm-flex justify-content-between">
                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=users"> <i class="fa fa-user mr-3"></i> User Page</a>
                        <span>/</span>
                        <span>Dashboard</span>
                        <button class="btn btn-primary ml-5" data-toggle="modal" data-target="#addUserModal">Add new user</button>
                    </h4>
                </div>

            </div>
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
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <img class="avatar table-avatar  <?= ($user->avatar === 'assets/avatars/user.png')? 'bg-primary': '' ?>" src="../<?= $user->avatar ?>"
                                alt="<?= $user->firstName . ' ' . $user->lastName ?> avatar" width="50">
                        </td>
                        <td>
                            <?= $user->firstName ?>
                        </td>
                        <td>
                            <?= $user->lastName ?>
                        </td>
                        <td>
                            <?= $user->username ?>
                        </td>
                        <td>
                            <?= $user->email ?>
                        </td>
                        <td>
                            <?= $user->name ?>
                        </td>
                        <td>
                            <?php 
                 $dates = $user->registredAt;

                 //var_dump($dates);
             
                 $date = explode(' ',$dates);
             
                 $dateFull = $date[0];
             
                 $dateElemets = explode('-',$dateFull); 
             
                $formatedDate = $dateElemets[2]. '.' . $dateElemets[1].'.' .$dateElemets[0] ;
             
                echo $formatedDate;
                    $user->registredAt
                 ?>
                        </td>
                        <td> <?= $user->role ?> </td>
                        <td>
                            <button class="btn btn-primary updateUser" data-id="<?= $user->userID ?>" data-toggle="modal" data-target="#updateUser">Update</button>
                            <button class="btn btn-danger deleteUser" data-id="<?= $user->userID ?>" data-toggle="modal" data-target="#deleteUser" >Delete</button>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </main>

 <!--Modal: INSERT-->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <div class="modal-content">
                <div class="registerHeader addUserHeader modal-header primary-color white-text">
                    <h4 id="addUserHeading" class="title">
                        Add New User
                    </h4>

                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div id="register" class="modal-body">
                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label id="register-first-name-hint" for="register-first-name">First Name</label>
                        <input type="text" id="insert-first-name" class="form-control form-control-sm animated fadeIn">
                        <small id="help-first-name" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label id="register-last-name-hint" for="register-last-name">Last Name</label>
                        <input type="text" id="insert-last-name" class="form-control form-control-sm animated fadeIn">
                        <small id="help-last-name" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-envelope prefix"></i>
                        <label id="register-email-hint" for="register-email">Email </label>
                        <input type="text" id="insert-email" class="form-control form-control-sm animated fadeIn">
                        <small id="help-email" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-envelope prefix"></i>
                        <label id="register-username-hint" for="register-email">Username </label>
                        <input type="text" id="insert-username" class="form-control form-control-sm animated fadeIn">
                        <small id="help-username" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-lock prefix"></i>
                        <label id="password" for="materialFormEmailModalEx1">Password</label>
                        <input type="password" id="insert-password" class="form-control form-control-sm animated fadeIn">
                        <small id="help-password" class="form-text text-muted ml-4"></small>
                    </div>


                    <div class="form-group">
                        <label for="favorite-team">Favorite Team</label>
                        <select id="favorite-team" class="custom-select animated fadeIn">
                            <!--  -->
                            <option value="0">Choose</option>
                            <?= $output ?>
                        </select>
                        <small id="help-team" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="switch my-2">
                        <p>Acitve?</p>

                        <label>
                            No
                            <input type="checkbox" id="active" value="1">
                            <span class="lever" class="mb-5"></span>
                            Yes
                        </label>
                    </div>

                    <div class="text-center mt-4 mb-2">
                        <button id="addUser" class="btn btn-primary btn-block"> Add new user </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!--Modal: DELETE-->
    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <p class="heading">Are you sure?</p>
                </div>

                <!--Body-->
                <div class="modal-body">

                    <i class="fa fa-times fa-4x animated zoomIn"></i>

                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                    <button class="btn confirm-delete btn-outline-danger">Yes</button>
                    <button class="btn btn-danger waves-effect" data-dismiss="modal">No</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalConfirmDelete-->


     <!--Modal: UPDATE-->
     <div class="modal fade" id="updateUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <div class="modal-content">
                <div class="registerHeader updateHeader modal-header primary-color white-text">
                    <h4 id="updateHeading" class="title">User info</h4>

                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div id="register" class="modal-body">
                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label id="register-first-name-hint" for="update-first-name">First Name</label>
                        <input type="text" id="update-first-name" class="form-control form-control-sm animated fadeIn" autofocus>
                        <input type="hidden" id="uid" />
                        <small id="help-first-name" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-user prefix grey-text"></i>
                        <label id="register-last-name-hint" for="update-last-name">Last Name</label>
                        <input type="text" id="update-last-name" class="form-control form-control-sm animated fadeIn" autofocus>
                        <small id="help-last-name" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-envelope prefix"></i>
                        <label id="update-email-hint" for="update-email">Email </label>
                        <input type="text" id="update-email" class="form-control form-control-sm animated fadeIn" autofocus>
                        <small id="help-email" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-envelope prefix"></i>
                        <label id="update-username-hint" for="update-email">Username </label>
                        <input type="text" id="update-username" class="form-control form-control-sm animated fadeIn" autofocus>
                        <small id="help-username" class="form-text text-muted ml-4"></small>
                    </div>


                    <div class="form-group">
                        <label for="favorite-team">Favorite Team</label>
                        <select id="favorite-team" class="custom-select animated fadeIn" autofocus>
                            <!--  -->
                            <option value="0">Choose</option>
                            <?= $output ?>
                        </select>
                        <small id="help-team" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="switch my-2">
                        <p>Active?</p>

                        <label>
                            No
                            <input type="checkbox" id="activeUser" >
                            <span class="lever" class="mb-5"></span>
                            Yes
                        </label>
                    </div>

                    <div class="text-center mt-4 mb-2">
                        <button id="updateInfoUser" class="btn btn-primary btn-block"> Update user </button>
                    </div>
                </div>
            </div>
        </div>
    </div>