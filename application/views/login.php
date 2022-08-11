<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="./assets/dist/css/tabler.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="./assets/dist/css/demo.min.css" rel="stylesheet"/>
  </head>
  <body  class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark"><img src="./assets/static/logo.svg" height="36" alt=""></a>
        </div>
        
        <form class="card card-md" action="." method="post" autocomplete="off" action=<?= base_url('Auth/home');?>>
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account </h2>
            <div class="mb-3">
              <label class="form-label">NIK</label>
              <input type="text" class="form-control" placeholder="Silahkan masukkan NIK Anda">
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
                <span class="form-label-description">
                  <a href="./forgot-password.html">I forgot password</a>
                </span>
              </label>
              <div class="input-group input-group-flat">
                <input type="password" class="form-control"  placeholder="Password"  autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-check">
                <input type="checkbox" class="form-check-input"/>
                <span class="form-check-label">Remember me on this device</span>
              </label>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </div>
          </div>
        </form>

        <div class="text-center text-muted mt-3">
          SLD ver2.0 by <a href="" tabindex="-1">Human Resources BUMA Lati</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./assets/dist/js/tabler.min.js"></script>
    <script src="./assets/dist/js/demo.min.js"></script>
  </body>
</html>