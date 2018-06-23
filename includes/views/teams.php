<?php  
  # Getting info & setting up 
  include_once 'application/connection.php';
  include_once 'includes/models/teams/select.php';
  include_once 'includes/modules/functions.php';
  
  $easternTeams = getAllEasternTeams($conn);
  $westernTeams = getAllWesternTeams($conn);
?>

<!-- Nav tabs -->
<div class="container mb-0 mt-5 mx-auto">
  <ul class="nav nav-tabs nav-justified light-color" role="tablist">
    <li class="nav-item">
      <a class="nav-link active primary-color text-white" data-toggle="tab" href="#east" role="tab">
        <strong>EAST</strong>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link danger-color text-white" data-toggle="tab" href="#west" role="tab">
        <strong>WEST</strong>
      </a>
    </li>
  </ul>

  <!-- Tab panels -->

  <div class="tab-content">
    <!--EAST panel -->
    <div class="tab-pane fade in show active" id="east" role="tabpanel">
      <div class="container mt-4">
        <div class="d-flex align-content-start flex-wrap">
         <?= displayTeams($easternTeams) ?>
        </div>
      </div>
    </div>
<!-- END OF EAST PANEL -->

<!-- WEST -->
    <div class="tab-pane fade" id="west" role="tabpanel">
      <div class="container mt-4">
        <div class="d-flex align-content-start flex-wrap">
          <?= displayTeams($westernTeams) ?>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- END OF WESTERN PANEL -->