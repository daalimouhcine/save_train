<?php require_once APPROOT . '/views/inc/header.php';?>

  <?php if(isset($_SESSION['admin_id'])) : ?> 
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="<?= URLROOT; ?>">
                  <span data-feather="home"></span>
                  <i class="fas fa-columns"></i>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>/trains">
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
            <h1 class="h2">Dashboard</h1>     
                 
          </div>
          <div class="row">
              <div class="col-sm-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Trains</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="<?= URLROOT; ?>/trains/" class="btn btn-primary">See Trains</a>
                    <a href="<?= URLROOT; ?>/trains/add" class="btn btn-success">Add Train</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Train Trips available</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="<?= URLROOT; ?>/trips" class="btn btn-primary">See Trips available</a>
                    <a href="<?= URLROOT; ?>/trips/add" class="btn btn-success">Add Train Trip</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Train Trips archived</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="<?= URLROOT; ?>/trips/archived" class="btn btn-primary">See Trips archived</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Reservations</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">See Reservations</a>
                  </div>
                </div>
              </div>
            </div>        
        </main>
      </div>
    </div>

  <?php else : ?>
      <main role="main" class="w-100 text-white m-auto">
        <section class="my-5">
          <h1 class="text-center">Welcome <?= isset($_SESSION['client_id']) ? $_SESSION['client_full_name'] : "(❁´◡`❁)"; ?></h1>
          <div class="col-9 card card-body text-body mt-5 mx-auto">
            <form method="POST" class="justify-content-center">
              <div class="d-flex flex-row">
                <div class=" input-group-lg col-4 d-block">
                    <input type="text" name="from" class="rounded-0 form-control form-control-lg <?= (!empty($data['from_err'])) ? 'is-invalid' : ''; ?>" placeholder="From: *" value="<?= $data['from']; ?>" >
                    <span class="invalid-feedback"><?= $data['from_err']; ?></span>
                </div>
                <div class="input-group-lg col-4 d-block">
                    <input type="text" name="to" class="rounded-0 form-control form-control-lg <?= (!empty($data['to_err'])) ? 'is-invalid' : ''; ?>" placeholder="To: *" value="<?= $data['to']; ?>" >
                    <span class="invalid-feedback"><?= $data['to_err']; ?></span>
                </div>
                <div class=" input-group-lg col-4 d-block">
                    <input type="text" name="date" class="rounded-0 form-control form-control-lg <?= (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" placeholder="Date: (optional)" onfocus="(this.type = 'date')" onblur="(this.type = 'text')" value="<?= $data['date']; ?>" >
                    <span class="invalid-feedback"><?= $data['date_err']; ?></span>
                </div>
              </div>
              <input type="submit" class="d-block btn btn-dark text-center mx-auto px-4 mt-4" value="Search">
            </form>
          </div>  
        </section>

        <section class="trips container-fluid bg-white justify-content-center p-4 my-5">
          <div class="col-4 mx-auto text-center">
            <?php flash('no_trips'); ?>
            <?php flash('read_trips_success'); ?>
          </div>
            
          <?php if(is_array($data['trips']) || is_object($data['trips'])) : ?>
            <?php foreach($data['trips'] as $trip) : ?>
              <div class="col-6 bg-light d-flex flex-column text-dark card p-2 mx-auto my-5 align-items-center">
                <div class="d-flex justify-content-center">
                  <p class="mx-2">Train Name: <?= $trip->name; ?></p>
                  <p class="mx-2">Date: <?= $trip->trip_date; ?></p>
                </div>
                <div class="d-flex">
                  <p class="m-1">From: <?= $trip->start_from; ?> &rightarrow;</p>
                  <p class="m-1"><?= !empty($trip->distance) ? $trip->distance.'Km' : ''; ?></p>
                  <p class="m-1"> &rightarrow;To: <?= $trip->end_in; ?></p>
                </div>
                <div class="d-flex">
                  <p class="m-1 mx-3">Start at: <?= $trip->depart_hour; ?></p>
                  <p class="m-1 mx-3">End: <?= $trip->end_hour; ?></p>
                </div>
                <p class="m-1">Number of Seats: <?= $trip->seat_number; ?></p>
                <div class="d-flex align-items-center">
                  <p class='font-weight-bold my-0 mx-3 align-self-center'><?= $trip->price; ?> DH</p>
                  <a href="<?= URLROOT; ?>/reservations/add/<?= $trip->id; ?><?= isset($_SESSION['client_id']) ? '/'.$_SESSION['client_id'] : ''; ?>" class="btn btn-success">Reserve</a>
                </div>
              </div>
        
            <?php endforeach; ?>
          <?php endif; ?>
        </section>

        
      </main>
    </div>
  
  <?php endif; ?>

<!-- <?php require_once APPROOT . '/views/inc/footer.php';?> -->