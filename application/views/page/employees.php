

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
                  Employees
                </h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee">Add Employees</button>
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
            <?php foreach($employees as $employee):?>
            <tr id="<?= $employee['employeeId'];?>">
            
                <td><?= $no;?></td>
                <td data-target="employeeNIK"><?= $employee['KAR_NIK']?></td>
                <td><?= $employee['KAR_NAME']?></td>
                <td><?= $employee['SEC_NAME']?></td>
                <td><?= $employee['JAB_NAME']?></td>
                <td><a href="#" data-role="empComp" data-id="<?= $employee['employeeId'];?>" class="link-dark"><?= $employee['employeeCompetencyCount']?></a></td>
                <?php if($employee['employeeStatus'] == 'Tidak'):?>
                <td><a href="<?= base_url('CRUD/updateEmployeeStatus/Ya/').$employee['employeeId'];?>" class="link-dark"><span class="badge bg-danger me-1"></span>Non Active</a></td>
                <?php else:?>
                <td><a href="<?= base_url('CRUD/updateEmployeeStatus/Tidak/').$employee['employeeId'];?>" class="link-dark"><span class="badge bg-success me-1"></span>Active</a></td>
                <?php endif;?>   
            </tr>
            <?php $no++;?>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Section</th>
                <th>Position</th>
                <th>Development Plan</th>
                <th>Status</th>
            </tr>
        </tfoot>
    </table>

                
              </div>
            </div>
          </div>
        </div>

<!-- Modal -->
        <!-- Add Employee -->
        <div class="modal fade" id="addEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hiddem="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="#" method="post">
                <div class="modal-body">
                    
                      
                     
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Edit Theater Modal -->
        <div class="modal fade" id="empCompEdit"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel" aria-hiddem="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Competency Adjustment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('CRUD/updateInsertEmpComp')?>" method="post" enctype="multipart/form-data" id="ModalForm"> 
                <div class="modal-body">
                  <div class="mb-3">

                    <div class="form-selectgroup form-selectgroup-pills">
                      <input type="hidden" name="employeeId" id="employeeId">
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="1" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Achivement Drive</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="2" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Accountable for SHE</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="3" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Continous Improvement</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="4" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Integrity</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="5" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Teamwork and Collaboration</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="6" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Building Partnership</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="7" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Business Sense</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="8" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Decisiveness</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="9" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Developing People</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="10" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Team Leadership</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="11" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Analytical Thinking</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="12" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Conseptual Thinking</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="13" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Adaptability</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="14" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Communication Skill</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="15" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Managing Conflict</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="16" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Planning, Organizing & Controlling</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="17" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Managing and Leading Change</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="18" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Human Resources Planning</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="checkbox" name="competency[]" value="19" class="form-selectgroup-input">
                        <span class="form-selectgroup-label">Organizational Savvy</span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary" id="editTheater">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>


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

