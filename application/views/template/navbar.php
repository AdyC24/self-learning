      <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar navbar-light">
            <div class="container-xl">
              <ul class="navbar-nav">
                <?php if($title == 'Home'){
                  echo '<li class="nav-item active">';
                } else {
                  echo '<li class="nav-item">';
                };?>
                  <a class="nav-link" href="<?= base_url('Page/home');?>" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <?php if($role == 'lvl345'){?>
                  <?php if($title == 'Subordinates' || $title == 'Subordinate Details'){
                    echo '<li class="nav-item active">';
                  } else {
                    echo '<li class="nav-item">';
                  };?>
                      <a class="nav-link" href="<?= base_url('Page/subordinates');?>" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-affiliate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275"></path>
                        <path d="M11.683 12.317l5.759 -5.759"></path>
                        <circle cx="5.5" cy="5.5" r="1.5"></circle>
                        <circle cx="18.5" cy="5.5" r="1.5"></circle>
                        <circle cx="18.5" cy="18.5" r="1.5"></circle>
                        <circle cx="8.5" cy="15.5" r="4.5"></circle>
                      </svg>    
                      </span>
                        <span class="nav-link-title">
                          Subordinates
                        </span>
                      </a>
                    </li>
                <?php };?>
                <?php if($title == 'Movies' || $title == 'Theaters' || $title == 'Movie Details' || $title == 'Tickets' || $title == 'Archive' || $title == 'Absence'): ?>
                  <li class="nav-item dropdown active">
                <?php else:?>
                  <li class="nav-item dropdown">
                <?php endif;?>
           
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" /><line x1="12" y1="12" x2="20" y2="7.5" /><line x1="12" y1="12" x2="12" y2="21" /><line x1="12" y1="12" x2="4" y2="7.5" /><line x1="16" y1="5.25" x2="8" y2="9.75" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Self Learning
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="<?= base_url('Page/movie');?>" >
                          Movies List 
                        </a>
                        <a class="dropdown-item" href="<?=base_url('Page/theater');?>" >
                          Theater Schedules
                        </a>
                        <?php if($role != 'lvl345'){ ?>
                          <?php if($role != 'lvl12') { ?>
                            
                            <a class="dropdown-item" href="#" >
                              Quiz
                            </a>
                            <a class="dropdown-item" href="<?= base_url('Page/absence');?>" >
                              Absence
                            </a>
                          <?php };?>
                        <?php };?>
                        <?php if($role != 'hr'){?>
                          <a class="dropdown-item" href="<?= base_url('Page/ticket');?>" >
                            Tickets
                          </a>
                        <?php };?>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 11 12 14 20 6" /><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Special Task
                    </span>
                  </a>
                </li>

                <?php if($title == 'Observation'):?>
                  <li class="nav-item active">
                <?php else:?>
                  <li class="nav-item">
                <?php endif;?>
                  <a class="nav-link" href="<?= base_url('Page/observation');?>" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="2"></circle>
                    <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                    </svg> 
                    </span>
                    <span class="nav-link-title">
                      Observation
                    </span>
                  </a>
                </li>

                

                <?php if($role != 'lvl345'){?>
                  <?php if($role != 'lvl12') { ?>
                    <?php if($title == 'Employees'):?>
                      <li class="nav-item dropdown active">
                    <?php else :?>
                      <li class="nav-item dropdown">
                    <?php endif;?>
                  <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="5" rx="2" /><rect x="4" y="13" width="6" height="7" rx="2" /><rect x="14" y="4" width="6" height="7" rx="2" /><rect x="14" y="15" width="6" height="5" rx="2" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Settings
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="<?= base_url('Page/employee');?>" >
                          Employees
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                  <?php };?>
                <?php };?>
                
                
                <?php if($title == 'Competences'){
                  echo '<li class="nav-item active">';
                } else {
                  echo '<li class="nav-item">';
                }
                ?>
                <a class="nav-link" href="<?=base_url('Page/competences');?>" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Competences
                    </span>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link disabled" href="#" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="9" y1="9" x2="10" y2="9" /><line x1="9" y1="13" x2="15" y2="13" /><line x1="9" y1="17" x2="15" y2="17" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Documentation
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>