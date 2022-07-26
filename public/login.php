<?php
  // Include db config
  require_once './script/libs/CrudClass.php';
    $db = new CrudClass();
  // Init vars
  $email = $password = '';
  $email_err = $password_err = '';

  // Process form when post submit
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Put post vars in regular vars
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate email
    if(empty($email)){
      $email_err = 'Please enter email';
    }

    // Validate password
    if(empty($password)){
      $password_err = 'Please enter password';
    }

    // Make sure errors are empty
    if(empty($email_err) && empty($password_err)){
      // Prepare query
       $stmt = $db->Select('users', [])->Where(['email' => $email]);
        // Attempt execute
            $result = $stmt->Execute();
          // Check if email exists
          if(!empty($result)){
              $hashed_password = $result[0]['password'];
              if(password_verify($password, $hashed_password)){
                // SUCCESSFUL LOGIN
                $userInfo = array();
                  $userInfo['userId'] = $result[0]['id'];
                  $userInfo['userName'] = $result[0]['name'];
                  $userInfo['isAdmin'] = $result[0]['isAdmin'];
                  $userInfo['isConfirmed'] = $result[0]['isConfirmed'];                
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['userName'] = $userInfo['userName'];
                unset($_SESSION['isAdmin']);
                unset($_SESSION['isConfirmed']);
                if ( $userInfo['isConfirmed'] == 0) {
                  $_SESSION['isConfirmed'] = true;
                }
                if ( $userInfo['isAdmin'] == 1) {
                  $_SESSION['isAdmin'] = true;
                }
                $_SESSION['userId'] = $userInfo['userId'];
                header('location: index.php');
              } else {
                // Display wrong password message
                $password_err = 'The password you entered is not valid';
              }
            
          } else {
            $email_err = 'No account found for that email';
          }
      // Close statement
      unset($stmt);
    }
    // Close connection
    unset($pdo);
  }
?>

<?php include('./layout/header.php')?>

<body >
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
          <h2>Login</h2>
          <p>Fill in your credentials</p>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">   
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
              <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-row">
              <div class="col">
                <input type="submit" value="Login" class="btn btn-success btn-block">
              </div>
              <div class="col">
                <a href="register.php" class="btn btn-light btn-block">No account? Register</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>