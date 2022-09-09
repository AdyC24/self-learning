<div class="wrapper">
      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header">
            <div class="d-flex justify-content-between">
            <div class="d-flex">
              <div>
                <img class="" style="width:175px; border-radius:50%;" src="https://sld.bumalati.com/assets/img/<?= $subordinate['KAR_PHOTO']?>" alt="<?= $subordinate['KAR_PHOTO']?>">
              </div>
              <div class="px-4">
                <div class="pt-4 pb-3">
                  <h2 style="margin-bottom:-2px"><?= $subordinate['KAR_NAME']?></h2>
                </div>
               
                <div>
                  <span><strong>NIK : </strong><?= $subordinate['KAR_NIK']?></span><br>
                  <span><strong>Position : </strong><?= $subordinate['JAB_NAME']?></span><br>
                  <span><strong>Section : </strong><?= $subordinate['SEC_NAME']?></span><br>
                  <?php if($direct['KAR_NAME'] == '') : ?>
                    <span><strong>Direct : </strong> - </span>
                  <?php else : ?>
                    <span><strong>Direct : </strong><?=$direct['KAR_NAME'];?></span>
                  <?php endif ; ?>
                </div>
              </div>
            </div>
            <div class="mx-4">
              <?php if($subordinate['employeeStatus'] == 'Ya') :?>
                <p class="bg-yellow px-3 py-2 rounded"> Active </p>
              <?php else :?>
                <p class="bg-danger px-3 py-2 rounded"> Inactive </p>
              <?php endif;?>
            </div>
            </div>
           <hr>
            <div class="d-flex justify-content-evenly">
              <div>
                <div class="d-flex justify-content-around">
                  <div>
                    <h1><?= $subticketCount;?></h1>
                  </div>
                </div>
                <div>
                  <h3><a href="<?= base_url('Page/movie/').$subordinate['employeeId'];?>">Self Learnings</a></h3>
                </div>
              </div>
              <div>
                <div class="d-flex justify-content-around">
                  <div>
                    <h1>0</h1>
                  </div>
                </div>
                <div>
                  <h3>Special Tasks</h3>
                </div>
              </div>
              <div>
                <div class="d-flex justify-content-around">
                  <div>
                    <h1>0/<?= $competenceCount;?></h1>
                  </div>
                </div>
                <div>
                  <h3>Observations</h3>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <div class="page-body">
            <div class="col-12">
              <div class="card" id="showCard">
              
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-dots" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M3 3v18h18"></path>
                          <circle cx="9" cy="9" r="2"></circle>
                          <circle cx="19" cy="7" r="2"></circle>
                          <circle cx="14" cy="15" r="2"></circle>
                          <line x1="10.16" y1="10.62" x2="12.5" y2="13.5"></line>
                          <path d="M15.088 13.328l2.837 -4.586"></path>
                        </svg>
                        Development Plans
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="tickets">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-movie" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                          <line x1="8" y1="4" x2="8" y2="20"></line>
                          <line x1="16" y1="4" x2="16" y2="20"></line>
                          <line x1="4" y1="8" x2="8" y2="8"></line>
                          <line x1="4" y1="16" x2="8" y2="16"></line>
                          <line x1="4" y1="12" x2="20" y2="12"></line>
                          <line x1="16" y1="8" x2="20" y2="8"></line>
                          <line x1="16" y1="16" x2="20" y2="16"></line>
                        </svg>
                      Tickets
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                      Special Tasks
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                        </svg>
                      Observation
                      </a>
                    </li>
                   
                  </ul>
                </div>
                <?php if($subordinate['employeeStatus'] == 'Ya') :?>
                <div class="card-body">
                  <?php if($role == 'hr'):?>
                  <div class="mb-2  px-3 d-flex flex-row-reverse">
                    <a href="<?= base_url('Page/employee');?>" class="btn btn-primary">Edit Development Plan</a>
                  </div>
                  <?php endif;?>
                  
                  <ol class="list-group list-group-numbered">
                    <?php foreach($competences as $competence) :?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold"><?= $competence['competenceName'];?></div>
                        <?= $competence['competenceDescription'];?>
                      </div>
                    </li>
                    <?php endforeach;?>
                  
                  </ol>
                </div>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>

<!-- Javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#tickets').click(function(){
      $.ajax({
        url : '<?= base_url('Ajax/ticketOnSubordinate/').$subordinate['KAR_ID']?>',
        type : 'POST',
        success : function(result){
          $('#showCard').html(result)
        }
      })
    })
  })
</script>