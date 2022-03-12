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
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>/trains/">
                  <span data-feather="file"></span>
                  <i class="fas fa-subway"></i>
                  Trains
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?= URLROOT; ?>/trips/">
                  <span data-feather="shopping-cart"></span>
                  <i class="fa fa-suitcase"></i>
                  Trips
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>/reservations/">
                  <span data-feather="users"></span>
                  <i class="fa fa-ticket"></i>
                  Reservations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= URLROOT; ?>/clients/">
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
          <a href="<?= URLROOT; ?>/trips" type="button" class="btn btn-sm btn-outline-secondary">&leftarrow; View Trips</a>
          <h1 class="h2 mx-auto">Add Train Trip</h1>
        </div>
          
        <div class="row mb-5">
          <div class="col-md-6 mx-auto">
              <div class="card card-body bg-light mt-5">
                  <form action="<?= URLROOT; ?>/trips/add" method="POST">

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="train">Train:</label>
                      </div>
                      <select class="custom-select <?= (!empty($data['train_err'])) ? 'is-invalid' : ''; ?>" name="train" id="train">
                        <?php if(!empty($data['train_id'])) : ?>
                          <option value="<?= $data['train_id']; ?>" selected><?= $data['train_name']; ?></option>
                          <?php foreach($data['trains_available'] as $train) : ?>
                            <?php if($train->name != $data['train_name']) : ?>
                              <option value="<?= $train->id; ?>"><?= $train->name; ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>

                        <?php else : ?>
                          <option selected></option>
                          <?php foreach($data['trains_available'] as $train) : ?>
                            <option value="<?= $train->id; ?>"><?= $train->name; ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </select>
                      <span class="invalid-feedback"><?= $data['train_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="start_from">Start From:</label>
                            <input type="text" name="start_from" class="form-control form-control-lg <?= (!empty($data['start_from_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['start_from']; ?>" >
                            <span class="invalid-feedback"><?= $data['start_from_err']; ?></span>
                        </div>
                        <div class="form-group col-6">
                            <label for="end_in">End In:</label>
                            <input type="text" name="end_in" class="form-control form-control-lg <?= (!empty($data['end_in_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['end_in']; ?>" >
                            <span class="invalid-feedback"><?= $data['end_in_err']; ?></span>
                        </div>
                    </div>

                      <div class="form-group">
                          <label for="distance">Distance <small>( KM )</small> :</label>
                          <input type="number" name="distance" class="form-control form-control-lg <?= (!empty($data['distance_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['distance']; ?>" >
                          <span class="invalid-feedback"><?= $data['distance_err']; ?></span>
                      </div>

                      <div class="form-group">
                          <label for="trip_date">Trip Date:</label>
                          <input type="date" name="trip_date" class="form-control form-control-lg <?= (!empty($data['trip_date_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['trip_date']; ?>" >
                          <span class="invalid-feedback"><?= $data['trip_date_err']; ?></span>
                      </div>
                      
                      <div class="row">
                        <div class="form-group col-6">
                            <label for="depart_hour">Depart Hour:</label>
                            <input type="time" name="depart_hour" class="form-control form-control-lg <?= (!empty($data['depart_hour_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['depart_hour']; ?>" >
                            <span class="invalid-feedback"><?= $data['depart_hour_err']; ?></span>
                        </div>
                        <div class="form-group col-6">
                            <label for="end_hour">End Hour:</label>
                            <input type="time" name="end_hour" class="form-control form-control-lg <?= (!empty($data['end_hour_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['end_hour']; ?>" >
                            <span class="invalid-feedback"><?= $data['end_hour_err']; ?></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" class="form-control form-control-lg <?= (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['price']; ?>" >
                        <span class="invalid-feedback"><?= $data['price_err']; ?></span>
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