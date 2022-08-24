

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Theaters
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
                      <div class="text-muted">
                        Show
                        <div class="mx-2 d-inline-block">
                          <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                        </div>
                        entries
                      </div>
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
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTheater">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Add Theater
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th class="w-1">Theater Id</th>
                          <th>Movie Title</th>
                          <th>Competence</th>
                          <th>Date/ Time</th>
                          <th>Location</th>
                          <th>Created By</th>
                          <th>Registered</th>
                          <th>Status</th>
                          <th>Action</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($theaters as $theater):?>
                          <tr>
                            <td><span class="text-muted"><?= $theater['theaterId'];?></span></td>
                            <td><a href="#" class="text-reset" tabindex="-1"><?= $theater['movieName'];?></a></td>
                            <td><a href="#" class="text-reset" tabindex="-1">Communication</a></td>
                            <td><?= $theater['theaterTime'];?></td>
                            <td><?= $theater['theaterLocation'];?></td>
                            <td><?= $theater['KAR_NAME'];?></td>
                            <td>15/20 tickets</td>
                            <td><span class="badge bg-success me-1"></span> Open</td>
                            <td class="text-end">
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
                            </td>
                          </tr>
                        <?php endforeach;?>
                        
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

        <div class="modal fade" id="addTheater" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hiddem="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Theater</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="<?= base_url('CRUD/insertTheater');?>" method="post">
                <div class="modal-body">
                    <fieldset class="form-fieldset">
                      <div class="mb-3">
                        <label class="form-label required">Movie Title</label>
                        <select type="text" class="form-select" id="movie" name="movie">
                          <?php foreach($movies as $movie) :?>
                          <option value="<?= $movie['movieId'];?>"><?= $movie['movieName'];?> / <?= $movie['competenceName'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label required" >Date</label>
                        <input type="datetime-local" class="form-control" id="datetime" name="datetime"/>
                      </div>

                      <div class="mb-3">
                        <label class="form-label required">Location</label>
                        <input type="text" class="form-control" placeholder="Set theater's location" id="location" name="location">
                      </div>

                      <div class="mb-3">
                        <label class="form-label required">Created By</label>
                        <select type="text" class="form-select" id="select-tags" id="createdBy" name="createdBy">
                          <?php foreach($PICs as $PIC) : ?>
                          <option value="<?= $PIC['KAR_ID'];?>"><?= $PIC['KAR_NAME'];?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </fieldset>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        