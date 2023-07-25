
    <!-- page-wrapper Start-->
    <section>         
      <div class="container-fluid p-0">
        <div class="row">
          
          <div class="col-12">
            <div class="login-card">

              <form class="theme-form login-form" method="post" action="<?=base_url('login')?>">
                <img src="<?=base_url('assets/rs/img/AAIS_Logo_full.png')?>" class="img-fluid">
                <h4>Login</h4>
                <h6>Welcome back! Log in to your account.</h6>
                <div class="form-group">
                  <label>Email Address / Username</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather="user"></i></span>
                    <input class="form-control" name="login[uname]" type="text" required="" placeholder="human@gmail.com / duxi">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather="lock"></i></span>
                    <input class="form-control" type="password" name="login[pass]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show">                         </span></div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox">
                    <label for="checkbox1">Remember password</label>
                  </div><a class="link" href="forget-password.html">Forgot password?</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </div>
                <p>Don't have account?<a class="ms-2" href="<?=base_url('register')?>">Create Account</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->