
    <div class="wrapper">
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Competences
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="card-body">
                <div class="accordion" id="accordion-example">
                    
                    <?php $no = 1;?>
                    <?php foreach($competences as $competence):?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?=$no;?>">
                      <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $no;?>" aria-expanded="false">
                      <?= $no;?> . <?= $competence['competenceName'];?>
                      </button>
                    </h2>
                    <div id="collapse-<?= $no;?>" class="accordion-collapse collapse show" data-bs-parent="#accordion-example">
                      <div class="accordion-body pt-0">
                          <p><?= $competence['competenceDescription'];?></p>
                      </div>
                    </div>
                  </div>
                    <?php 
                        $no++;
                        endforeach; ?>


                </div>
              </div>
            </div>
          </div>
        </div>
