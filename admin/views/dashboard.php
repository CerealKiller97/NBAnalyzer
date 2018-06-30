<main class="pt-5 mx-lg-5">
  <div class="container-fluid">
    <div class="card mb-4 wow animated fadeIn">
      <div class="card-body d-sm-flex justify-content-between ">
        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=dashboard">
            <i class="fas fa-chart-pie mr-3"></i>Home Page</a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>
      </div>
    </div>
    <div class="row wow fadeIn">
      <div class="col-md-9 mb-4">
        <h1 class="text-center ">Social Media Stats</h1>
        <div class="row">
          <div class="col-md-6 mb-4">
            <div class="card indigo text-center z-depth-2 animated fadeInLeft mb-5">
              <div class="card-body">
                <h4 class="text-uppercase text-white">facebook
                  <i class="fab fa-facebook mr-3"></i>
                  <span class="badge primary ">
                    <i class="fa fa-users mr-2"></i>
                    <?= round(rand(1,10000)) ?>
                  </span>
                </h4>
              </div>
            </div>
            <div class="card red text-center z-depth-2 animated fadeInLeft mb-4">
              <div class="card-body">
                <h4 class="text-uppercase text-white">youtube
                  <i class="fab fa-youtube mr-3"></i>
                  <span class="badge primary">
                    <i class="fa fa-users mr-2"></i>
                    <?= round(rand(1,10000)) ?>
                  </span>
                </h4>
              </div>
            </div>
            <br>
            <div class="card info-color text-center z-depth-2 animated fadeInLeft mb-4">
              <div class="card-body">
                <h4 class="text-uppercase text-white">twitter
                  <i class="fab fa-twitter mr-3"></i>
                  <span class="badge primary">
                    <i class="fa fa-users mr-2"></i>
                    <?= round(rand(1,10000)) ?>
                  </span>
                </h4>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card red lighten-1 text-center z-depth-2 animated fadeInRight mb-4">
              <div class="card-body">
                <h4 class="text-uppercase text-white">pinterest
                  <i class="fab fa-pinterest mr-3"></i>
                  <span class="badge primary">
                    <i class="fa fa-users mr-2"></i>
                    <?= round(rand(1,10000)) ?>
                  </span>
                </h4>
              </div>
            </div>
            <br>
            <div class="card warning-color text-center z-depth-2 animated fadeInRight mb-4">
              <div class="card-body">
                <h4 class="text-uppercase text-white">Google Plus
                  <i class="fab fa-google-plus-g"></i>
                  <span class="badge primary">
                    <i class="fa fa-users mr-2"></i>
                    <?= round(rand(1,10000)) ?>
                  </span>
                </h4>
              </div>
            </div>
            <br>
            <div class="card elegant-color-dark lighten-2 text-center z-depth-2 animated fadeInRight mb-4">
              <div class="card-body">
                <h4 class="text-uppercase text-white">Github
                  <i class="fab fa-github mr-3"></i>
                  <span class="badge primary">
                    <i class="fa fa-users mr-2"></i>
                    <?= round(rand(1,10000)) ?>
                  </span>
                </h4>
              </div>
            </div>
          </div>
        </div>
        <h1 class="text-center">Site completed (%)</h1>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">60%</div>
        </div>
        <div class="jumbotron mt-4">
          <h1 class="text-center">Change Log</h1>
          <table class="table table-hover">

            <!--Table head-->
            <thead>
              <tr>
                <th>Version</th>
                <th>Change</th>
                <th>Date</th>
              </tr>
            </thead>
            <!--Table head-->

            <!--Table body-->
            <tbody>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <td>Larry the Bird</td>
                <td>Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card mb-4">
          <div class="card-header text-center">
            <h5>Favorite Teams stats</h5>
          </div>
          <div class="card-body">
            <canvas id="pieChart"></canvas>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header text-center">
            <h5 class="text-center">Stats</h5>
          </div>
          <div class="card-body">
            <div class="list-group list-group-flush">
              <a class="list-group-item list-group-item-action waves-effect">Users
                <span class="badge badge-primary badge-pill pull-right">
                  <?= $numOfUsers->numOfUsers ?>
                    <i class="fa fa-users"></i>
                </span>
              </a>
              <a class="list-group-item list-group-item-action waves-effect">Comments
                <span class="badge badge-primary badge-pill pull-right">
                  <?= $numOfComments->numOfComments ?>
                    <i class="fa fa-comment" aria-hidden="true"></i>
                </span>
              </a>
              <a class="list-group-item list-group-item-action waves-effect">Posts
                <span class="badge badge-primary badge-pill pull-right">
                  <?= $numOfPosts->numberOfPosts ?>
                </span>
              </a>
              <a class="list-group-item list-group-item-action waves-effect">Teams
                <span class="badge badge-primary badge-pill pull-right">
                  <?= $numOfTeams->numOfTeams ?>
                </span>
              </a>
              <a class="list-group-item list-group-item-action waves-effect">Players
                <span class="badge badge-primary badge-pill pull-right">
                  <?= $numOfPlayers->numOfPlayers ?>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row wow fadeIn">
      <div class="col-md-6 mb-4">
      </div>
    </div>
    <div class="row wow fadeIn">
    </div>
    <div class="row wow fadeIn">
      <div class="col-md-6 mb-4">
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
</main>