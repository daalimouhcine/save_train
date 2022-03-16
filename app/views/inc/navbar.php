
<?php if(isset($_SESSION['admin_id'])) : ?>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="<?= APPROOT; ?>/pages/index">Save Train</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
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
          <h3 class="masthead-brand">Save Train</h3>
          <nav class="nav nav-masthead justify-content-center">
            <?php 
              $basename = explode('/',$_SERVER['REQUEST_URI']);  
            ?>
            <a class="nav-link  <?= ($basename[2] == '' || $basename[2] == 'index') ? "active" : ''; ?>" href="<?= URLROOT; ?>">Home</a>
            <?php if(isset($_SESSION['client_id'])) : ?>
              <a class="nav-link <?= $basename[3] == 'reservations' ? "active" : ''; ?>" href="<?= URLROOT; ?>/reservations/">Reservations</a>
              <a class="nav-link <?=$basename[3] == 'logout' ? "active" : ''; ?>" href="<?= URLROOT; ?>/users/logout">Sign out</a>
            <?php else : ?>
              <a class="nav-link <?= $basename[3] == 'register' ? "active" : ''; ?>" href="<?= URLROOT; ?>/users/register">Register</a>
              <a class="nav-link <?= $basename[3] == 'login' ? "active" : ''; ?>" href="<?= URLROOT; ?>/users/login">Login</a>
              
            <?php endif; ?>
          </nav>
        </div>
      </header>

<?php endif; ?>
  