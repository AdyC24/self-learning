<?php
foreach ($movies as $movie) : ?>
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
<?php endforeach; ?>