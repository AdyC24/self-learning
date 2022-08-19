
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
                        <div class="col-3" style="padding-left: 16px;">
                            <img src="<?=base_url('assets');?>/dist/img/<?= $movie['moviePicture'];?>" alt="<?= $movie['movieName'];?>">
                        </div>
                        <div class="col-9 px-4">
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
                                <p><strong>IMDb Rating : </strong><?= $movie['movieRank'];?></p>
                                <p><strong>Language : </strong><?= $movie['movieLanguage'];?></p>
                                <p><strong>Competence : </strong><?= $movie['competenceName'];?></p>
                                <p><strong>Watches : </strong><?= $movie['movieCount'];?></p>
                                <p><strong>Likes : </strong><?= $movie['movieLikes'];?></p>                  
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

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
