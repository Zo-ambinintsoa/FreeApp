  <!-- Modal -->
<div class="modal fade" id="examplenum" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><div id="Mhead"></div></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formn">
      <div class="modal-body">
        <input type="hidden" name="operation" id="operation" value="Edit" />
        <input type="hidden" name="idTombola" id="idTombola" />
        <input type="hidden" name="id" id="id" />
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
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Enregistre</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready( () => {
  $(document).on('click', '.updatenum', () => {
    var id = $(this).attr("id");
    $.ajax({
    method:"POST",
    url: "./script/BilletNum/fetch_single.php",
     data:{id:id},
    success: function (response) {
    // console.log(response.nomtombola)
        $('#examplenum').modal('show');
        $('.modal-title').text(response.nombillet);
        $('#idTombola').val(response.idTombola);
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
 });

});

</script>