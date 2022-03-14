<?php require_once APPROOT . '/views/inc/header.php';?>

    <main role="main" class="col-md-12 mx-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="<?= URLROOT; ?>" type="button" class="btn btn-sm btn-outline-secondary">&leftarrow; Search Trips</a>
        <h1 class="h2 mx-auto text-white">Reserve Trip</h1>
        </div>
        
        <div class="col-md-12">
            <div class="card card-body bg-light mt-5">
                <div class="mx-auto">
                    <?php flash('seats_full'); ?>
                </div>
                <form method="POST">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="container col-lg-5 col-md-8">
                        <div class=" bg-light d-flex flex-column text-dark card p-2 mx-auto my-5 align-items-center">
                            <p class="m-1">Train Name: <?= $data['train_name']; ?></p>
                            <p class="text-center">Date: <?= $data['trip_date']; ?></p>
                            <div class="d-flex flex-wrap">
                                <p class="m-1">From: <?= $data['start_from']; ?> &rightarrow;</p>
                                <p class="m-1"><?= !empty($data['distance']) ? $data['distance'].'Km' : ''; ?></p>
                                <p class="m-1"> &rightarrow;To: <?= $data['end_in']; ?></p>
                            </div>
                                <div class="d-flex flex-wrap">
                                    <p class="m-1">Start at: <?= $data['depart_time']; ?></p>
                                    <p class="m-1">End: <?= $data['end_time']; ?></p>
                                </div>
                                <p class="m-1">Seats: <?= $data['available_seats']; ?> / <?= $data['seat_number']; ?></p>
                            <div class="d-flex align-items-center">
                                <p class='font-weight-bold my-0 mx-3 align-self-center'><?= $data['price']; ?> DH</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-9 mx-auto">
                        <?php if(isset($_SESSION['client_id'])) : ?>
                            <div class="form-group">
                                <label for="client_full_name">Full Name: </label>
                                <input type="text" name="client_full_name" class="form-control border-0 bg-light shadow-none text-dark form-control-lg <?= (!empty($data['client_full_name_err'])) ? 'is-invalid' : ''; ?>" readonly value="<?= $data['client_full_name']; ?>" >
                                <span class="invalid-feedback"><?= $data['client_full_name_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="client_email">Email: </label>
                                <input type="email" name="client_email" class="form-control border-0 bg-light shadow-none text-dark form-control-lg <?= (!empty($data['client_email_err'])) ? 'is-invalid' : ''; ?>" readonly value="<?= $data['client_email']; ?>" >
                                <span class="invalid-feedback"><?= $data['client_email_err']; ?></span>
                            </div>
                        <?php else : ?>
                            <div class="form-group">
                                <label for="client_full_name">Full Name: </label>
                                <input type="text" name="client_full_name" class="form-control  form-control-lg <?= (!empty($data['client_full_name_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['client_full_name']; ?>" >
                                <span class="invalid-feedback"><?= $data['client_full_name_err']; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="client_email">Email: </label>
                                <input type="email" name="client_email" class="form-control form-control-lg <?= (!empty($data['client_email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['client_email']; ?>" >
                                <span class="invalid-feedback"><?= $data['client_email_err']; ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-7 mx-auto">
                            <input type="submit" class="btn btn-success btn-block" value="Confirme">
                        </div>
                    </div>
                </form>
                </div>
            </div>
    </main>
        