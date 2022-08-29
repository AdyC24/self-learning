

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Tickets
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-12">
                <div class="card">
                  <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                      <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                          <div class="me-3">
                            <div class="input-icon">
                              <input type="text" class="form-control" placeholder="Search…">
                              <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th class="w-1">No</th>
                          <th>Subordinate Name</th>
                          <th>Movie Title</th>
                          <th>Competence</th>
                          <th>Date/ Time</th>
                          <th>Location</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php $no = 1;?>
                      <?php foreach($tickets as $ticket) :?>
                        <tr>
                          <td><span class="text-muted"><?= $no;?></span></td>
                          <td><a href="#" class="text-reset" tabindex="-1"><?= $ticket['KAR_NAME'];?></a></td>
                          <td><a href="#" class="text-reset" tabindex="-1"><?= $ticket['movieName'];?></a></td>
                          <td><a href="#" class="text-reset" tabindex="-1"><?= $ticket['competenceName'];?></a></td>
                          <td><?= $ticket['theaterTime'];?></td>
                          <td><?= $ticket['theaterLocation'];?></td>
                          <td><span class="badge bg-warning me-1"></span> <?= $ticket['ticketStatus'];?></td>
                          <td class="text-end">
                            <span>
                              <a class="btn align-text-top" data-bs-boundary="viewport" data-role="delete" data-id="<?= $ticket['ticketId'];?>">Delete</a>  
                            </span>
                          </td>
                        </tr>
                      <?php $no++ ;?>
                      <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                    <ul class="pagination m-0 ms-auto">
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
            </div>
          </div>
        </div>

<!-- Modal -->
        <!-- Delete Ticket Modal -->
        <div class="modal fade" id="deleteTicket"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="BackdropLabel" aria-hiddem="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

            <form action="" method="post">
            <div class="modal-body"> 
                <input type="hidden" id="deleteTicketId">
                <p class="text-center">Are you sure delete this Ticket?</p>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" id="deleteTicketButton">Delete</button>
            </div>
            </form>
            </div>
          </div>
        </div>


<script type="text/javascript">
  $(document).ready(function(){
    // siapkan value di input field di modal delete
    $(document).on('click','a[data-role=delete]',function(){
      var id = $(this).data('id');

      // taruh value di id input theaterId id = 
      $('#deleteTicketId').val(id);
      $('#deleteTicket').modal('toggle');

      $('#deleteTicketButton').click(function(){

        var id = $('#deleteTicketId').val();

        $.ajax({
          url     : '<?= base_url('CRUD/deleteTicket');?>',
          method  : 'post',
          data    : {
            ticketId   : id
          },
          success : function(response){
            console.log(response);
          }
      })
      })
    })
  });
</script>