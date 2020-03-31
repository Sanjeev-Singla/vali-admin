<section class="login-content">
  <div class="logo">
    <h1>Regitration</h1>
  </div>
  <div style="width: 30%">
    <div class="tile">
      <div class="tile-body">
        <form method="POST" action="<?= base_url('register')?>">
          <h3 class="login-head" style="text-align: center;"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h3><hr>
          <div class="form-group">
            <label class="control-label">Name</label>
            <input class="form-control" type="text" name="name" value="<?= set_value('name')?>" placeholder="Enter full name" required>
            <?= form_error('name');?>
          </div>
          <div class="form-group">
            <label class="control-label">Phone</label>
            <input class="form-control" type="text" name="phone" value="<?= set_value('phone')?>" placeholder="Enter Phone Number" required>
            <?= form_error('phone');?>
          </div>
          <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="email" name="email" value="<?= set_value('email')?>" placeholder="Enter email address" required>
            <?= form_error('email');?>
          </div>
          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
            <?= form_error('password');?>
          </div>
          <div class="form-group">
            <label class="control-label">Confirm Password</label>
            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required>
            <?= form_error('confirm_password');?>
          </div>
          <div class="form-group">
            <label class="control-label">Gender</label>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" value="male" required>Male
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" value="female">Female
              </label>
            </div>
          </div>
          
          <div class="tile-footer">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
          </div>
        </form>
        <div class="form-group" style="text-align: center;margin-top: 20px;">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  Already Registered?<a href="<?= base_url('login')?>"> Sign In</a>
                </label>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

    