

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
                          <th>Competence</th>
                          <th>HR Score</th>
                          <th>HR Comment</th>
                          <th>Direct Score</th>
                          <th>Direct Comment</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1;?>
                      <?php foreach($observations as $observation):?>
                      <tr>
                          <td><?= $no;?></td>
                          <td><?= $observation['KAR_NIK']?></td>
                          <td><a class="link-dark" href="<?= base_url('Page/subordinate/').$observation['KAR_ID'].'/'.$observation['employeeId'];?>"><?= $observation['KAR_NAME']?></td>
                          <td><?= $observation['competenceName']?></td>
                          <td class="editable-col" contenteditable="true" id="3" value="<?= $observation['observationHRScore']?>"><?= $observation['observationHRScore']?></td>
                          <td class="editable-col" contenteditable="true" id="5" value="<?= $observation['observationHRComment']?>"><?= $observation['observationHRComment']?></td>
                          <td class="editable-col" contenteditable="true" id="4" value="<?= $observation['observationDirectScore']?>"><?= $observation['observationDirectScore']?></td>
                          <td class="editable-col" contenteditable="true" id="6" value="<?= $observation['observationDirectComment']?>"><?= $observation['observationDirectComment']?></td>
                          <td><?= $observation['observationStatus']?></td>
                      </tr>
                      <?php $no++;?>
                      <?php endforeach;?>
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