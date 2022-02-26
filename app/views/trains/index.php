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
                <a class="nav-link" href="<?= URLROOT; ?>">
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
                <a class="nav-link" href="<?= URLROOT; ?>">
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
          <h1 class="h2">Trains</h1>
          <?php flash('train_add_success'); ?>
          <?php flash('no_trains'); ?>
          <?php flash('train_delete_success'); ?>
          <?php flash('delete_prob'); ?>
          <?php flash('modify_train'); ?>
          <?php flash('err'); ?>
          <div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?= URLROOT; ?>/trains/add" type="button" class="btn  btn-success">Add Train</a>
        </div>
      </div>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th class="px-5">Name</th>
                  <th>Seat Number</th>
                  <th>Params</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($data as $train) : ?>
                  <tr>
                    <td class="w-25 px-5"><?= $train->name; ?></td>
                    <td class="w-25"><?= $train->seat_number; ?></td>
                    <td class="w-25">
                      <a href="<?= URLROOT; ?>/trains/edit/<?= $train->id; ?>" class="btn btn-outline-success">Edit</a>
                      <a href="<?= URLROOT; ?>/trains/delete/<?= $train->id; ?>" class="btn btn-outline-danger">Delete</a>
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