<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Login</h2>
                <p>Please fill in your credentials to log in</p>
                <form action="<?= URLROOT; ?>/users/login" method="POST">
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?= (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['email']; ?>" >
                        <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>" >
                        <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-success btn-block" value="Log In">
                        </div>
                        <div class="col">
                            <a href="<?= URLROOT; ?>/users/register" class="btn btn-light btn-block">No account? Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>


