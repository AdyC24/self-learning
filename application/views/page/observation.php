

      <div class="page-wrapper">
        <div class="container-xl"  style="margin-bottom:100px;">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
              <div class="page-pretitle">
                  Observation
                </div>
                <h2 class="page-title">
                  Observation Log
                </h2>
              </div>
            </div>
          </div>
          <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-12 table-responsive">
                <table id="employees" class="table" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Section</th>
                          <th>Position</th>
                          <th>Development Plan</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;?>
                    
                      <tr>
                          <td><?= $no;?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr>
                      <?php $no++;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- Javascript -->

<script type="text/javascript">
$(document).ready(function () {
  // dataTables
    $('#employees').DataTable();

  // empComp
    $(document).on('click','a[data-role=empComp]',function(){
      var id = $(this).data('id');


      $('#employeeId').val(id);
      $('#empCompEdit').modal('toggle');
    }) 

    
});
</script>