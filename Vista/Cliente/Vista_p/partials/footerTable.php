 <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>P.canavas - 2020 - ck</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-warning" href="login.html" >Logout</a>
        </div>
      </div>
    </div>
  </div>












  <!-- Bootstrap core JavaScript-->
  <script src="Vista_p/vendor/jquery/jquery.min.js"></script>
  <script src="Vista_p/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="Vista_p/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="Vista_p/js/sb-admin-2.min.js"></script>



  <!-- Page level custom scripts -->
  <script src="Vista_p/js/demo/datatables-demo.js"></script>







    <!-- <script src="Vista_p/librerias/jquery-3.2.1.min.js"></script>-->
    <!-- <script src="Vista_p/librerias/bootstrap/js/bootstrap.js"></script>-->
    <!-- <script src="Vista_p/librerias/alertifyjs/alertify.js"></script>-->
    <!-- <script src="Vista_p/librerias/select2/js/select2.js"></script>-->

    <!-- <script src="Vista_p/librerias/datatable/dataTables.bootstrap.min.js"></script>-->
 <script src="Vista_p/librerias/datatable/jquery.dataTables.min.js"></script>

<!----------
   <script src="Vista_p/librerias/datatable/buttons/dataTables.buttons.min.js"></script>
   <script src="Vista_p/librerias/datatable/buttons/jszip.min.js"></script>
   <script src="Vista_p/librerias/datatable/buttons/pdfmake.min.js"></script>
    <script src="Vista_p/librerias/datatable/buttons/vfs_fonts.js"></script>
   <script src="Vista_p/librerias/datatable/buttons/buttons.html5.min.js"></script>
----->

</body>

</html>















<div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User</h4>
        </div>
        <div class="modal-body">
          <label>Nombre usuario</label>
          <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" />
          <br />
          <label>nombre U</label>
          <input type="text" name="nombre_u" id="nombre_u" class="form-control" />

        </div>
        <div class="modal-footer">
          <input type="hidden" name="cod_cliente" id="cod_cliente" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
$('#add_button').click(function(){

$('#user_form')[0].reset();
$('.modal-title').text("Titulo del modal :) add");
$('#action').val("Add");
$('#operation').val("Add");

    });

  
  var dataTable = $('#myTable').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":{
      url:"../../Controller/Cliente/fetch.php",
      type:"POST"
    },
    "columnDefs": [ { 
 "searchable": false,
  "orderable": false,
   "targets": 0 } ],
    "order": [[ 1, 'asc' ]] 

});



  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var nombre_cliente = $('#nombre_cliente').val();
    var nombre_u = $('#nombre_u').val();
  
    if(nombre_cliente != '' && nombre_u != '')
    {
      $.ajax({
        url:"../../Controller/Cliente/insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();

          $('#userModal').modal('hide');
          dataTable.ajax.reload();


        }

      });
//document.location = "index.php";(REDIRECCIONAR)
    }

    else
    {
      alert("Both Fields are Required");
    } 
  });

  $(document).on('click', '.update', function(){
    var cod_cliente = $(this).attr("cod_cliente");
    $.ajax({
      url:"../../Controller/Cliente/fetch_single.php",
      method:"POST",
      data:{cod_cliente:cod_cliente},
      dataType:"json",
      success:function(data)
      {
        $('#userModal').modal('show');
        $('#nombre_cliente').val(data.nombre_cliente);
        $('#nombre_u').val(data.nombre_u);
        $('.modal-title').text("Edit User");
        $('#cod_cliente').val(cod_cliente);
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });

  $(document).on('click', '.delete', function(){
    var cod_cliente = $(this).attr("cod_cliente");
    if(confirm("estas seguro de eliminar?"))
    {
      $.ajax({
        url:"../../Controller/Cliente/delete.php",
        method:"POST",
        data:{cod_cliente:cod_cliente},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      return false; 
    }
  });

  }); 
  
</script>