<?php $links = getLinks($conn); ?>

<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=posts"> <i class="fas fa-link mr-3"></i>Links Page</a>
          <span>/</span>
          <span>Dashboard</span>
          <button class="btn btn-primary" data-toggle="modal" data-target="#addLink">Add Link</button>
        </h4>    
     </div>
  </div>
  <table class="table table-hover">
      <thead class="primary-color text-white">
          <tr>
            <th>Href</th>
            <th>Page</th>
            <th>Actions</th>
          </tr>
      </thead>
      <tbody>
    <?php foreach ($links as $link) : ?>
      <tr>
        <td><?= $link->href ?></td>
        <td><?= $link->page ?></td>
        <td>
          <button class="btn btn-primary mb-0" data-id="<?= $link->navigationID ?>" data-toggle="modal" data-target="#updateLink">Update</button>
          <button class="btn btn-danger deleteLink mb-0" data-id="<?= $link->navigationID ?>" data-toggle="modal" data-target="#deleteLink">Delete</button>
        </td>
      </tr>  
    <?php endforeach; ?>
      </tbody>
  </table>
  </div>
</main>

<!-- INSERT MODAL -->

    <div class="modal fade" id="addLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <div class="modal-content">
                <div class="registerHeader updateHeader modal-header primary-color white-text">
                    <h4 id="updateHeading" class="title">Add Link </h4>

                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div id="register" class="modal-body">
                    <div class="md-form form-sm mt-4 animated fadeIn">
                        <i class="fas fa-link prefix grey-text"></i>
                        <label id="register-first-name-hint" for="insert-link">Page name</label>
                        <input type="text" id="insert-link" class="form-control form-control-sm animated fadeIn" autofocus>
                        <small id="insert-link-hint" class="form-text text-muted ml-4"></small>
                    </div>

                    <div class="text-center mt-4 mb-2">
                        <button id="addLinkBtn" class="btn btn-primary btn-block"> Add Link </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--Modal: DELETE-->
<div class="modal fade" id="deleteLink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <div class="modal-content text-center">

            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Are you sure?</p>
            </div>


            <div class="modal-body">
                <i class="fa fa-times fa-4x animated zoomIn"></i>
            </div>

            <div class="modal-footer flex-center">
                <button class="btn confirm-deleteLink btn-outline-danger">Yes</button>
                <button class="btn btn-danger waves-effect" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!-- UPDATE -->

<div class="modal fade" id="updateLink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content">
            <div class="registerHeader updateHeader modal-header primary-color white-text">
                <h4 id="updateHeading" class="title">Add Link </h4>

                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div id="register" class="modal-body">
                <div class="md-form form-sm mt-4 animated fadeIn">
                    <i class="fas fa-link prefix grey-text"></i>
                    <label id="register-first-name-hint" for="insert-link">Page name</label>
                    <input type="text" id="insert-link" class="form-control form-control-sm animated fadeIn" autofocus>
                    <small id="insert-link-hint" class="form-text text-muted ml-4"></small>
                </div>

                <div class="text-center mt-4 mb-2">
                    <button id="addLinkBtn" class="btn btn-primary btn-block"> Add Link </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?= '<script src="js/links.js"></script>' ?>