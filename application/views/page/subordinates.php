
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
                <h2 class="page-title">
                  Subordinates List
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-sm-5 col-md-auto ms-auto d-print-none">
                <div class="d-flex">
                  <input id="subordinateSearch" type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user…"/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards" id="subordinateShow">
               <?php foreach($subordinates as $subordinate){?>
              <div class="col-md-6 col-lg-3">
                <div class="card">
                  <div class="card-body p-4 text-center">
                    <span class="avatar avatar-xl mb-3 avatar-rounded" style="background-image: url(https://sld.bumalati.com/assets/img/<?= $this->session->userdata('photo')?>)"></span>
                    <h3 class="m-0 mb-1"><a href="<?= base_url('Page/subordinate/').$subordinate['KAR_NIK'];?>"><?= $subordinate['KAR_NAME'];?></a></h3>
                    <div class="text-muted"><?= $subordinate['JAB_NAME'];?></div>
                    <div class="mt-3">
                        <?php if($subordinate['employeeStatus'] !== 'Ya'){?>
                            <span class="badge bg-danger-lt">Not Active</span>
                        <?php } else {?>
                            <span class="badge bg-success-lt">Active</span>
                        <?php };?>
                    </div>
                  </div>
                  <div class="d-flex">
                    <a href="<?= base_url('Page/theater');?>" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
                      Self Learning</a>
                    <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                      Special Task</a>
                  </div>
                  <div>
                    <a href="#" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="2"></circle>
                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                    </svg>
                    Observation</a>
                  </div>
                </div>
              </div>
              <?php };?>            
            </div>
            
          </div>
        </div>

<!-- Javascript -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#subordinateSearch').keyup(function(){
        $.ajax({
          url: '<?= base_url('Ajax/subordinateSearch');?>',
          type: 'POST',
          data: {
            search: $(this).val()
          },
          success: function(data){
            $('#subordinateShow').html(data)
          } 
        })
      })
    });  
  </script>