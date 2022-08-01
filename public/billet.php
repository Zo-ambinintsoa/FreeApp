<?php 
require 'bootstrap.php';
require './script/Tombola/getforSelect.php'


?>

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
              <a class="nav-link " href="tombola.php">
                <i class="fa fa-pencil-square-o"></i> Tombola
              </a>
            </li>


            <li class="nav-item">
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
          <h1 class="h2"><i class="fa fa-desktop"></i> Billet</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="mr-2">
              <button id="addt" class="btn btn btn-warning" type="button" ><i class="fa fa-plus"></i> Ajouter</button>
            </div>
          </div>
        </div>
          <table id="example" class="table table-striped" class="display">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>Nom du Tombola</th>
                    <th>Nom de l'acheteur</th>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Ajouter par</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
      </main>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title-billet" id="exampleModalLongTitle"><div id="Mhead"></div></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formt">
      <div class="modal-body">
        <input type="hidden" name="operation" id="operation" />
        <input type="hidden" name="billetId" id="billetId" />
        <input type="hidden" name="userId" id="userId" value='<?php echo $_SESSION['userId']?>'/>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputNom">Tombola</label>
              <select class="custom-select mr-sm-2" id= "idTombola" name="idTombola" required>
                  <option selected>Choose...</option>
              <?php 
                    foreach($result as $row) {
                        echo('<option value="'.$row["id"].'">'. $row["nom"].'</option>');
                        }
                    ?>
            </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="inputNom">Nom de l'acheteur</label>
              <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom de L'acheteur" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputdatet">Adresse de l'acheteur</label>
            <input type="text" class="form-control" name="address" placeholder="Addresse" id="address" required>
          </div>
          <div class="form-group">
            <label for="inputLot">Telephone de l'acheteur</label>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" required>
          </div>
          <div class="form-group">
            <label for="inputLot">Prix du Numero</label>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Telephone" required>
          </div>
          <div class="formbilnum">
              <label for="inputLot">Numero</label>
            <div class="form-inline  ustify-content-between align-items-center">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No1" id="No1" required class="one col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No2" id="No2" required class="two col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No3" id="No3" required class="three col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No4" id="No4" required class="four col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No5" id="No5" required class="five col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No6" id="No6" required class="six col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No7" id="No7" required class="seven col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No8" id="No8" required class="eight col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No9" id="No9" required class="nine col-1 form-control m-1" max="9" min="0">
              <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No10" id="No10" required class="ten col-1 form-control m-1" max="9" min="0">
            </div> 
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


<!-- Modal Numero List -->
<div class="modal fade bd-example-modal-lg" id="listBillet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title-num" id="exampleModalLongTitle"><div id="Mhead"></div></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table id="example" class="table table-striped" class="display">
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
                    <th>No8</th>
                    <th>No9</th>
                    <th>No10</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="billet-list">

            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">X Close</button>
        <!-- <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Enregistre</button> -->
      </div>
    </div>
  </div>
</div>
    <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="examplenum" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><div id="Mhead"></div></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formn">
      <div class="modal-body">
        <input type="hidden" name="operation" id="operationB" value="Edit" />
        <input type="hidden" name="idTombola" id="idTombola2" />
        <input type="hidden" name="numId" id="idn" />
            <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Billet de:
                <span class="Ntomb"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Address : 
                <span class="DTir"></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Numero de Telephone : 
                <span class="Btel"></span>
            </li>
            </ul>
            <hr>
        <div class="form-inline  ustify-content-between align-items-center">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No1" id="No1n" required class="one col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No2" id="No2n" required class="two col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No3" id="No3n" required class="three col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No4" id="No4n" required class="four col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No5" id="No5n" required class="five col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No6" id="No6n" required class="six col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No7" id="No7n" required class="seven col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No8" id="No8n" required class="eight col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No9" id="No9n" required class="nine col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No10" id="No10n" required class="ten col-1 form-control m-1" max="9" min="0">
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
       $('.modal-title-billet').text("Ajouter Billet");
        $('#operation').val("Add");
        $('#exampleModalCenter').modal('show');       
    });
    
 var dataTable = $('#example').DataTable({
        processing: true,
        serverSide: true,
        order:[],
        ajax: {
            url: './script/Billet/fetch.php',
            type: 'POST',
        },
        columns: [
            { data: 'id' },
            { data: 'nomtombola' },
            { data: 'nom' },
            { data: 'address' },
            { data: 'telephone' },
            { data: 'username' },
            { data: 'Action' },
        ],
        "columnDefs": [
        {
        "targets":[0,5],
        "orderable":false,
    }, ],
    });

