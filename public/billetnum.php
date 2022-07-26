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
          <h1 class="h2"><i class="fa fa-bar-chart"></i> Numero de Billet</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <!-- <div class="mr-2">
              <button class="btn btn btn-warning"><i class="fa fa-plus"></i> Ajouter</button>
            </div> -->
          </div>
        </div>
          <table id="example" class="table table-striped" class="display">
            <thead class="thead-dark">
                <tr>
                    <th data-visible='false'>id</th>
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
      </table>
      </main>
    </div>
  </div>

    <!-- Modal -->
<div class="modal fade" id="examplenum" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
        <input type="hidden" name="numId" id="id" />
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
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No1" id="No1" required class="one col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No2" id="No2" required class="two col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No3" id="No3" required class="three col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No4" id="No4" required class="four col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No5" id="No5" required class="five col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No6" id="No6" required class="six col-1 form-control m-1" max="9" min="0">
            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength='1' step="1" pattern="^[0-9]{1}$" name="No7" id="No7" required class="seven col-1 form-control m-1" max="9" min="0">
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
<script type='text/javascript'>
  $(document).ready( function () {

  var dataTable = $('#example').DataTable({
        processing: true,
        serverSide: true,
        order:[],
        ajax: {
            url: './script/BilletNum/fetch.php',
            type: 'POST',
        },
        columns: [
            { data: 'id' },
            { data: 'nomtombola' },
            { data: 'nomprop' },
            { data: 'No1' },
            { data: 'No2' },
            { data: 'No3' },
            { data: 'No4' },
            { data: 'No5' },
            { data: 'No6' },
            { data: 'No7' },
            { data: 'Action' },
        ],
        "columnDefs": [
        {
        "targets":[0,10],
        "orderable":false,
    }, ],
    });

  $(document).on('click', '.updatenum', function(){
    var id = $(this).attr("id");
    $.ajax({
    method:"POST",
    url: "./script/BilletNum/fetch_single.php",
     data:{id:id},
    success: function (response) {
    console.log(response.nomtombola)
        $('.modal-title').text('Modifier Numero');
        $('.Ntomb').text(response.nombillet);
        $('#idTombola2').val(response.idTombola);
        $('.DTir').text(response.address);
        $('.Btel').text(response.telephone);
        $('#id').val(response.id);
        $('#No1').val(response.No1);
        $('#No2').val(response.No2);
        $('#No3').val(response.No3);
        $('#No4').val(response.No4);
        $('#No5').val(response.No5);
        $('#No6').val(response.No6);
        $('#No7').val(response.No7);
        $('#examplenum').modal('show');
    }
        });
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
    });
</script>


<?php include('./layout/footer.php')?>