
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
                                  <tr>
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
                                        <button class="btn align-text-top" data-bs-boundary="viewport">Register</button>
                                      </span>
                                    <?php };?>
                                    </td>
                                    <td><?= $theater['theaterTime'];?></td>
                                    <td><?= $theater['theaterLocation'];?></td>
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
