<?php $coaches = getAllCoachInfo($conn); ?>

<main class="pt-5 mx-lg-5">
  <div class="container-fluid">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=coach">
            <i class="fas fa-user-tie mr-3"></i> Coach Page</a>
          <span>/</span>
          <span>Dashboard</span>
          <button class="btn btn-primary mb-0" data-toggle="modal" data-target="#addCoach">Add new Coach</button>
        </h4>
      </div>

    </div>
    <div class="container">
      <table class="table table-hover">

        <!--Table head-->
        <thead class="bg-primary text-white ">
          <tr>
            <th>Club photo</th>
            <th>Full Name</th>
            <th>Team</th>
            <th>Action</th>
          </tr>
        </thead>
        <!--End of table head-->
        <tbody>
          <?php foreach ($coaches as $coach) : ?>
          <tr>
            <td>
              <img class="club-photo" src="../<?= $coach->picture  ?>" alt="<?= $coach->name ?> logo" />
            </td>
            <td>
              <?= $coach->fullName ?>
            </td>
            <td>
              <?= $coach->name ?>
            </td>
            <td>
              <button class="btn btn-primary mb-0">Update</button>
              <button class="btn btn-danger mb-0" data-toggle="modal" data-target="#deleteCoach">Delete</button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <!-- End of table -->
    </div>
</main>


<!-- ADD NEW COACH -->

<div class="modal fade" id="addCoach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
      <div class="modal-content">
          <div class="registerHeader updateHeader modal-header primary-color white-text">
              <h4 id="updateHeading" class="title">Add Coach </h4>

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
<div class="modal fade" id="deleteCoach" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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