<?php
include_once 'application/connection.php';
    include_once 'includes/models/teams/select.php';
    include_once 'includes/modules/functions.php';

?>
<div class="container mt-5">
  <div class="row">
  <div class='col-lg-3'>
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
  <div class="col-lg-9">
    <div class="row">
      <div class="col-lg-3">
        
<!-- Card -->
<div class="card card-image mb-3" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">

<!-- Content -->
<div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
    <div>
        <h5 class="pink-text"><i class="fa fa-pie-chart"></i> Marketing</h5>
        <h3 class="card-title pt-2"><strong>This is card title</strong></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
            optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
            Odit sed qui, dolorum!.</p>
        <a class="btn btn-pink"><i class="fa fa-clone left"></i> View project</a>
    </div>
</div>
<!-- Content -->
</div>
<!-- Card -->

<!-- Card -->
<div class="card card-image mb-3" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">

    <!-- Content -->
    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
        <div>
            <h5 class="pink-text"><i class="fa fa-pie-chart"></i> Marketing</h5>
            <h3 class="card-title pt-2"><strong>This is card title</strong></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                Odit sed qui, dolorum!.</p>
            <a class="btn btn-pink"><i class="fa fa-clone left"></i> View project</a>
        </div>
    </div>
    <!-- Content -->
</div>
<!-- Card -->

<!-- Card -->
<div class="card card-image mb-3" style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2814%29.jpg);">

    <!-- Content -->
    <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
        <div>
            <h5 class="pink-text"><i class="fa fa-pie-chart"></i> Marketing</h5>
            <h3 class="card-title pt-2"><strong>This is card title</strong></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam, voluptatem,
                optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum dignissimos.
                Odit sed qui, dolorum!.</p>
            <a class="btn btn-pink"><i class="fa fa-clone left"></i> View project</a>
        </div>
    </div>
    <!-- Content -->
</div>
<!-- Card -->
      </div>
    </div>
  </div>
  </div>
</div>