<div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link" href="#" id="developmentPlan">
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
                    <li class="nav-item" id="specialTask">
                      <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                      Special Tasks
                      </a>
                    </li>
                    <li class="nav-item" id="observation">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                        </svg>
                      Observation
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hierarchy-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <circle cx="12" cy="5" r="2"></circle>
                          <circle cx="8" cy="12" r="2"></circle>
                          <circle cx="12" cy="19" r="2"></circle>
                          <circle cx="20" cy="19" r="2"></circle>
                          <circle cx="4" cy="19" r="2"></circle>
                          <circle cx="16" cy="12" r="2"></circle>
                          <path d="M5 17l2 -3"></path>
                          <path d="M9 10l2 -3"></path>
                          <path d="M13 7l2 3"></path>
                          <path d="M17 14l2 3"></path>
                          <path d="M15 14l-2 3"></path>
                          <path d="M9 14l2 3"></path>
                        </svg>
                      Subordinates
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                <?php if($role == 'hr'):?>
                  <div class="mb-2  px-3 d-flex flex-row-reverse">
                    <button href="#" class="btn btn-primary">Add Relation</button>
                  </div>
                  <?php endif;?>
                    <div class="col-12 table-responsive">
                        <table id="employees" class="table card-table table-vcenter text-nowrap datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Self Learning</th>
                                    <th>Special Task</th>
                                    <th>Observations</th>
                                    <?php if($role == 'hr'):?>
                                    <th class="text-center">Action</th>
                                    <?php endif;?>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;?>
                            <?php foreach($subordinates as $subordinate):?>
                                <tr id="<?= $subordinate['KAR_ID'];?>">
                                    <td></td>
                                    <td><?= $no;?></td>
                                    <td><?= $subordinate['KAR_NIK'];?></td>
                                    <td><a href="<?= base_url('Page/subordinate/').$subordinate['KAR_ID'].'/'.$subordinate['employeeId'];?>"  class="text-reset"><?= $subordinate['KAR_NAME'];?></a></td>
                                    <td><?= $subordinate['employeeTicketWatches'] / $subordinate['employeeTicketCount'] * 100?>%</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <?php if($role == 'hr'):?>
                                    <td class="text-center"><a href="#" class="btn btn-outline-danger align-text-top" data-bs-boundary="viewport">Delete</a></td>
                                    <?php endif;?>
                                    <td></td>
                                </tr>
                            <?php $no++;?>
                            <?php endforeach;?>
                            
                            </tbody>  
                        </table> 
                    </div>

                    
<!-- Javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#developmentPlan').click(function(){
      $.ajax({
        url : '<?= base_url('Ajax/developmentPlan/').$id?>',
        type : 'POST',
        success : function(result){
          $('#showCard').html(result)
        }
      })
    })
    $('#tickets').click(function(){
        $.ajax({
            url : '<?= base_url('Ajax/ticketOnSubordinate/').$id?>',
            type : 'POST',
            success : function(result){
                $('#showCard').html(result)
            }
        })
    })
  })
</script>