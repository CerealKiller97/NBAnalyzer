<?php

function displayTeams ($teamArr) {
  foreach ($teamArr as $team) {
    echo "<div class='col-lg-4 col-md-6 mb-4 d-flex align-items-stretch'>
    <div class='card'>
      <div class='zoom overlay'>
        <h1 class='text-center mt-2'>
           $team->name 
        </h1>
        <img src='$team->picture' class='img-fluid' alt=' $team->name logo'/>
        <a href='#'>
          <div class='mask rgba-white-slight'></div>
        </a>
      </div>
      <div class='card-body d-flex flex-column'>
        <a href='index.php?page=team&id=$team->teamID' class='btn btn-primary btn-block mt-auto'>View Team</a>
      </div>
    </div>
  </div>";
  }
}


function outputAllTeams($teams) {
 $output = '';
 foreach($teams as $team) 
   $output.= "<option value='$team->teamID'>$team->name</option>";
 return $output;
}

function displayTeamInfo($team) {
  echo "<div class=' jumbotron container mt-5'>
  <div class='row'>
    <div class='col-lg-6 offset-lg-3'>
      <div class='card'>
        <img class='card-img-top' src='$team->picture' alt='$team->name logo' />
        <div class='card-body'>
          <h4 class='display-4 text-center'>
            $team->name           
          </h4>

          <ul class='list-group list-group-flush'>
            <li class='list-group-item'>Conference:  $team->conference </li>
            <li class='list-group-item'>Division:  $team->division </li>
            <li class='list-group-item'>Founded:  $team->founded </li>
            <li class='list-group-item'>Arena: $team->arena</li>
            <li class='list-group-item active waves-light'>Head Coach: $team->fullName</li>
          </ul>

        </div>
      </div>
    </div>
  </div>
</div>";
}

function displayTeamInfov2($team) {
  echo "
  <div class='col-lg-4 mt-4'>
  <div class='card'>
      <img class='card-img-top' src='assets/NBAnalyzer/East/boston-celtics.png' alt='' />
    
  </div>
</div>

<div class='col-lg-6'>
  <div class='card-body'>
      <h4 class='display-4 text-center'>
          $team->name
      </h4>

      <ul class='list-group list-group-flush'>
          <li class='list-group-item'>Conference: $team->conference </li>
          <li class='list-group-item'>Division: $team->division </li>
          <li class='list-group-item'>Founded: $team->founded </li>
          <li class='list-group-item'>Arena: $team->arena</li>
          <li class='list-group-item active waves-light'>Head Coach: $team->fullName</li>
      </ul>

  </div>
</div>
  ";
}

function outputPlayersForTeam($players) {
  $output = '';
  foreach ($players as $player) {
    $output.= "<div class='col-lg-4 mt-4'>
              <div class='card'>
                  <div class='view overlay'>
                      <img class='card-img-top rounded' src='assets/players/$player->img'
                  alt= $player->firstName $player->lastName logo' />
                      <a href='#!'>
                          <div class='mask rgba-white-slight'></div>
                      </a>
                    </div>
                  

                <div class='card-body'>
                  <h4 class='card-title text-center'>
                    <a>$player->firstName $player->lastName</a>
                  </h4>

                  <ul class='list-group list-group-flush'>
                    <li class='list-group-item'>Height: $player->height cm </li>
                    <li class='list-group-item'>Weight: $player->weight kg</li>
                    <li class='list-group-item'>Born: $player->born  </li>
                    <li class='list-group-item'>Age: $player->age  </li>
                    
                    <li class='list-group-item'>Jersey: #$player->jersey</li>
                    <li class='list-group-item active waves-light'>Position: $player->position  [$player->abbreviation] </li>
                </ul>
                </div>
              </div>
            </div>";
          }
          return $output;
}

/*
function formatDate ($players) {
  $date = '';
  foreach ($players as $player) {
    $date .= preg_split('/-/', $player->born);
  }
  print_r($date);
}

<button class='btn hover btn-block mt-4 stats' data-id='$player->playerID'>See Stats</button>

*/