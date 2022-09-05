

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Employees
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-12">

              <table id="employees" class="table" style="width:100%">
        <thead>
            <tr>
                <Th></Th>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Section</th>
                <th>Position</th>
                <th>Competency</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;?>
            <?php foreach($employees as $employee):?>
            <tr>
                <td></td>
                <td><?= $no;?></td>
                <td><?= $employee['KAR_NIK']?></td>
                <td><?= $employee['KAR_NAME']?></td>
                <td><?= $employee['SEC_NAME']?></td>
                <td><?= $employee['JAB_NAME']?></td>
                <td>10</td>
                <?php if($employee['KAR_SLD'] = 'Tidak'):?>
                <td><span class="badge bg-danger me-1"></span> Non Active</td>
                <?php else:?>
                <td><span class="badge bg-success me-1"></span> Active</td>
                <?php endif;?>
                <td>Edit</td>
            </tr>
            <?php $no++;?>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Section</th>
                <th>Position</th>
                <th>Competency</th>
                <th>Status</th>
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
    $('#employees').DataTable();
});
</script>

