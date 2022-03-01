<?php require_once APPROOT . '/views/inc/header.php';?>
    
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>">
                  <span data-feather="home"></span>
                  <i class="fas fa-columns"></i>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?= URLROOT; ?>/trains/">
                  <span data-feather="file"></span>
                  <i class="fas fa-subway"></i>
                  Trains
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>/trips">
                  <span data-feather="shopping-cart"></span>
                  <i class="fa fa-suitcase"></i>
                  Trips
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>">
                  <span data-feather="users"></span>
                  <i class="fa fa-ticket"></i>
                  Reservations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>">
                  <span data-feather="bar-chart-2"></span>
                  <i class="fa fa-user"></i>
                  Clients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>/trips/archived">
                  <span data-feather="layers"></span>
                  <i class="fas fa-archive"></i>
                  Archived
                </a>
              </li>
            </ul>
          </div>
        </nav>



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <a href="<?= URLROOT; ?>/trains" type="button" class="btn btn-sm btn-outline-secondary">&leftarrow; View Trains</a>
          <h1 class="h2 mx-auto">Add Train</h1>
        </div>
          
        <div class="row">
          <div class="col-md-6 mx-auto">
              <div class="card card-body bg-light mt-5">
                  <form action="<?= URLROOT; ?>/trains/add" method="POST">
                      <div class="form-group">
                          <label for="name">Name <sup>*</sup></label>
                          <input type="text" name="name" class="form-control form-control-lg <?= (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['name']; ?>" >
                          <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                      </div>
                      <div class="form-group">
                          <label for="seat_number">Seat Number: <sup>*</sup></label>
                          <input type="number" name="seat_number" class="form-control form-control-lg <?= (!empty($data['seat_number_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['seat_number']; ?>" >
                          <span class="invalid-feedback"><?= $data['seat_number_err']; ?></span>
                      </div>

                      <div class="row">
                          <div class="col-4 mx-auto">
                              <input type="submit" class="btn btn-success btn-block" value="Add">
                          </div>
                      </div>
                  </form>
                </div>
            </div>
          </div>
        </main>
      </div>
    </div>







<?php require_once APPROOT . '/views/inc/footer.php';?>