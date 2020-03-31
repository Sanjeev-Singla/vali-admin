<section class="login-content">
  <div class="logo">
    <h1>Reset Password</h1>
  </div>
  <div class="login-box">
    <form class="login-form" action="<?= base_url('reset-password');?>" method="POST">
      <h3 class="login-head"><i class="fa fa-unlock fa-lg fa-fw"></i>Reset Password</h3>
      <div class="form-group">
        <label class="control-label">New Password</label>
        <input class="form-control" name="password" type="password" placeholder="New Password" required>
        <?= form_error('password');?>
      </div>
      <div class="form-group">
        <label class="control-label">Confirm Password</label>
        <input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password" required>
        <?= form_error('confirm_password');?>
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Reset</button>
      </div>
      <div class="form-group">
        <p class="semibold-text mb-0" style="float: left;margin-top: 5%;"><a href="<?= base_url('login')?>"><i class="fa fa-angle-left fa-fw"></i>Back to Login</a></p>
      </div>
    </form>
  </div>
</section>