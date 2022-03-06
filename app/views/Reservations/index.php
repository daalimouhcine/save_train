<?php require_once APPROOT . '/views/inc/header.php';?>

      <main role="main" class="w-100 text-white m-auto">
        <section class="trips container-fluid bg-white justify-content-center p-4 my-5">
          <div class="col-4 mx-auto text-center">
            <?php flash('no_reservations'); ?>
            <?php flash('add_reservation_success'); ?>
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
  
<!-- <?php require_once APPROOT . '/views/inc/footer.php';?> -->