
    <div class="wrapper">
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Movies / <?= $movie['movieName'];?> (<?= $movie['movieYear'];?>)
                </h2>
              </div>
            </div>
          </div>
        </div>

        <div class="page-body">
          <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12" style="padding-left: 16px;">
                            <img src="<?=base_url('assets');?>/dist/img/<?= $movie['moviePicture'];?>" alt="<?= $movie['movieName'];?>">
                        </div>
                        <div class="col-lg-9 col-sm-12 px-4">
                            <div class="mt-3">
                                <h1>
                                    <?= $movie['movieName'];?>
                                    <?php if($movie['movieActive'] != 'Tidak'){?>
                                        <span class="badge bg-yellow">Active</span></h1>
                                    <?php } else {?>
                                        <span class="badge bg-red">Inactive</span>
                                    <?php };?>
                                </h1>
                                <span><?= $movie['movieYear'];?> . <?= $movie['movieDuration'];?></span>
                                <hr>
                            </div>
                            <div">
                                <h2>Details</h2>
                                <p><strong>Genre : </strong><?= $movie['genreName'];?></p>
                                <p><strong>IMDb Rating : </strong><?= $movie['movieRank'];?> / 10</p>
                                <p><strong>Language : </strong><?= $movie['movieLanguage'];?></p>
                                <p><strong>Competence : </strong><?= $movie['competenceName'];?></p>
                                <p><strong>Watches : </strong><?= $movie['movieCount'];?></p>        
                            </div> 
                        </div>
                        <div class="col-12 px-4">
                            <hr>
                            <h2>Synopsis</h2>
                            <p class="text-justify"><?= $movie['movieSynopsis']?></p>
                            <hr>
                        </div>
                        <div class="col-12 px-4">
                            <h2>Theaters</h2>
                            <div class="table-responsive">

                              <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                  <tr>
                                    <th>Action</th>
                                    <th>Date/ Time</th>
                                    <th>Location</th>

                                    <?php if($role != 'lvl345'){?>
                                        <?php if($role != 'lvl12'){?>
                                          <th>Created By</th>
                                      <?php };?>
                                    <?php };?>

                                    <th>Registered</th>
                                    <th>Status</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>

                                <?php foreach($theaters as $theater):?>
                                  <tr id="<?= $theater['theaterId'];?>">
                                    <td class="text-start">
                                      <?php if($role != 'lvl345'){?>
                                        <?php if($role != 'lvl12'){?>
                                          <span class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                              <a class="dropdown-item" href="#">
                                                Edit
                                              </a>
                                              <a class="dropdown-item" href="#">
                                                Delete
                                              </a>                                         
                                          </div>
                                        </span>
                                      <?php };?>
                                    <?php };?>
                                    <?php if($role != 'hr'){?>
                                      <span>
                                        <a class="btn align-text-top" data-bs-boundary="viewport" data-role="register" data-id="<?= $theater['theaterId'];?>">Register</a>
                                      </span>
                                    <?php };?>
                                    </td>
                                    <td hidden data-target="movieName"><?= $movie['movieName'];?></td>
                                    <td hidden data-target="competenceName"><?= $movie['competenceName'];?></td>
                                    <td data-target="datetime"><?= $theater['theaterTime'];?></td>
                                    <td data-target="location"><?= $theater['theaterLocation'];?></td>
                                    <?php if($role != 'lvl345'){?>
                                        <?php if($role != 'lvl12'){?>
                                          <td><?= $theater['KAR_NAME'];?></td>
                                      <?php };?>
                                    <?php };?>
                                    <td>20/20 tickets</td>
                                    <td><span class="badge bg-danger me-1"></span> Full</td>
                                  </tr>
                                  <?php endforeach;?>

                                  </tbody>
                              </table>

                          </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

<!-- Modal -->

        <!-- Edit Theater Modal -->
        <div class="modal fade" id="registerModal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel" aria-hiddem="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('CRUD/register');?>" method="post" enctype="multipart/form-data" id="ModalForm"> 
                <div class="modal-body">

                    <fieldset class="form-fieldset">
                      <input type="hidden" id="theaterId">
                      <div class="mb-3">
                        <label class="form-label required">Subordinate</label>
                        <select type="text" class="form-select" name="subordinateId" id="subordianteId">
                          <option value=""></option>
                          <option value="">Syamsuddin</option>
                          <option value="">Pesulap Merah</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Movie Title</label>
                        <input type="text" class="form-control" name="movieName" id="movieName" readonly>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Competence</label>
                        <input type="text" class="form-control" name="competenceName" id="competenceName" readonly>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Date & Time</label>
                        <input type="datetime-local" class="form-control" id="datetime" name="datetime" readonly/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control"  id="location" name="location" readonly>
                      </div>
                    </fieldset>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" id="register">Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','a[data-role=register]',function(){
      var id = $(this).data('id');
      var movieName = $('#'+id).children('td[data-target=movieName]').text();
      var competenceName = $('#'+id).children('td[data-target=competenceName]').text();
      var datetime = $('#'+id).children('td[data-target=datetime]').text();
      var location = $('#'+id).children('td[data-target=location]').text();

      $('#movieName').val(movieName);
      $('#competenceName').val(competenceName);
      $('#datetime').val(datetime);
      $('#location').val(location);
      $('#registerModal').modal('toggle');
    })
  });
</script>