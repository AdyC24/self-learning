
    <div class="wrapper">
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
              <div class="page-pretitle">
                  Subordinates
                </div>
                <h2 class="page-title"><a href="">Movies</a> /  ()
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
                            <img src="" alt="">
                        </div>
                        <div class="col-lg-9 col-sm-12 px-4">
                          <div class="d-flex">
                            <div class="mt-3 col-6">
                                  <h1>
                                      
                                     
                                          <span class="badge bg-yellow">Active</span></h1>
                                      
                                          <span class="badge bg-red">Inactive</span>
                                      
                                  </h1>
                                  <span> . </span>
                                
                              </div>
                              
                              <div class="mt-3 col-6 d-flex justify-content-end">
                                  <span class="dropdown">
                                      <button class="btn" data-bs-boundary="viewport" data-bs-toggle="dropdown">
                                        Activation
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="">
                                          Active
                                        </a>
                                        <a class="dropdown-item" href="">
                                          Not Active
                                        </a>                                         
                                    </div>
                                  </span>
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
                            <h2>Theaters</h2>
                            <div class="table-responsive">

                              <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                  <tr>
                                    <?php if($role != 'lvl12'){
                                      echo '<th>Action</th>';
                                    } else{
                                      echo '<th></th>';
                                    };?>
                                    
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
                                              <a class="dropdown-item" href="#" data-role="edit" data-id="<?= $theater['theaterId'];?>">
                                                Edit
                                              </a>
                                              <a class="dropdown-item" href="#" data-role="delete" data-id="<?= $theater['theaterId'];?>">
                                                Delete
                                              </a>                                         
                                          </div>
                                        </span>
                                      <?php };?>
                                    <?php };?>
                                    <?php if($role != 'hr'):?>
                                      <?php if($role != 'lvl12'):?>
                                      <span>
                                        <a class="btn align-text-top" data-bs-boundary="viewport" data-role="register" data-id="<?= $theater['theaterId'];?>">Register</a>
                                      </span>
                                    <?php endif;?>
                                    <?php endif;?>
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
                                    <td><?= $theater['theaterTicketCount'];?>/20 tickets</td>
                                    <td> 
                                    <?php if($theater['theaterTicketCount'] <= 19){
                                      echo '<span class="badge bg-success me-1"></span> Open';
                                    }else {
                                      echo '<span class="badge bg-danger me-1"></span> Full';
                                    };?></td>
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
        </div>


       