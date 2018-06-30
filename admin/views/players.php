<?php $players = getAllPlayers($conn); ?>
<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
    <div class="card mb-4 wow fadeIn">
      <div class="card-body d-sm-flex justify-content-between">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=posts">
            <i class="fas fa-users mr-3"></i>Players Page</a>
          <span>/</span>
          <span>Dashboard</span>
          <button class="btn btn-primary ml-5" data-toggle="modal" data-target="#addPlayer">Add new Player</button>
        </h4>
       <!--  <div class="md-form">
          <input type="text" id="form1" class="form-control">
          <label for="form1">Search</label>
      </div>  za drugu verziju dodajem i search  -->
      </div>
    </div>
    <table class="table table-hover">
      <thead class="primary-color text-white">
        <tr>
          <th>Player Photo</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Height [ cm ]</th>
          <th>Weight [ kg ]</th>
          <th>Age [ yrs ]</th>
          <th>Born</th>
          <th>Jersey</th>
          <th>Team</th>
          <th>Position</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($players as $player) : ?>
        <tr>
          <td>
            <img src="<?= '../assets/players/'.$player->img ?>" alt="<?= $player->firstName . ' ' .$player->lastName ?> image">
          </td>
          <td>
            <?= $player->firstName ?>
          </td>
          <td>
            <?= $player->lastName ?>
          </td>
          <td>
            <?= $player->height ?>
          </td>
          <td>
            <?= $player->weight ?>
          </td>
          <td>
            <?= $player->age ?>
          </td>
          <td>
            <?php 
              $dates = $player->born;
              $date = explode(' ',$dates);
              $dateFull = $date[0];       
              $dateElemets = explode('-',$dateFull); 
              $formatedDate = $dateElemets[2]. '.' . $dateElemets[1].'.' .$dateElemets[0] ;          
              echo $formatedDate;      
            ?>
          </td>
          <td> #
            <?= $player->jersey ?>
          </td>
          <td>
            <img class="club-photo" src="../<?= $player->picture ?>" alt=""> </td>
          <td>
            <?= $player->position ?>
              <strong>[
                <?= $player->abbreviation ?> ]</strong>
          </td>
          <td>
            <button class="btn btn-primary mb-0" data-id="<?= $player->playerID ?>" data-toggle="modal" data-target="#updateLink">Update</button>
            <button class="btn btn-danger deleteLink mb-0" data-id="<?= $player->playerID ?>" data-toggle="modal" data-target="#deleteLink">Delete</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>