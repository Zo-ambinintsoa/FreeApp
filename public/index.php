<?php include('./layout/header.php')?>

<?php include('./layout/navbar.php')?>

  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

          <h6 class="sidebar-heading">
            <span>Main Navigation</span>
          </h6>

          <ul class="nav flex-column">



            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <i class="fa fa-tachometer"></i>
                Dashboard
                <!-- <span class="badge badge-primary">14</span> -->
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="tombola.php">
                <i class="fa fa-pencil-square-o"></i> Tombola
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="billet.php">
                <i class="fa fa-desktop"></i> Billet
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="users.php">
                <i class="fa fa-table"></i> Users
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="billetnum.php">
                <i class="fa fa-bar-chart"></i> Numero de Billet
              </a>
            </li>


          </ul>

          <h6 class="sidebar-heading">
            <span>Utilisateur</span>
          </h6>

          <ul class="nav flex-column">

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-user-o"></i> Profile
                <!-- <span class="badge badge-primary">3</span> -->
                <i class="caret float-right mt-1"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-cog"></i> Settings
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa fa-power-off"></i> Logout
              </a>
            </li>

          </ul>

        </div>
      </aside>

      
      <main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2"><i class="fa fa-tachometer"></i> Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button class="btn btn-sm btn-primary">Share</button>
              <button class="btn btn-sm btn-primary">Export</button>
            </div>
            <button class="btn btn-sm btn-primary dropdown-toggle">
              <i class="fa fa-calendar"></i>
              This week
            </button>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-primary">
              <div class="card-header"><i class="fa fa-shopping-bag"></i> New Orders</div>
              <div class="card-body">
                <h3 class="card-title">150</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-success">
              <div class="card-header"><i class="fa fa-bar-chart"></i> Bounce Rate</div>
              <div class="card-body">
                <h3 class="card-title">53%</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-warning">
              <div class="card-header"><i class="fa fa-user-plus"></i> User Registrations</div>
              <div class="card-body">
                <h3 class="card-title">44</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-danger">
              <div class="card-header"><i class="fa fa-pie-chart"></i> Unique Visitor</div>
              <div class="card-body">
                <h3 class="card-title">65</h3>
              </div>
              <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>


<?php include('./layout/footer.php')?>