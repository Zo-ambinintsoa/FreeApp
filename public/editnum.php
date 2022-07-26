<?php include('./layout/header.php')?>

<?php include('./layout/navbar.php')?>

<?php include('./bootstrap.php')?>
<?php include './redirect.php' ?>
<?php
    // Init vars
  $No1 = $No2 = $No3 = $No4 = $No5 = $No6 = $No7 = '';
  $No1_err = $No2_err = $No3_err = $No4_err = $No5_err = $No6_err = $No7_err = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize POST
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Put post vars in regular vars
    $No1 = trim($_POST['No1']);
    $No2 = trim($_POST['No2']);
    $No3 = trim($_POST['No3']);
    $No4 = trim($_POST['No4']);
    $No5 = trim($_POST['No5']);
    $No6 = trim($_POST['No6']);
    $No7 = trim($_POST['No7']);

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
              <a class="nav-link " href="tombola.php">
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
              <a class="nav-link active" href="billetnum.php">
                <i class="fa fa-bar-chart"></i> Numero de Billet
              </a>
            </li>


          </ul>

          <h6 class="sidebar-heading">
            <span>Utilisateur</span>
          </h6>

          <ul class="nav flex-column">

            <li class="nav-item has-child">
              <a class="nav-link" href="#">
                <i class="fa fa-user-o"></i> Profile
                <span class="badge badge-primary">3</span>

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
          <h1 class="h2"><i class="fa fa-edit"></i> Editer Numero de Billet</h1>
          <div class="btn-toolbar mb-2 mb-md-0">

          </div>
        </div>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Nom du Tombola :
                        <span class="Tnom"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Nom de l'acheteur:
                        <span class="Bnom"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Address:
                        <span class="Badd"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Numero :
                        <span class="Btel"></span>
                    </li>
                </ul>        
                <br><br>
                    <h2> Formulaire : </h2>
                <hr>
            <div class="row">
                <div class="col-md-12">
                    <form class="form_loto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
                        <input type="hidden" name="operation" id="operation" value='Edit'/>
                        <input type="hidden" name="id" id="id"/>
                      <div id="ligne">
                          <div class="form-inline ">
                              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No1" id="No1" required class="one col-1 form-control m-1" max="9" min="0">
                              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No2" id="No2" required class="two col-1 form-control m-1" max="9" min="0">
                              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No3" id="No3" required class="three col-1 form-control m-1" max="9" min="0">
                              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No4" id="No4" required class="four col-1 form-control m-2" max="9" min="0">
                              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No5" id="No5" required class="five col-1 form-control m-2" max="9" min="0">
                              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No6" id="No6" required class="six col-1 form-control m-1" max="9" min="0">
                              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No7" id="No7" required class="seven col-1 form-control m-1" max="9" min="0">
                          </div>
                      </div>
                          <input type="submit" id="ajout_nums_billets" class="btn btn-success m-1" value="Enregistrer">
                    </form>
                </div>
            </div>
      </main>
    </div>
  </div>
<script type="text/javascript">
$(document).ready(function () { 
    $.ajax({
    method:"POST",
    url: "./script/BilletNum/fetch_single.php",
     data:{id:<?php echo $id?>},
    success: function (response) {
    // console.log(response.nomtombola)
        $('.Tnom').text(response.nomtombola);
        $('.Bnom').text(response.nombillet);
        $('.Badd').text(response.address);
        $('.Btel').text(response.telephone);
        $('#id').val(response.id);
        $('#No1').val(response.No1);
        $('#No2').val(response.No2);
        $('#No3').val(response.No3);
        $('#No4').val(response.No4);
        $('#No5').val(response.No5);
        $('#No6').val(response.No6);
        $('#No7').val(response.No7);
    }
});


})

</script>

<?php include('./layout/footer.php')?>