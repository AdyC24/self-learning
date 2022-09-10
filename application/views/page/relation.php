

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
            <div class="page-pretitle">
                  Settings
                </div>
              <div class="col d-flex justify-content-between">
              
                <h2 class="page-title">
                  Relations
                </h2>
              </div>
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
                <th>Direct NIK</th>
                <th>Direct</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          <?php $no = 1;?>
          <?php foreach($relations as $relation):?>
            <tr id="">
                <td><?= $no;?></td>
                <td><?= $relation['KAR_ATASAN'];?></td>
                <td><?= $relation['KAR_ATASAN'];?></td>
                <td><?= $subordinate['KAR_NIK'];?></td>
                <td><?= $subordinate['KAR_NAME'];?></td>
                <td><a href="#" class="btn align-text-top" data-bs-boundary="viewport">Edit</a></td>
            </tr>
          <?php $no++?>
          <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Direct NIK</th>
                <th>Direct</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>

                
              </div>
            </div>
          </div>
        </div>



<script type="text/javascript">
$(document).ready(function () {
  // dataTables
    $('#employees').DataTable();
    
});
</script>

