

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Absence
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
                            <?php if($theater['theaterTicketCount'] <= 19){
                              echo '<span class="badge bg-success me-1"></span> Open';
                            }else {
                              echo '<span class="badge bg-danger me-1"></span> Full';
                            };?></td>
                            <?php if($role == 'hr'): ?>
                            <td class="text-end">
                              <span class="dropdown">
                                <a href="<?= base_url('Page/absenceDetail/').$theater['movieId'].'/'.$theater['theaterId']?>" class="btn align-text-top" data-bs-boundary="viewport">Absence</a>
                              </span>
                            </td>
                            <?php endif ;?>
                          </tr>
                        <?php endforeach;?>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer d-flex align-items-center">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



