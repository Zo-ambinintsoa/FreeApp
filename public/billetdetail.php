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
              <a class="nav-link active" href="billet.php">
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
          <h1 class="h2"><i class="fa fa-pencil-square-o"></i> Details Du Billet de <span class="Nbillet"></span></h1>
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
                    Nom  de l'acheteur:
                    <span class="Nbillet"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Address : 
                    <span class="Nadd"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Numero de telephone : 
                    <span class="telephone"></span>
                </li>
                </ul>
          </div>


          <div class="col-lg-4 col-md-4 col-sm-12 pr-0 mb-3">
                <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nom Du Tombola:
                    <span class="Ntomb"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Date de Tirage : 
                    <span class="DTir"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Lot : 
                    <span class="lot"></span>
                </li>
                </ul>
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
                <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Ajouter par:
                    <span class="Nadd"></span>
                </li>
                </ul>
        <br><br><hr>
        
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des Numero</h1>
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
            
          <table id="exampleN" class="table table-striped" class="display">
            <thead class="thead-dark">
                <tr>
                    <th data-visible='false'>id</th>
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
    
 $(document).on('click', '.delete', function(){
  var tombola_id = $(this).attr("id");
  if(confirm("Ete vous sur de vouloir supprimer ce numero")) {
        $.ajax({
            url:"./script/billetnum/delee.php",
            method:"POST",
            data:{id:tombola_id},
            success:function(data)
            {
            alert(data);
            dataTable.ajax.reload();
            }
        });
  }
  else {
   return false; 
  }
 });
})


function DataInit() {
    $('.billet-list').empty();
    $('.Num-list').empty();

  $.ajax({
    method:"POST",
    data:{id:<?php echo $id?>},
    url: "./script/Billet/detail.php",
  success: function (response) {

        // alert(response.tombola.nom);

        $('.Tn').text(response.count.num);
        $('.Tb').text(response.count.billet);

        $.each(response.tombola, function (key, value) { 
            $('.Ntomb').text(value['nom']);
            $('.DTir').text(value['dateTirage']);
            $('.lot').text(value['lot']);
        });
        $.each(response.numero, function (key, value) { 
            $('.Num-list').append('<tr>'+                
                    '<td>'+value['id']+'</td>\
                    <td>'+value['No1']+'</td>\
                    <td>'+value['No2']+'</td>\
                    <td>'+value['No3']+'</td>\
                    <td>'+value['No4']+'</td>\
                    <td>'+value['No5']+'</td>\
                    <td>'+value['No6']+'</td>\
                    <td>'+value['No7']+'</td>\
                    <td>\
                        <a href="editnum.php?id='+value['id']+'" class="btn btn-sm btn-primary edit_btn"><i class="fa fa-edit"></i> E</a>\
                        <button type="button" id="'+value['id']+'" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i> D</button>\
                    </td>\
                </tr>');
        });
        $.each(response.billet, function (key, value) { 
            $('.Nbillet').text(value['nom']);
            $('.Nadd').text(value['address']);
            $('.telephone').text(value['telephone']);
            $('.Nadd').text(value['username']);
        });
         $('#exampleN').DataTable();
         $('#exampleB').DataTable();
    }
});

}


</script>

<?php include('./layout/footer.php')?>