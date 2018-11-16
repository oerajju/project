<?php if(!request()->ajax()):
 include(resource_path().'/views/header-minimal.php');
endif;?>
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
        <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
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
<?php if(!request()->ajax()):
 include(resource_path().'/views/footer-minimal.php');
endif;?>