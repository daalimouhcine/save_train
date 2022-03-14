<?php require_once APPROOT . '/views/inc/header.php';?>

      <main role="main" class="w-100 text-white m-auto">
        <section class="trips container-fluid bg-white justify-content-center p-4 my-5">
          <div class="col-lg-4 col-md-6 col-sm-8 mx-auto text-center">
            <?php flash('no_reservations'); ?>
            <?php flash('reservation_cancel_success'); ?>
            <?php flash('reservation_cancel_time_error'); ?>
            <?php flash('add_reservation_success'); ?>
          </div>
            
          <?php if(is_array($data) || is_object($data)) : ?>
            <?php foreach($data as $reservation) : ?>
              <div class="col-lg-6 col-md-8 col-sm-10 col-12 bg-light d-flex flex-column text-dark card p-2 mx-auto my-5 align-items-center">
                <div class="d-flex flex-wrap justify-content-center">
                  <p class="mx-2">Train Name: <?= $reservation->name; ?></p>
                  <p class="mx-2">Date: <?= $reservation->trip_date; ?></p>
                </div>
                <div class="d-flex flex-wrap">
                  <p class="m-1">From: <?= $reservation->start_from; ?> &rightarrow;</p>
                  <p class="m-1"><?= !empty($reservation->distance) ? $reservation->distance.'Km' : ''; ?></p>
                  <p class="m-1"> &rightarrow;To: <?= $reservation->end_in; ?></p>
                </div>
                <div class="d-flex flex-wrap">
                  <p class="m-1 mx-3">Start at: <?= $reservation->depart_hour; ?></p>
                  <p class="m-1 mx-3">End: <?= $reservation->end_hour; ?></p>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-center my-3">
                  <p class='font-weight-bold my-1 mx-3 align-self-center'><?= $reservation->price; ?> DH</p>
                  <a href="<?= URLROOT; ?>/reservations/ticket/<?= $reservation->id; ?>" class="btn btn-outline-success my-1">Ticket</a>
                  <a href="<?= URLROOT; ?>/reservations/cancel/<?= $reservation->id; ?>" class="btn btn-outline-danger my-1 mx-3">Cancel</a>
                </div>
              </div>

              <div class="container bg-light">

              </div>
        
            <?php endforeach; ?>
          <?php endif; ?>
        </section>

        
      </main>
    </div>
  
 <?php require_once APPROOT . '/views/inc/footer.php';?> 