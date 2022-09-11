

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
              <div class="page-pretitle">
                  Self Learning
                </div>
                <h2 class="page-title">
                  Theaters
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                     
                      <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                          <div class="me-3">
                            
                          </div>
                          <?php if($role == 'hr'){
                            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTheater">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>';
                            echo 'Add Theater';
                            echo '</button>';
                          };?>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th class="w-1">Theater Id</th>
                          <th>Movie Title</th>
                          <th>Competence</th>
                          <th>Date/ Time</th>
                          <th>Location</th>
                          <th>Created By</th>
                          <th>Registered</th> 
                          <th>Status</th>
                          <?php if($role == 'hr'){
                            echo '<th>Action</th>';
                          };?>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($theaters as $theater):?>
                          <tr id="<?= $theater['theaterId'];?>">
                            <td><span class="text-muted"><?= $theater['theaterId'];?></span></td>
                            <td data-target="movieName"><a href="<?= base_url('Page/movieDetail/').$theater['movieId'];?>" class="text-reset" tabindex="-1"><?= $theater['movieName'];?></a></td>
                            <td data-target="competenceName"><a href="<?= base_url('Page/competences');?>" class="text-reset" tabindex="-1"><?= $theater['competenceName'];?></a></td>
                            <td data-target="datetime"><?= $theater['theaterTime'];?></td>
                            <td data-target="location"><?= $theater['theaterLocation'];?></td>
                            <td data-target="karName"><?= $theater['KAR_NAME'];?></td>
                            <td><?= $theater['theaterTicketCount'];?>/20 tickets</td>
                            <td> 
                            <?php if($theater['theaterActive'] == 'Ya'){
                              echo '<span class="badge bg-success me-1"></span> Open';
                            }else {
                              echo '<span class="badge bg-secondary me-1"></span> Close';
                            };?></td>
                            <?php if($role == 'hr'): ?>
                            <td class="text-end">
                              <span class="dropdown">
                                <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                <div class="dropdown-menu dropdown-menu-end">
                                  <a class="dropdown-item" href="#" data-role="edit" data-id="<?= $theater['theaterId'];?>">
                                    Edit
                                  </a>
                                  <a class="dropdown-item" href="#" data-role="delete" data-id="<?= $theater['theaterId'];?>">
                                    Delete
                                  </a>
                                </div>
                              </span>
                            </td>
                            <?php endif ;?>
                            <?php if($role == 'lvl345'):?>
                            <td class="text-end">
                              <span class="dropdown">
                                <a href="<?= base_url('Page/movieDetail/').$theater['movieId'];?>" class="btn align-text-top" data-bs-boundary="viewport">Register</a>
                              </span>
                            </td>
                            <?php endif;?>
                          </tr>
                        <?php endforeach;?>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer d-flex align-items-center">
                    <a href="<?= base_url('Page/theatersArchive');?>">See Theaters Archive</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <!-- Modals -->
        <!-- Add Theater Modal -->
        <div class="modal fade" id="addTheater" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hiddem="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Theater</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('CRUD/insertTheater');?>" method="post">
                <div class="modal-body">
                    <fieldset class="form-fieldset">
                      <div class="mb-3">
                        <label class="form-label required">Movie Title</label>
                        <select type="text" class="form-select" id="movie" name="movie">
                          <option value=""></option>
                          <?php foreach($movies as $movie) :?>
                          <option value="<?= $movie['movieId'];?>"><?= $movie['movieName'];?> / <?= $movie['competenceName'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label required" >Date</label>
                        <input type="datetime-local" class="form-control" id="datetime" name="datetime"/>
                      </div>

                      <div class="mb-3">
                        <label class="form-label required">Location</label>
                        <input type="text" class="form-control" placeholder="Set theater's location" id="location" name="location">
                      </div>

                      <div class="mb-3">
                        <label class="form-label required">Created By</label>
                        <select type="text" class="form-select" id="select-tags" id="createdBy" name="createdBy">
                          <option value=""></option>
                          <?php foreach($PICs as $PIC) : ?>
                          <option value="<?= $PIC['KAR_ID'];?>"><?= $PIC['KAR_NAME'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </fieldset>  
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
        <div class="modal fade" id="editTheater"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel" aria-hiddem="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Theater</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('CRUD/editTheater');?>" method="post" enctype="multipart/form-data" id="ModalForm"> 
                <div class="modal-body">
                    <fieldset class="form-fieldset">
                      <input type="hidden" id="theaterId">
                      <div class="mb-3">
                        <label class="form-label required">Movie Title</label>
                        <input type="text" class="form-control" name="movieName" id="movieName" readonly>
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Competence</label>
                        <input type="text" class="form-control" name="competenceName" id="competenceName" readonly>
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Date</label>
                        <input type="datetime-local" class="form-control" id="editDatetime" name="editDatetime" required/>
                      </div>

                      <div class="mb-3">
                        <label class="form-label required">Location</label>
                        <input type="text" class="form-control" placeholder="Set theater's location" id="editLocation" name="editLocation">
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Created By</label>
                        <input type="text" class="form-control" name="karName" id="karName" readonly>
                      </div>
                    </fieldset>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="editTheater">Change</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Delete Theater Modal -->
        <div class="modal fade" id="deleteTheater"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel" aria-hiddem="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Theater</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

            <form action="" method="post">
            <div class="modal-body"> 
                <input type="hidden" id="deleteTheaterId">
                <p class="text-center">Are you sure delete this theater?</p>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" id="deleteTheaterButton">Delete</button>
            </div>
            </form>
            </div>
          </div>
        </div>

<script type="text/javascript">
  $(document).ready(function(){

    // siapkan value di input field di modal edit
    $(document).on('click','a[data-role=edit]',function(){
      var id = $(this).data('id');
      var movieName = $('#'+id).children('td[data-target=movieName]').text();
      var competenceName = $('#'+id).children('td[data-target=competenceName]').text();
      var karName = $('#'+id).children('td[data-target=karName]').text();
      var datetime = $('#'+id).children('td[data-target=datetime]').text();
      var location = $('#'+id).children('td[data-target=location]').text();


      // taruh value di id input masing-masing
      $('#movieName').val(movieName);
      $('#competenceName').val(competenceName);
      $('#editDatetime').val(datetime);
      $('#editLocation').val(location);
      $('#karName').val(karName);
      $('#theaterId').val(id);
      $('#editTheater').modal('toggle');

    // buat event ambil data dari input field lalu kirimkan ke database
      $('#editTheater').click(function(){
        var id = $('#theaterId').val();
        var datetime = $('#editDatetime').val();
        var location = $('#editLocation').val();
        
        $.ajax({
            url     : '<?= base_url('CRUD/editTheater');?>',
            method  : 'post',
            data    : {
              theaterId   : id,
              datetime    : datetime,
              location    : location
            },
            success : function(response){
              console.log(response);
            } 
        })
      })
    })

    // siapkan value di input field di modal delete
    $(document).on('click','a[data-role=delete]',function(){
      var id = $(this).data('id');

      // taruh value di id input theaterId id = 
      $('#deleteTheaterId').val(id);
      $('#deleteTheater').modal('toggle');

      $('#deleteTheaterButton').click(function(){

        var id = $('#deleteTheaterId').val();

        $.ajax({
          url     : '<?= base_url('CRUD/deleteTheater');?>',
          method  : 'post',
          data    : {
            theaterId   : id
          },
          success : function(response){
            console.log(response);
          }
      })
      })
    })
  });
    
</script>

<script type="text/javascript">

</script>

