<?php 
  $suggestions = getAllSuggestions($conn);
?>

<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
      <div class="card mb-4 wow animated fadeIn">
      <div class="card-body d-sm-flex justify-content-between ">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=suggestion"> <i class="fas fa-asterisk mr-3"></i> Suggestion Page</a>
          <span>/</span>
          <span>Dashboard</span>
          <button class="btn btn-primary mb-0" data-toggle="modal" data-target="#addCoach">Add new Suggestion</button>

        </h4>
      </div>
    </div>

 <table class="table table-hover">
      <thead class="primary-color text-white">
          <tr>
            <th>Question</th>
            <th>Suggestion</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
    <?php foreach ($suggestions as $suggestion) : ?>
      <tr>
        <td><?= $suggestion->questionBody ?></td>
        <td><?= $suggestion->suggestionBody ?></td>
        <td>
          <button class="btn btn-primary mb-0" data-id="<?= $suggestion->suggestionID ?>" data-toggle="modal" data-target="#updateLink">Update</button>
          <button class="btn btn-danger deleteLink mb-0" data-id="<?= $suggestion->suggestionID ?>" data-toggle="modal" data-target="#deleteLink">Delete</button>
        </td>
      </tr>  
    <?php endforeach; ?>
      </tbody>
  </table>
  </div>
</main>

