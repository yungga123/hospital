<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="javascript:void(0)"><b>Welcome to Hospital</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Please sign in to start your session</p>

        <?= form_open('LoginPageController/validate_user',["id" => "form-login"]) ?>
          <div class="input-group mb-3">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-alt"></span>
              </div>
            </div>
          </div>
      
          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add-account">
                <i class="fas fa-user-plus"></i> Add Account
              </button>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-success btn-block"><i class="fas fa-check"></i> Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        <?= form_close() ?>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  
  
  <!-- Modal -->
  <div class="modal fade" id="add-account" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <?= form_open("LoginPageController/register_user",["id" => "form-register"]) ?>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="model_username" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="small_username" class="text-muted"></small>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="model_password" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="small_password" class="text-muted"></small>
          </div>

          <div class="form-group">
            <label for="confirm_pw">Confirm Password</label>
            <input type="password" name="confirm_pw" id="model_confirm_pw" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="small_confirm_pw" class="text-muted"></small>
          </div>

          <div class="form-group">
            <label for="personnel_id">Personnel ID</label>
            <input type="text" name="personnel_id" id="model_personnel_id" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="small_personnel_id" class="text-muted"></small>
          </div>

          <div class="form-group">
            <label for="class">Class</label>
            <input type="text" name="class" id="model_class" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="small_class" class="text-muted"></small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="<?= base_url('assets') ?>/plugins/toastr/toastr.min.js"></script>

  <script>
    $(document).ready(function(){

      $('#form-login').submit(function(e){
        e.preventDefault();
        var me = $(this);
        $.ajax({
          url: me.attr('action'),
          type: 'post',
          data: me.serialize(),
          dataType: 'json',
          success: function(response) {
            if (response.success == true) {
              toastr.success("Logged in");
              $('#username').removeClass("is-invalid");
              $('#password').removeClass("is-invalid");

              setTimeout(() => {
                window.location = ("<?= site_url("dashboard") ?>")
              }, 1500);
              

            } else {
              $('#username').removeClass("is-invalid");
              $('#password').removeClass("is-invalid");
              $.each(response.messages,function(key,value){
                if (value != ''){
                  $('#'+key).addClass("is-invalid");
                  toastr.error(value);
                } else {
                  $('#'+key).addClass("is-valid");
                }
              });
            } 

          }
        });
      });

      $('#form-register').submit(function(e){
        e.preventDefault();
        var me = $(this);
        $.ajax({
          url: me.attr('action'),
          type: 'post',
          data: me.serialize(),
          dataType: 'json',
          success: function(response) {
            if (response.success == true) {
              toastr.success("Successfully Added!");

              $('#model_username').removeClass("is-invalid").addClass('is-valid');
              $('#model_password').removeClass("is-invalid").addClass('is-valid');
              $('#model_confirm_pw').removeClass("is-invalid").addClass('is-valid');
              $('#model_personnel_id').removeClass("is-invalid").addClass('is-valid');
              $('#model_class').removeClass("is-invalid").addClass('is-valid');

              $('#small_username').html('');
              $('#small_password').html('');
              $('#small_confirm_pw').html('');
              $('#small_personnel_id').html('');
              $('#small_class').html('');

              me[0].reset();


            } else {
              $('#model_username').removeClass("is-invalid").addClass('is-valid');
              $('#model_password').removeClass("is-invalid").addClass('is-valid');
              $('#model_confirm_pw').removeClass("is-invalid").addClass('is-valid');
              $('#model_personnel_id').removeClass("is-invalid").addClass('is-valid');
              $('#model_class').removeClass("is-invalid").addClass('is-valid');

              $('#small_username').html('');
              $('#small_password').html('');
              $('#small_confirm_pw').html('');
              $('#small_personnel_id').html('');
              $('#small_class').html('');

              $.each(response.messages,function(key,value){
                if (value != ''){
                  $('#model_'+key).addClass("is-invalid");
                  $('#small_'+key).html(value);
                }
              });
            } 

          }
        });
      });
		 	
    });
      
  </script>
</body>
</html>
