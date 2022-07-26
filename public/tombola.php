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
              <a class="nav-link " href="index.php">
                <i class="fa fa-tachometer"></i>
                Dashboard
                <!-- <span class="badge badge-primary">14</span> -->
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link active" href="tombola.php">
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
          <h1 class="h2"><i class="fa fa-pencil-square-o"></i> Tombola</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="mr-2">
              <button id="addt" class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModalCenter" ><i class="fa fa-plus"></i> Ajouter</button>
            </div>
          </div>
        </div>
            <table id="example" class="table table-striped ml-sm-auto"  style="width: 100% !important;">
                    <thead class=" thead-dark">
                        <tr>
                            <th>id</th>
                            <th>Nom du Tombola</th>
                            <th>Date du Tirage</th>
                            <th>Lot</th>
                            <th>Ajouter par</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>  
      </main>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><div id="Mhead"></div></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formt">
      <div class="modal-body">
        <input type="hidden" name="operation" id="operation" />
        <input type="hidden" name="tombolaId" id="tombolaId" />
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputNom">Nom du Tombola</label>
              <input type="text" class="form-control" name="nom" id="inputnom" placeholder="Nom du tombola" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputdatet">Date de Tirage</label>
            <input type="date" class="form-control" name="datetirage"  id="inputdatet" required>
          </div>
          <div class="form-group">
            <label for="inputLot">Lot</label>
            <input type="text" class="form-control" id="inputLot" name="lot" placeholder="Lot du tombola" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Enregistre</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type = 'text/javascript'>
    $(document).ready(function () {
    $('#addt').click(function(){
        $('#formt')[0].reset();
        $('#Mhead').text("ajouter Tombola");
        $('#operation').val("Add");
    });

    var dataTable =  $('#example').DataTable({
        processing: true,
        serverSide: true,
        order:[],
        ajax: {
            url: './script/Tombola/fetch.php',
            type: 'POST',
        },
        columns: [
            { data: 'id' },
            { data: 'nom' },
            { data: 'dateTirage' },
            { data: 'lot' },
            { data: 'nomUser' },
            { data: 'Action' },
        ],
        "columnDefs": [
        {
        "targets":[5],
        "orderable":false,
    }, ],
    });


$(document).on('submit', '#formt', function(event){
  event.preventDefault();

    var nomTombola = $('#inputnom').val();
    var dateTirage = $('#inputdatet').val();
    var lot = $('#inputLot').val();
    
  if( nomTombola != '' && dateTirage != '' && lot != '' ) {
   $.ajax({
    url:"./script/Tombola/insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data) {
        alert(data);
        $('#formt')[0].reset();
        $('#exampleModalCenter').modal('hide');
        dataTable.ajax.reload();
    }
        });
      } else {
   alert("Both Fields are Required");
  }
     });

  $(document).on('click', '.update', function(){
  var tombola_id = $(this).attr("id");
 
  $.ajax({
   url:"./script/Tombola/fetch_single.php",
   method:"POST",
   data:{tombola_id:tombola_id},
   dataType:"json",
   success:function(data) {
            $('#exampleModalCenter').modal('show');
            $('#inputnom').val(data.nom);
            $('#inputdatet').val(data.dateTirage);
            $('#inputLot').val(data.lot);
            $('.modal-title').text("Modifier Tombola");
            $('#tombolaId').val(tombola_id);
            $('#action').val("Edit");
            $('#operation').val("Edit");
        }
    })
 });

 $(document).on('click', '.delete', function(){
  var tombola_id = $(this).attr("id");
  if(confirm("Ete vous sur de vouloir supprimer ce tombola")) {
        $.ajax({
            url:"./script/Tombola/delete.php",
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

});
</script>

<?php include('./layout/footer.php')?>