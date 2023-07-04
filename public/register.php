<?php include('./layout/header.php')?>


<?php
  // Include db config
  require_once './script/libs/CrudClass.php';
    $db = new CrudClass();
  // Init vars
  $name = $utype = $email = $password = $confirm_password = '';
  $name_err = $utype_err = $email_err = $password_err = $confirm_password_err = '';

  // Process form when post submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Put post vars in regular vars
    $name =  trim($_POST['name']);
    $email = trim($_POST['email']);
    $utype = trim($_POST['utype']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate email
    if(empty($email)){
      $email_err = 'Please enter email';
    } else {
      // Prepare query
       $stmt = $db->Select('users', [])->Where(['email' => $email]);
        // Attempt execute
            $row = $stmt->Execute();
        // Attempt to execute
        if(!empty($row)){
          // Check if email exists
          if(Count($row) === 1){
            $email_err = 'Email deja prise';
          }
        } 
      unset($stmt);
    }
    // Validate name
    if(empty($name)){
      $name_err = 'Please entrer un nom';
    }
    // Validate name
    if(empty($utype)){
      $utype_err = 'choisisser une type';
    }
    // Validate password
    if(empty($password)){
      $password_err = 'Please enter password';
    } else if(strlen($password) < 6){
      $password_err = 'Password must be at least 6 characters ';
    }
    // Validate Confirm password
    if(empty($confirm_password)){
      $confirm_password_err = 'Please confirm password';
    } else {
      if($password !== $confirm_password){
        $confirm_password_err = 'Passwords do not match';
      }
    }
    // Make sure errors are empty
    if(empty($name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
      // Hash password
      $password = password_hash($password, PASSWORD_DEFAULT);
      $data = ['email' => $email , 'name' => $name , 'password' => $password , 'isAdmin' => $utype, 'isConfirmed' => 1 , 'addedBy' => 0];
      // Prepare insert query
        $stmt = $db->Insert('users')->Data($data);
        $result = $stmt->Execute();
        // Attempt to execute
        if($result){
          // Redirect to login
          header('location: users.php');
        } else {
          die('Something went wrong');
        }
      unset($stmt);
    }
    // Close connection
    unset($pdo);
  }
?>

  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

          <h6 class="sidebar-heading">
            <span>Main Navigation</span>
          </h6>

          <ul class="nav flex-column">



            <li class="nav-item">
              <a class="nav-link " href="index.php">
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
              <a class="nav-link active" href="users.php">
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
          <h1 class="h2"><i class="fa fa-plus"></i> Ajouter Utilisateur</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="btn-group mr-2">
              <button class="btn btn-sm btn-primary">Share</button>
              <button class="btn btn-sm btn-primary">Export</button>
            </div>
            <button class="btn btn-sm btn-primary dropdown-toggle">
              <i class="fa fa-calendar"></i>
              This week
            </button> -->
          </div>
        </div>

            <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                <h2>Creer une nouvele Utilisateur</h2>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>
                    <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                    <label for="utype">Type d'utilisateur</label>
                    <select name ="utype" class="form-control form-control-lg <?php echo (!empty($utype_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $utype; ?>" required>
                    <option selected>Choose...</option>
                    <option value="0">Employer</option>
                    <option value="1">Admin</option>
                    </select>
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                    <label for="confirm_password">Confirmer mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-row">
                    <div class="col">
                    </div>                        
                    <div class="col">
                        <input type="submit" value="Enregistrer" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>

      </main>
    </div>
  </div>


<?php include('./layout/footer.php')?>