<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?= $title;?> - SLD</title>
    <!-- CSS files -->
    <link href="<?= base_url('assets');?>/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>/dist/css/demo.min.css" rel="stylesheet"/>

    <link href="<?= base_url('assets');?>/dist/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
    <script src="<?= base_url('assets');?>/dist/js/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets');?>/dist/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url('assets');?>/dist/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets');?>/dist/js/dataTables.bootstrap5.min.js"></script>
  </head>
  <body >

  
  <div class="wrapper">
      <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="<?= base_url('Page/home');?>">
              <img src="<?= base_url('assets');?>/dist/img/logo.jpeg" width="110" height="32" alt="Tabler" class="navbar-brand-image rounded">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
            </a>
            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
            </a>
            <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                <span class="badge bg-red"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card" >
                  <div class="card-body" id="showNotification">
                    <?php foreach($notifications as $notification):?>
                      <?php if($notification['notificationRead'] == 'Tidak'):?>
                        <span class="badge bg-red">Unread</span> 
                        <?php endif;?>
                      <a href="#" data-role="notification" data-id="<?= $notification['notificationId'];?>" class="mb-3 text-reset">
                        <p><?= $notification['notificationText'];?></p>       
                      </a>
                    <?php endforeach;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div><?=$name;?></div>
                  <div class="mt-1 small text-muted"><?=$position;?></div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item disabled">Change Password</a>
                <a href="<?=base_url('Auth/logout');?>" class="dropdown-item">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </header>

<!-- javascript -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','a[data-role=notification]',function(){
      var id = $(this).data('id')

      $.ajax({
        url : '<?= base_url('Ajax/updateNotification');?>',
        type : 'POST',
        data : {
          id : id
        },
        success : function(result){
          $('#showNotification').html(result)
        }
      })
    })
  })
</script>