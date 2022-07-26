  <?php
  // Init session
  session_start();

  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email']) || !isset($_SESSION['userId']) || empty($_SESSION['userId'])){
    header('location: login.php');
    exit;
  }

  if (isset($_SESSION['isConfirmed']) && $_SESSION['isConfirmed'] == true) {
    header('location: error.php');
    exit;
  }
?>
  
  <header class="navbar navbar-expand sticky-top bg-primary navbar-dark flex-column flex-md-row bd-navbar">
    <a class="navbar-brand mr-0 mr-md-2" href="#">
    <i class="fa fa-home"></i>  Loto App
    </a>

    <!-- <div class="navbar-nav-scroll">
      <ul class="navbar-nav bd-navbar-nav flex-row">
        <li class="nav-item px-2">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item px-2">
          <a class="nav-link" href="#">Documentation</a>
        </li>
      </ul>
    </div> -->

    <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">

      <!-- <li class="nav-item">
        <a class="nav-link p-3">
          <i class="fa fa-envelope-o"></i>
          <span class="badge badge-danger badge-notif">6</span>
        </a>
      </li> -->

      <li class="nav-item" >
        <a class="nav-link p-3"  style="cursor: pointer;">
          <?php echo $_SESSION['userId'] ?> 
          <!-- <span class="badge badge-success badge-notif">6</span> -->
        </a>
      </li>
      <li class="nav-item" >
        <a class="nav-link p-3"  style="cursor: pointer;">
          <i class="fa fa-power-off"></i>
          <!-- <span class="badge badge-success badge-notif">6</span> -->
        </a>
      </li>
    </ul>

  </header>