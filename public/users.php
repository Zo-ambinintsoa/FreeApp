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
          <h1 class="h2"><i class="fa fa-pencil-square-o"></i> Utilisateur</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="mr-2">
              <button id="addt" class="btn btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModalCenter" ><i class="fa fa-plus"></i> Ajouter</button>
            </div>
          </div>
        </div>

          <table id="example" class="table table-striped" class="display">
            <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th width="20%">Action</th>
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
        <input type="hidden" name="user_id" id="user_id" />
          <div class="form-row">
            <div class="form-group col-md">
              <label for="name">Nom de l'utilisateur</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Nom de l'utilisateur" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"  id="email" placeholder="Email de l'utilisateur" required>
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
        $('#Mhead').text("ajouter Utilisateur");
        $('#operation').val("Add");
    });
    var dataTable = $('#example').DataTable({
        processing: true,
        serverSide: true,
        order:[],
        ajax: {
            url: './script/Users/fetch.php',
            type: 'POST',
        },
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'isAdmin' },
            { data: 'Action' },
        ],
        "columnDefs": [
        {
        "targets":[4],
        "orderable":false,
    }, ],
    });

$(document).on('submit', '#formt', function(event){
  event.preventDefault();


    var name = $('#name').val();
    
    
  if ( name != '' && email != '' ) {
   $.ajax({
    url:"./script/Users/insert.php",
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
   alert("Tous les champ sont requise");
  }
     });
  $(document).on('click', '.update', function(){
  var user_id = $(this).attr("id");
  $.ajax({
   url:"./script/Users/fetch_single.php",
   method:"POST",
   data:{user_id:user_id},
   dataType:"json",
   success:function(data) {
            $('#exampleModalCenter').modal('show');
            $('#email').val(data.email);
            $('#name').val(data.name);
            $('.modal-title').text("Modifier Utilisateur");
            $('#user_id').val(user_id);
            $('#action').val("Edit");
            $('#operation').val("Edit");
        }
    })
 });

  $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  if(confirm("Ete vous sur de vouloir supprimer cet utilisateur")) {
    if(confirm("Cet operation peut creer des bug dans l'application ete vous sur de vouloir continuer ? ")) {
        $.ajax({
            url:"./script/Users/delete.php",
            method:"POST",
            data:{id:user_id},
            success:function(data)
            {
            alert(data);
            dataTable.ajax.reload();
            }
        });
      }
  }
  else {
   return false; 
  }
 });

 $(document).on('click', '.confirm', function(){
  var user_id = $(this).attr("id");
  var operation = $(this).attr("name");
  if(confirm("Ete vous sur de vouloir effectuer cette operation")) {
        $.ajax({
            url:"./script/Users/validate.php",
            method:"POST",
            data:{id:user_id , operation:operation},
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