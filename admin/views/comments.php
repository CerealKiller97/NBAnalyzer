<?php $comments = getAllComments($conn); ?>

<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
      <div class="card mb-4 wow animated fadeIn">
      <div class="card-body d-sm-flex justify-content-between ">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=comments"> <i class="fas fa-comments mr-3"></i>Comments Page</a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>
      </div>
    </div>

  <table class="table table-hover">
      <thead class="primary-color text-white">
        <tr>
          <th>Avatar</th>
          <th>Username</th>          
          <th>Comment</th>
          <th>Post</th>          

          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($comments as $comment) : ?>
        <tr>
          <td>
            <img class="club-photo <?= ($comment->avatar === 'assets/avatars/user.png')? 'bg-primary': ''  ?>" src="../<?= $comment->avatar ?>" alt="<?= $comment->name ?> logo" />
          </td>
          <td>
            <?= $comment->username ?>
          </td>
          <td><?= $comment->body ?></td>
          <td><?= $comment->title ?></td>
          <td>
            <button class="btn btn-primary mb-0" data-id="<?= $comment->postID ?>" data-toggle="modal" data-target="#updateTeam">Update</button>
            <button class="btn btn-danger deleteLink mb-0" data-id="<?= $comment->postID ?>" data-toggle="modal" data-target="#deleteTeam">Delete</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>