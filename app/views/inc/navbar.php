
<?php if(isset($_SESSION['admin_id'])) : ?>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?= APPROOT; ?>/pages/index">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?= URLROOT; ?>/users/logout">Sign out</a>
      </li>
    </ul>
  </nav>

  <?php else : ?>
    <div class="d-flex w-100 h-100 p-3 flex-column">
      <header class="masthead cover-container mx-auto w-100">
        <div class="inner">
          <h3 class="masthead-brand">Cover</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="<?= URLROOT; ?>">Home</a>
            <?php if(isset($_SESSION['client_id'])) : ?>
              <a class="nav-link" href="<?= URLROOT; ?>/users/logout">Reservations</a>
              <a class="nav-link" href="<?= URLROOT; ?>/users/logout">Sign out</a>

            <?php else : ?>
              <a class="nav-link" href="<?= URLROOT; ?>/users/register">Register</a>
              <a class="nav-link" href="<?= URLROOT; ?>/users/login">Login</a>
              
            <?php endif; ?>
          </nav>
        </div>
      </header>

<?php endif; ?>
  