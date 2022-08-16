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
    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="<?= base_url('assets');?>/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets');?>./dist/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
        </div>
        
        <form class="card card-md" action="<?=base_url('Auth');?>" method="post" autocomplete="off">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <?php
            // Cek apakah terdapat session nama message
            if($this->session->flashdata('message')){ // Jika ada
                echo '<div class="alert alert-important alert-danger alert-dismissible" role="alert">'.$this->session->flashdata('message').'</div>'; // Tampilkan pesannya
            }
            ?> 
            <div class="mb-3">
              <label class="form-label required">NIK</label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="Enter NIK" onkeypress="return event.charCode >= 48 && event.charCode <=57">
              <?= form_error('nik', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            <div class="mb-2">
              <label class="form-label required">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control"  id="password" name="password" placeholder="Password"  autocomplete="off">
              </div>
              <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>

      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets');?>/dist/js/tabler.min.js"></script>
    <script src="<?= base_url('assets');?>/dist/js/demo.min.js"></script>
  </body>
</html>