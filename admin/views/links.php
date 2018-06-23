<?php
  $links = getLinks($conn);
?>

<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=posts"> <i class="fas fa-link mr-3"></i>Links Page</a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>    
     </div>
  </div>
  <!-- <div class="alert success-color">
      <p class="lead text-white">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque asperiores quasi, libero, mollitia, consectetur dolorem tempora autem nemo maiores recusandae facere fugit distinctio repudiandae sunt enim odio est voluptate repellat?
        </p>
  </div> -->
  <h1 class="text-center">Links</h1>

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
          <button class="btn btn-primary mb-0" data-id="<?= $link->navigationID ?>">Update</button>
          <button class="btn btn-danger mb-0" data-id="<?= $link->navigationID ?>">Delete</button>
        </td>
      </tr>  
    <?php endforeach; ?>
      </tbody>
  </table>
  </div>
</main>