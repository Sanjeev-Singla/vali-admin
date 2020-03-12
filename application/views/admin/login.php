<section class="login-content">
  <div class="logo">
    <h1>Admin Login</h1>
  </div>
  <div class="login-box">
    <form class="login-form" action="<?= base_url('admin/login');?>" method="POST">
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
      <div class="form-group">
        <label class="control-label">USERNAME</label>
        <input class="form-control" name="username" type="text" value="<?= set_value('username')?>" placeholder="USERNAME" autofocus>
        <?= form_error('username');?>
      </div>
      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control" name="password" type="password" placeholder="PASSWORD">
        <?= form_error('password');?>
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
      </div>
  <!--Forgot Password-->
      <!-- <div class="form-group">
        <div class="utility">
          <div class="animated-checkbox">
            <label>
              <input type="checkbox"><span class="label-text">Stay Signed in</span>
            </label>
          </div>
          <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
        </div>
      </div> -->
    </form>
  </div>
</section>