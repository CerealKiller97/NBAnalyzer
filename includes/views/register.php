<?php
  include 'application/connection.php';
  include_once 'includes/models/teams/select.php';
  include_once 'includes/modules/functions.php';
  
  $teams = getAllTeams($conn);
  $output = outputAllTeams($teams);
?>

    <div class="modal fade" id="registerForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <div class="modal-content">
                <div class="registerHeader modal-header primary-color white-text">
                    <h4 id="info" class="title">
                        Register 
                    </h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div id="register" class="modal-body">
                    <div class="md-form form-sm mt-4 animated fadeIn">
                         <i class="fa fa-user prefix grey-text"></i>
                        <label id="register-first-name-hint" for="register-first-name">First Name</label>
                        <input type="text" id="register-first-name" class="form-control form-control-sm animated fadeIn">
                        <small id="help-first-name" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                         <i class="fa fa-user prefix grey-text"></i>
                        <label id="register-last-name-hint" for="register-last-name">Last Name</label>
                        <input type="text" id="register-last-name" class="form-control form-control-sm animated fadeIn">
                        <small id="help-last-name" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-envelope prefix"></i>
                        <label id="register-email-hint" for="register-email">Email </label>
                        <input type="text" id="register-email" class="form-control form-control-sm animated fadeIn">
                        <small id="help-email" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-envelope prefix"></i>
                        <label id="register-username-hint" for="register-email">Username </label>
                        <input type="text" id="register-username" class="form-control form-control-sm animated fadeIn">
                        <small id="help-username" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-lock prefix"></i>
                        <label id="password" for="materialFormEmailModalEx1">Password</label>
                        <input type="password" id="register-password" class="form-control form-control-sm animated fadeIn">
                        <small id="help-password" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fa fa-tag prefix"></i>
                        <label for="confirm-password">Confirm password</label>
                        <input type="password" id="register-confirm" class="form-control form-control-sm animated fadeIn">
                        <small id="help-password" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="form-group">
                        <label for="favorite-team">Favorite Team</label>
                        <select id="favorite-team" class="custom-select animated fadeIn">  <!--  -->
                            <option value="0">Choose</option>
                            <?= $output ?>
                        </select>
                        <small id="help-team" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="text-center mt-4 mb-2">
                        <button id="registerBtn" class="btn btn-primary btn-block"> Register </button>
                    </div>
                </div>
            </div>
        </div>
    </div>