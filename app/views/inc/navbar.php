
<?php if(isset($_SESSION['admin_id'])) : ?>
      
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

  <?php else : ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
      <div class="container">
            <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
                </li>
              </ul>
              
              <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])) : ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                  </li>         
    
                <?php else : ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
                  </li>

                <?php endif; ?>
              </ul>
            </div>
          </div>
      </nav>

<?php endif; ?>
  