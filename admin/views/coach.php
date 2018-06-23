<?php 
  $coaches = getAllCoachInfo($conn);
?>


<main class="pt-5 mx-lg-5">
  <div class="container-fluid">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="http://localhost/php1/NBAnalyzer-final/admin/admin.php?page=coach"><i class="fas fa-user-tie mr-3"></i> Coach Page</a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>

      </div>

    </div>
    <div class="container">
      <h2 class="text-center">Add new Coach</h2>
      <form>
        <!-- Grid row -->
        <div class="form-row align-items-center">
          <!-- Grid column -->
          <div class="col-auto">
            <!-- Material input -->
            <div class="md-form">
              <input type="text" class="form-control mb-2" id="inlineFormInputMD" placeholder="Enter coach's full name">
              <label class="sr-only" for="inlineFormInputMD">Name</label>
            </div>
          </div>

          <!-- Grid column -->
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-0">Submit</button>
          </div>

      
        </div>
        <!-- Grid row -->
      </form>
      <h2 class="text-center my-5">List of coaches</h2>
      <table class="table table-hover">

        <!--Table head-->
        <thead class="bg-primary text-white ">
            <tr>
                <th>Club photo</th>
                <th>Full Name</th>
                <th>Team</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
           <?php foreach ($coaches as $coach) : ?>
              <tr>
                <td>
                  <img class="club-photo" src="../<?= $coach->picture  ?>" alt="<?= $coach->name ?> logo" />
                </td>
                <td>
                  <?= $coach->fullName ?>
                </td>
                <td>
                  <?= $coach->name ?>
                </td>
                <td>
                  <button class="btn btn-primary mb-0">Update</button>
                  <button class="btn btn-danger mb-0">Delete</button>
                </td>
          </tr>
          <?php endforeach; ?>
        </tbody>

    </table>
    </div>
</main>