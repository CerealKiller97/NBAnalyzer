<!-- <div class="container mt-5">
  <div class="row">
    <div class="col-lg-4 col-md-12">
      <div class="card mt-4">
          <div class="card-header deep-orange lighten-1 white-text">Featured</div>
          <div class="card-body">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a class="btn btn-deep-orange">Go somewhere</a>
          </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-12">
      <div class="card mt-4">
          <div class="card-header deep-orange lighten-1 white-text">Featured</div>
          <div class="card-body">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a class="btn btn-deep-orange">Go somewhere</a>
          </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-12 ">
      <div class="card mt-4">
          <div class="card-header deep-orange lighten-1 white-text">Featured</div>
          <div class="card-body">
              <h4 class="card-title">Special title treatment</h4>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a class="btn btn-deep-orange">Go somewhere</a>
          </div>
      </div>
    </div>
</div>
</div> -->

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4">
            <div class='card'>
                <img class='card-img-top' src='assets/NBAnalyzer/East/boston-celtics.png' alt='' />
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
        </div>

    </div>
</div>
</div>

<div class="container mt-5 mb-4 mx-auto">
    <ul class="nav nav-tabs nav-justified danger" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel5" role="tab"><i class="fa fa-user"></i> Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel6" role="tab"><i class="fa fa-heart"></i> Register</a>
        </li>
     
    </ul>
    <!-- Tab panels -->
    <div class="tab-content">
        <!--Panel 1-->
        <div class="tab-pane fade in show active" id="panel5" role="tabpanel">
            <div class="container">
                   
            </div>
        </div>
     
        <div class="tab-pane fade" id="panel6" role="tabpanel">
            <div class="container">
                <h1 class="lead mt-4 text-center">Register</h1>
              
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="orangeForm-name" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
                </div>
                <div class="md-form mb-5">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="email" id="orangeForm-email" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
                </div>
    
                <div class="md-form mb-4">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="orangeForm-pass" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
                </div>
                <button class="btn btn-info">Register</button>
                
            </div>
        </div>
        </div>
    </div>
    