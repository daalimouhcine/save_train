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
                <a class="nav-link" href="<?= URLROOT; ?>/trains">
                  <span data-feather="file"></span>
                  <i class="fas fa-subway"></i>
                  Trains
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?= URLROOT; ?>/trips">
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
          <h1 class="h2">Trips Availabel</h1>
          <?php flash('trip_add_success'); ?>
          <?php flash('no_trips'); ?>
          <?php flash('trip_delete_success'); ?>
          <?php flash('delete_prob'); ?>
          <?php flash('modify_trip'); ?>
          <?php flash('archive_trip'); ?>
          <?php flash('err'); ?>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= URLROOT; ?>/trips/add" type="button" class="btn  btn-success">Add a Trip</a>
        </div>
      </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th class="px-1">Train Name</th>
                  <th>Start From</th>
                  <th>End In</th>
                  <th>Distance</th>
                  <th>Trip Date</th>
                  <th>Depart Hour</th>
                  <th>End Hour</th>
                  <th>Price</th>
                  <th>Params</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $trip) : ?>
                    <tr>
                    <td class="pl-2"><?= $trip->name; ?></td>
                    <td><?= $trip->start_from; ?></td>
                    <td><?= $trip->end_in; ?></td>
                    <td><?= $trip->distance; ?> Km</td>
                    <td><?= $trip->trip_date; ?></td>
                    <td><?= $trip->depart_hour; ?></td>
                    <td><?= $trip->end_hour; ?></td>
                    <td><?= $trip->price; ?> DH</td>
                    <td>
                      <a href="<?= URLROOT; ?>/trips/edit/<?= $trip->id; ?>" class="btn btn-outline-success">Edit</a>
                      <a href="<?= URLROOT; ?>/trips/archiveTrip/<?= $trip->id; ?>" class="btn btn-outline-danger">Archive</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>


<?php require_once APPROOT . '/views/inc/footer.php';?>