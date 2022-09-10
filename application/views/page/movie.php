
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
                  Movies 
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="input-icon">
                      <?php if($id = ''):?>
                      <input type="text" id="movieSearch" class="form-control" placeholder="Search…">
                      <?php else:?>
                        <input type="text" id="movieSearchById" class="form-control" placeholder="Search…">
                      <?php endif;?>
                      <span class="input-icon-addon">
                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                      </span>
                    </div>
                  </div>
                  <?php if($role == 'hr'){
                    echo '<button href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMovie">';
                    echo '<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>';
                    echo 'Add movie';
                    echo '</button>';
                  };?>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards" id="movieShow">
              <?php if($this->uri->segment('3') == ''):?>
                <!-- pasang looping dari table movie-->
                <?php foreach($movies as $movie){?>
                <div class="col-sm-6 col-lg-4 mb-4">
                  <div class="card card-sm">
                    <a href="<?= base_url('Page/movieDetail/').$movie['movieId']?>" class="d-block"><img src="<?=base_url('assets');?>/dist/img/<?= $movie['moviePicture'];?>" class="card-img-top"></a>
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div>
                          <?php if($movie['movieActive'] != 'Tidak'){?>
                            <span class="badge bg-yellow">Active</span>
                            <div><?= $movie['movieName'];?> (<?= $movie['movieYear'];?>)</div>
                            <span class="text-muted"><?= $movie['competenceName'] ;?></span>
                          <?php } else {?>
                            <span class="badge bg-red">Inactive</span>
                            <div><?= $movie['movieName'];?> (<?= $movie['movieYear'];?>)</div>
                            <span class="text-muted"><?= $movie['competenceName'] ;?></span>
                          <?php };?>
                        </div>
                        <div class="ms-auto">
                          <a href="#" class="text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                            <?= $movie['movieCount'];?>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php };?>
              <?php else:?>
                <!-- pasang looping dari table movie-->
                <?php foreach($moviesById as $movie){?>
                <div class="col-sm-6 col-lg-4 mb-4">
                  <div class="card card-sm">
                    <a href="<?= base_url('Page/movieDetail/').$movie['movieId'].'/'.$this->uri->segment('3');?>" class="d-block"><img src="<?=base_url('assets');?>/dist/img/<?= $movie['moviePicture'];?>" class="card-img-top"></a>
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div>
                          <?php if($movie['movieActive'] != 'Tidak'){?>
                            <span class="badge bg-yellow">Active</span>
                            <div><?= $movie['movieName'];?> (<?= $movie['movieYear'];?>)</div>
                            <span class="text-muted"><?= $movie['competenceName'] ;?></span>
                          <?php } else {?>
                            <span class="badge bg-red">Inactive</span>
                            <div><?= $movie['movieName'];?> (<?= $movie['movieYear'];?>)</div>
                            <span class="text-muted"><?= $movie['competenceName'] ;?></span>
                          <?php };?>
                        </div>
                        <div class="ms-auto">
                          <a href="#" class="text-muted">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                            <?= $movie['movieCount'];?>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php };?>
              <?php endif;?>


              

            </div>
    
          </div>
        </div>

<!-- Modal -->
  <!-- Add Theater Modal -->
        <div class="modal fade" id="addMovie" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hiddem="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Movie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('CRUD/insertMovie');?>" method="post">
                <div class="modal-body">
                    <fieldset class="form-fieldset">
                      <div class="mb-3">
                        <label class="form-label required">Movie Title</label>
                        <input type="text" class="form-control" placeholder="Set movie's title" id="movieName" name="movieName" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Competency Name</label>
                        <select type="text" class="form-select" id="select-tags" id="competencyId" name="competencyId"> 
                          <option value=""></option>
                          <?php foreach($competences as $competence) : ?>
                          <option value="<?= $competence['competenceId'];?>"><?= $competence['competenceName'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Genre</label>
                        <select type="text" class="form-select" id="select-tags" id="genreId" name="genreId">
                          <option value=""></option>
                          <?php foreach($genres as $genre) : ?>
                          <option value="<?= $genre['genreId'];?>"><?= $genre['genreName'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">IMDb Rank</label>
                        <input type="text" class="form-control" placeholder="eg. 7.3 (use . as comma)" id="IMDbRank" name="IMDbRank">
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Duration</label>
                        <input type="text" class="form-control" placeholder="eg. 2j 14m" id="movieDuration" name="movieDuration">
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Publish Year</label>
                        <input type="text" class="form-control" placeholder="eg. 2010" id="movieYear" name="movieYear">
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Language</label>
                        <input type="text" class="form-control" placeholder="eg. Bahasa Inggris" id="movieLanguage" name="movieLanguage">
                      </div>
                      <div class="mb-3">
                        <label class="form-label required">Synopsis</label>
                        <textarea class="form-control" aria-label="Synopsis" id="movieSynopsis" name="movieSynopsis"></textarea>
                      </div>
                    </fieldset>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>

<!-- Javascript -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#movieSearch').keyup(function(){
        $.ajax({
          url: '<?= base_url('Ajax/movieSearch');?>',
          type: 'POST',
          data: {
            search: $(this).val()
          },
          success: function(data){
            $('#movieShow').html(data)
          } 
        })
      })
      $('#movieSearchById').keyup(function(){
        $.ajax({
          url: '<?= base_url('Ajax/movieSearchById/').$this->uri->segment('3');?>',
          type: 'POST',
          data: {
            search: $(this).val()
          },
          success: function(data){
            $('#movieShow').html(data)
          } 
        })
      })
    });  
  </script>
        