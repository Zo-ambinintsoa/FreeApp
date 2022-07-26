<?php include('./layout/header.php')?>

<?php include('./layout/navbar.php')?>
<?php include './redirect.php' ?>
  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

          <h6 class="sidebar-heading">
            <span>Main Navigation</span>
          </h6>

          <ul class="nav flex-column">



            <li class="nav-item">
              <a class="nav-link" href="index.php">
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


            <li class="nav-item ">
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
              <a class="nav-link active" href="#">
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
          <h1 class="h2"><i class="fa fa-pencil-square-o"></i> Details De l'utilisateur : <span class="Ntomb"></span></h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="btn-group mr-2">
              <button class="btn btn-sm btn-primary">Share</button>
              <button class="btn btn-sm btn-primary">Export</button>
            </div> -->
            <!-- <button class="btn btn-sm btn-primary dropdown-toggle">
              <i class="fa fa-calendar"></i>
              This week
            </button> -->
          </div>
        </div>



        <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-12 pr-0 mb-3">
                <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nom de l'Utilisateur:
                    <span class="Ntomb"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Email : 
                    <span class="DTir"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Assignation : 
                    <span class="lot"></span>
                </li>
                </ul>
          </div>


          <div class="col-lg-4 col-md-4 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-primary">
              <div class="card-header"><i class="fa fa-shopping-bag"></i>Total Billet</div>
              <div class="card-body">
                <h3 class="card-title Tb"></h3>
              </div>
              <!-- <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 pr-0 mb-3">
            <div class="card text-white bg-success">
              <div class="card-header"><i class="fa fa-bar-chart"></i> Total Numero</div>
              <div class="card-body">
                <h3 class="card-title Tn"></h3>
              </div>
              <!-- <a class="card-footer text-right" href="#">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>

        </div>
        <br><br><hr>
        
            
                <table id="exampleB" class="table table-striped" class="display">
                    <thead class="thead-dark">
                        <tr>
                            <th>id</th>
                            <th>Tombola</th>
                            <th>Nom de l'acheteur</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <!-- <th>Ajouter par</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="billet-list">

                    </tbody>                    
                </table>

              <br><br><hr>
            
          <table id="exampleN" class="table table-striped" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Tombola</th>
                    <th>Billet De</th>
                    <th>No1</th>
                    <th>No2</th>
                    <th>No3</th>
                    <th>No4</th>
                    <th>No5</th>
                    <th>No6</th>
                    <th>No7</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="Num-list">

            </tbody>
        </table>
         

      </main>
    </div>
  </div>
<script type="text/javascript">
$(document).ready(function () { 
    DataInit();
})


function DataInit() {
    $('.billet-list').empty();
    $('.Num-list').empty();

  $.ajax({
      method:"POST",
      data:{id:<?php echo $id?>},
    url: "./script/Users/profile.php",
  success: function (response) {

        // alert(response.tombola.nom);

        $('.Tn').text(response.count.num);
        $('.Tb').text(response.count.billet);

        $.each(response.user, function (key, value) { 
            $('.Ntomb').text(value['name']);
            $('.DTir').text(value['email']);
            $('.lot').text('admin');
            if (value['isAdmin'] == 0) {
                $('.lot').text('employer');
            } else if (value['isAdmin'] == 1) {
                $('.lot').text('admin');
            }
        });
        $.each(response.numero, function (key, value) { 
            $('.Num-list').append('<tr>'+                
                    '<td>'+value['id']+'</td>\
                    <td>'+value['nomtombola']+'</td>\
                    <td>'+value['nombillet']+'</td>\
                    <td>'+value['No1']+'</td>\
                    <td>'+value['No2']+'</td>\
                    <td>'+value['No3']+'</td>\
                    <td>'+value['No4']+'</td>\
                    <td>'+value['No5']+'</td>\
                    <td>'+value['No6']+'</td>\
                    <td>'+value['No7']+'</td>\
                    <td>\
                        <a href="#" class="btn btn-sm btn-info viewbtn"> <i class="fa fa-eye"></i> V</a>\
                        <a href="#" class="btn btn-sm btn-primary edit_btn"> <i class="fa fa-edit"></i> E</a>\
                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> D</a>\
                    </td>\
                </tr>');
        });
        $.each(response.billet, function (key, value) { 
            $('.billet-list').append('<tr>'+                
                    '<td>'+value['id']+'</td>\
                    <td>'+value['nomtombola']+'</td>\
                    <td>'+value['nom']+'</td>\
                    <td>'+value['address']+'</td>\
                    <td>'+value['telephone']+'</td>\
                    <td>\
                        <a href="#" class="btn btn-sm btn-info viewbtn"> <i class="fa fa-eye"></i> V</a>\
                        <a href="#" class="btn btn-sm btn-primary edit_btn"> <i class="fa fa-edit"></i> E</a>\
                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> D</a>\
                    </td>\
                </tr>');
        });
         $('#exampleN').DataTable();
         $('#exampleB').DataTable();
    }
});

}


</script>

<?php include('./layout/footer.php')?>