$(document).on('submit', '#formt', function(event){
  event.preventDefault();

    var nom = $('#nom').val();
    var address = $('#address').val();
    var idTombola = $('#idTombola').val();
    
  if( nom != '' && address != '' && idTombola != '' ) {
   $.ajax({
    url:"./script/Billet/insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data) {
        alert(data);
        $('#formt')[0].reset();
        $('.modal-title-billet').text("Ajouter Billet");
        $('#exampleModalCenter').modal('hide');
        dataTable.ajax.reload();
    }
        });
      } else {
   alert("Both Fields are Required");
  }
     });

     $(document).on('submit', '#formn', function(event){
      event.preventDefault();
        $.ajax({
        url:"./script/BilletNum/insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data) {
            alert(data);
            $('#formn')[0].reset();
            $('#examplenum').modal('hide');
            dataTable.ajax.reload();
        }
            });
     });



  $(document).on('click', '.listB', function(){
  var billet_id = $(this).attr("id");
  $('.billet-list').empty();
  $('#listBillet').modal('show');
  $('.modal-title-num').text("Liste des Numero");
  $.ajax({
   method:"POST",
   data:{billet_id:billet_id},
   dataType:"json",
  url: "./script/BilletNum/fetchById.php",
  success: function (response) {
        // console.log(response);
        $.each(response, function (key, value) { 
            // console.log(value['fname']);
            $('.billet-list').append('<tr>'+                
                    '<td>'+value['id']+'</td>\
                    <td>'+value['No1']+'</td>\
                    <td>'+value['No2']+'</td>\
                    <td>'+value['No3']+'</td>\
                    <td>'+value['No4']+'</td>\
                    <td>'+value['No5']+'</td>\
                    <td>'+value['No6']+'</td>\
                    <td>'+value['No7']+'</td>\
                    <td>'+value['No8']+'</td>\
                    <td>'+value['No9']+'</td>\
                    <td>'+value['No10']+'</td>\
                    <td>'+value['prix']+'</td>\
                    <td>'+value['Action']+'</td>\
                </tr>');
        });
    }
});

 });

  $(document).on('click', '.update', function(){
  var billet_id = $(this).attr("id");
 
  $.ajax({
   url:"./script/Billet/fetch_single.php",
   method:"POST",
   data:{billet_id:billet_id},
   dataType:"json",
   success:function(data) {
            $('#exampleModalCenter').modal('show');
            $('.formbilnum').remove();
            $('#nom').val(data.nom);
            $('#address').val(data.address);
            $('#telephone').val(data.telephone);
            $('#idTombola').val(data.idTombola);
            $('#idTombola').attr('disabled','disabled');
            $('.modal-title-billet').text("Modifier Billet");
            $('#billetId').val(billet_id);
            $('#action').val("Edit");
            $('#operation').val("Edit");
        }
    })
 });

  $(document).on('click', '.updatenum', function(){
    var id = $(this).attr("id");
    
    $.ajax({
    method:"POST",
    url: "./script/BilletNum/fetch_single.php",
     data:{id:id},
    success: function (response) {
        // console.log(response.nomtombola)
        $('#listBillet').modal('hide');
        $('.modal-title').text('Modifier Numero');
        $('.Ntomb').text(response.nombillet);
        $('#idTombola2').val(response.idTombola);
        $('.DTir').text(response.address);
        $('.Btel').text(response.telephone);
        $('#idn').val(response.id);
        $('#No1n').val(response.No1);
        $('#No2n').val(response.No2);
        $('#No3n').val(response.No3);
        $('#No4n').val(response.No4);
        $('#No5n').val(response.No5);
        $('#No6n').val(response.No6);
        $('#No7n').val(response.No7);
        $('#No8n').val(response.No8);
        $('#No9n').val(response.No9);
        $('#No10n').val(response.No10);
        $('#prix').val(response.prix);
        $('#examplenum').modal('show');
    }
        });
 });

  $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  if(confirm("Ete vous sur de vouloir supprimer ce Billet")) {
        $.ajax({
            url:"./script/Billet/delete.php",
            method:"POST",
            data:{id:id},
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

  $(document).on('click', '.deletenum', function(){
  var id = $(this).attr("id");
  if(confirm("Ete vous sur de vouloir supprimer ce numero")) {
        $.ajax({
            url:"./script/BilletNum/delete.php",
            method:"POST",
            data:{id:id},
            success:function(data)
            {
            $('#listBillet').modal('hide');
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