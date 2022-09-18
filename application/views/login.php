<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/css/roboto.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url() ?>assets/fonts/icomoon/style.css">    
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="<?=base_url() ?>assets/css/style.css">
    <title>SIPAS</title>
  </head>
  <body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?=base_url() ?>assets/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">Masukkan Username & Password</p>
            </div>
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username">
              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">                
              </div>              
              <input type="submit" value="Log In" class="btn btn-block btn-primary btn-login">
            </div>
          </div>          
        </div>        
      </div>
    </div>
  </div>
    <script src="<?=base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url() ?>assets/js/main.js"></script>
    <script src="<?=base_url() ?>assets/package/dist/sweetalert2.all.min.js"></script>
    <script>
      $(document).ready(function() {
        $(".btn-login").click( function() {
          var username = $("#username").val();
          var password = $("#password").val();
          if(username.length == "" && password.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Login Gagal',
              text: 'Username & Password Wajib Diisi !'
            });
          } else if(username.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Login Gagal',
              text: 'Username Wajib Diisi !'
            });
          } else if(password.length == "") {
            Swal.fire({
              type: 'warning',
              title: 'Login Gagal',
              text: 'Password Wajib Diisi !'
            });
          } else {
            $.ajax({
              url: "<?= base_url()?>auth/proses_login",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },
              success:function(response){
                if (response == "Berhasil") {
                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    toast: true,
                    text: "Mohon Tunggu",
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>dashboard";
                  });
                } else {
                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'Username Atau Password Salah!'
                  });
                }
                console.log(response);
              },
              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });
                  console.log(response);
              }
            });
          }
        }); 
      });
    </script>
  </body>
</html>