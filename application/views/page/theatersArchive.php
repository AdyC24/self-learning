

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
                  <a href="<?= base_url('Page/theater');?>">Theaters</a> / Archive
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
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($theaters as $theater):?>
                          <tr id="<?= $theater['theaterId'];?>">
                            <td><span class="text-muted"><?= $theater['theaterId'];?></span></td>
                            <td data-target="movieName"><a href="<?= base_url('Page/absenceDetail/').$theater['movieId'].'/'.$theater['theaterId'];?>" class="text-reset" tabindex="-1"><?= $theater['movieName'];?></a></td>
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
                            };?>
                            </td>
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

 