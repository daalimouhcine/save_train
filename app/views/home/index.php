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

            
          <h2>Section title</h2>
        
        </main>
      </div>
    </div>

  <?php else : ?>
      <main role="main" class="w-100 text-white m-auto">
        <section class="h-100 mb-5">
          <h1 class="text-center">Welcome <?= isset($_SESSION['client_id']) ? $_SESSION['client_full_name'] : "(❁´◡`❁)"; ?></h1>
          <div class="col-9 card card-body text-body m-5 mx-auto">
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

        <div class="trips container-fluid bg-white d-flex justify-content-center ">
          <img src="data:image/png;base64,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" alt="">
        </div>  

        
      </main>
    </div>
  
  <?php endif; ?>

<?php require_once APPROOT . '/views/inc/footer.php';?>