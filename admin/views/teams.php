<?php $teams = getAllTeamsAdmin($conn); ?>

<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
    <div class="card mb-4 wow animated fadeIn">
      <div class="card-body d-sm-flex justify-content-between ">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=teams">
            <i class="fas fa-basketball-ball mr-3"></i>Teams Page</a>
          <span>/</span>
          <span>Dashboard</span>
          <button class="btn btn-primary mb-0" data-toggle="modal" data-target="#addTeam">Add new Team</button>
        </h4>
      </div>
    </div>

    <table class="table table-hover">
      <thead class="primary-color text-white">
        <tr>
          <th>Team Logo</th>
          <th>Team</th>
          <th>Coach</th>
          <th>Conference</th>
          <th>Division</th>
          <th>Arena</th>
          <th>Founded</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($teams as $team) : ?>
        <tr>
          <td>
            <img class="club-photo" src="../<?= $team->picture ?>" alt="<?= $team->name ?> logo" />
          </td>
          <td>
            <?= $team->name ?>
          </td>
          <td>
            <?= $team->fullName ?>
          </td>
          <td>
            <?= $team->conference ?>
          </td>
          <td>
            <?= $team->division ?>
          </td>
          <td>
            <?= $team->arena ?>
          </td>
          <td>
            <?= $team->founded ?>
          </td>
          <td>
            <button class="btn btn-primary mb-0" data-id="<?= $team->teamID ?>" data-toggle="modal" data-target="#updateTeam">Update</button>
            <button class="btn btn-danger deleteLink mb-0" data-id="<?= $team->teamID ?>" data-toggle="modal" data-target="#deleteTeam">Delete</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>


<!-- ADD NEW COACH -->

<div class="modal fade" id="addTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <div class="modal-content">
      <div class="registerHeader updateHeader modal-header primary-color white-text">
        <h4 id="updateHeading" class="title">Add Team </h4>

        <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>

      <div id="register" class="modal-body">
        <div class="md-form form-sm mt-4 animated fadeIn">
          <i class="fas fa-user prefix grey-text"></i>
          <label id="register-first-name-hint" for="insert-link">Coach Name</label>
          <input type="text" id="insert-link" class="form-control form-control-sm animated fadeIn" autofocus>
          <small id="insert-link-hint" class="form-text text-muted ml-4"></small>
        </div>

        <div class="text-center mt-4 mb-2">
          <button id="addLinkBtn" class="btn btn-primary btn-block"> Add Coach </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- DELETE COACH -->
<div class="modal fade" id="deleteTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!--Modal: UPDATE-->
<div class="modal fade" id="updateTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <div class="modal-content">
      <div class="registerHeader updateHeader modal-header primary-color white-text">
        <h4 id="updateHeading" class="title">Team info</h4>

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
            <input type="checkbox" id="activeUser">
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