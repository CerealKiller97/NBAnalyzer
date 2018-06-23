<?php
  if (isset($_GET['id'])) {

    $id = $_GET['id'];  

    include_once 'application/connection.php';
    include_once 'includes/models/teams/select.php';
    include_once 'includes/models/players/select.php';    
    include_once 'includes/modules/functions.php';
    // staviti u try catch
    try {
      $team = getTeam($id ,$conn);
      $players = getPlayersForTeam($id, $conn);
      $output = outputPlayersForTeam($players);  
    } catch(PDOException $e) {
      echo $e->getMessage();
    }

    /*$date = explode(' ',$dateReg);
    $dateWithoutTime = $date[0];
    $dateElemnts = explode('-',$dateWithoutTime);
    print_r($dateElemnts);
    $fullDate = $dateElemnts[2] . '.' .$dateElemnts[1] .'.' . $dateElemnts[0];*/
  }
?>


  <div class="container mt-5 mb-4 mx-auto">
    <ul class="nav nav-tabs nav-justified danger" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab">
          <i class="fas fa-basketball-ball"></i> Team Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel6" role="tab">
          <i class="fas fa-users"></i> Roster</a>
      </li>

    </ul>
    <!-- Tab panels -->
    <div class="tab-content">
      <!--Panel 1-->
      <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mt-4">
              <img class='card-img-top' src='<?= $team->picture  ?>' alt='<?= $team->name .' logo ' ?>' />
            </div>

            <div class="col-lg-8 mt-4">
              <div class="card">
                <div class='card-body'>
                  <h4 class='display-4 text-center'>
                    <?= $team->name ?>
                  </h4>

                  <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>Conference:
                      <?= $team->conference ?>
                    </li>
                    <li class='list-group-item'>Division:
                      <?= $team->division ?>
                    </li>
                    <li class='list-group-item'>Founded:
                      <?= $team->founded ?>
                    </li>
                    <li class='list-group-item'>Arena:
                      <?= $team->arena ?>
                    </li>
                    <li class='list-group-item active waves-light'>Head Coach:
                      <?= $team->fullName ?>
                    </li>
                  </ul>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="panel6" role="tabpanel">
        <div class="container">
          <div class="d-flex align-content-start flex-wrap">

            <?= outputPlayersForTeam($players) ?>      

          </div>
        </div>
      </div>
    </div>
  </div>

<?php
  #formatDate($players);
?>