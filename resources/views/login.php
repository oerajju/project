<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo url('assets/bootstrap/dist/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo url('assets/font-awesome/css/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo url('assets/Ionicons/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo url('css/AdminLTE.min.css');?>">
  <link rel="stylesheet" href="<?php echo url('css/stylelogin.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo url('plugins/iCheck/square/blue.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  .login-page{
    background-image: radial-gradient(circle,#2e5994,#0b1829);
    overflow: hidden;
    display: block !important;
  }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="css-table-cell" id="io-ox-login-header">
                <h1 class="clear-title" align="left">
                    <span id="io-ox-login-header-prefix">
                        <img src="<?php echo url('img/tmlogo.png');?>" width="82" height="82"> </span>
                    <span id="io-ox-login-header-prefix">NMVF </span>
                    <span id="io-ox-login-header-label">MIS</span>
                </h1>
            </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post" id="loginForm" onsubmit="login(event)">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>-->
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo url('assets/jquery/dist/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo url('assets/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo url('plugins/iCheck/icheck.min.js');?>"></script>
<script src="<?php echo url('js/scripts.js');?>"></script>
<script src="<?php echo url('js/jquery.toast.min.js');?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>
    function login(e) {
        e.preventDefault();
        if ($('#username').val() == '' || $('#password').val() == '') {
            //toast({status: "0", title: "error", text: 'Username & password are both required'});
            console.log('error');
            return false;
        } else {
            var url = '<?php echo url("auth/login");?>';
            var data = $('#loginForm').serialize();
            var xhr = submitFormAjax(url, data);
            xhr.done(function (resp) {
               // toast(resp);
                window.location.href = '<?php echo url('/'); ?>';
            }).fail(function (reason) {
                var resp = reason.responseJSON;
                //toast(resp);
            });
        }

    }
</script>
</body>
</html>