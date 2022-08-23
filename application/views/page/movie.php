
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Movies
                </h2>
                <div class="text-muted mt-1">1-3 of <?= count($movies);?> movies</div>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                  <div class="me-3">
                    <div class="input-icon">
                      <input type="text" id="movieSearch" class="form-control" placeholder="Search…">
                      <span class="input-icon-addon">
                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                      </span>
                    </div>
                  </div>
                  <a href="#" class="btn btn-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                    Add movie
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards" id="movieShow">
                <!-- pasang looping dari table movie-->
              <?php foreach($movies as $movie){?>
              <div class="col-sm-6 col-lg-4">
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
                          <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                          <?= $movie['movieCount'];?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php };?>

              

            </div>
            <div class="d-flex">
              <ul class="pagination ms-auto">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
                    prev
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

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

          });
          
        </script>
        