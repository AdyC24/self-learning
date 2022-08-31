
    <div class="wrapper">
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title"><a href="<?= base_url('Page/absence');?>">Absence</a> / <?= $movie['movieName'];?> (<?= $movie['movieYear'];?>)
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
                          <div class="d-flex justify-content-between">
                            <div class="mt-3 col-6">
                                  <h1>
                                      <?= $movie['movieName'];?>
                                      <?php if($movie['movieActive'] != 'Tidak'){?>
                                          <span class="badge bg-yellow">Active</span></h1>
                                      <?php } else {?>
                                          <span class="badge bg-red">Inactive</span>
                                      <?php };?>
                                  </h1>
                                  <span><?= $movie['movieYear'];?> . <?= $movie['movieDuration'];?></span>
                                  <br>
                                  
                              </div>
                              <div>
                                <div class="mb-3">jam on lokasi by PIC</div>
                                <button class="btn btn-outline-danger" data-bs-boundary="viewport">Close Theater</button>
                              </div>
                          </div>
                            
                            <hr>
                            
                            <div>
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
                            <h2>Tickets</h2>
                            <form action="<?= base_url('CRUD/updateTicket/').$movie['movieId'].'/'.$theater;?>" method="post">
                              <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th class="text-muted">No</th>                           
                                      <th>NIK</th>
                                      <th>Name</th>
                                      <th>Section</th>
                                      <th>Position</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                      <?php $no = 1 ;?> 
                                      <?php foreach ($ticketIds as $ticketId) :?>
                                        <tr id="<?= $ticketId['ticketId'];?>">
                                          
                                          <?php if($ticketId['ticketStatus'] == 'Hadir'):?>
                                          <td><input class="form-check-input" type="checkbox" id="ticketId[]" name="ticketId[]" value="<?= $ticketId['ticketId'];?>" checked></td>
                                          <?php else:?>
                                          <td><input class="form-check-input" type="checkbox" id="ticketId[]" name="ticketId[]" value="<?= $ticketId['ticketId'];?>"></td>
                                          <?php endif;?>
                                          <td><?= $no;?></td>
                                          <td><?= $ticketId['KAR_NIK']?></td>
                                          <td><?= $ticketId['KAR_NAME']?></td>
                                          <td><?= $ticketId['SEC_NAME']?></td>
                                          <td><?= $ticketId['JAB_NAME']?></td>
                                          <?php if($ticketId['ticketStatus'] == 'Terdaftar'):?>
                                          <td><span class="badge bg-warning me-1"></span> Terdaftar</td>
                                          <?php elseif($ticketId['ticketStatus'] == 'Hadir'): ?>
                                          <td><span class="badge bg-success me-1"></span> Hadir</td>
                                          <?php endif;?>
                                        </tr>
                                      <?php $no++;?>
                                      <?php endforeach;?>
                                    </tbody>
                                    
                                </table>
                                <div class="card-footer form-group d-flex justify-content-center py-3">
                                        <button name="update_multiTicketId" class="btn  btn-outline-primary">Update</button>
                                    </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>

