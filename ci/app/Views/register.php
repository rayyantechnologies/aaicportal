
    <!-- page-wrapper Start-->
    <section>
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <div class="login-card">
              <form class="theme-form login-form" method="post" action="<?=base_url('register')?>">
                <img src="<?=base_url('assets/rs/img/AAIS_Logo_full.png')?>" class="img-fluid">
                <h4>Register</h4>
                <h6>Welcome! Make sure you have a valid access code from the admin.</h6>
                <div class="form-group">
                  <label>Full Name</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather=""></i></span>
                    <input class="form-control" name="reg[name]" type="text" required="" placeholder="Adesola Hadiza">
                  </div>
                </div>
                <div class="form-group">
                  <label>Subjects</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather=""></i></span>

                    <select class="form-control" name="subject[]" multiple="" required id="">
                        <option value="">Select a Subject</option>
                        <?php foreach ($subjects as $subj) : ?>
                        <option class="text-uppercase" value="<?=$subj?>"><?=$subj?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Access Code</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather=""></i></span>
                    <input class="form-control" name="reg[access]" type="text" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather=""></i></span>
                    <input class="form-control" name="reg[email]" type="email" required="" placeholder="human@gmail.com">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group"><span class="input-group-text"><i data-feather="lock"></i></span>
                    <input class="form-control" type="password" name="reg[pass]" required="" placeholder="*********">
                    <div class="show-hide"><span class="show">                         </span></div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                </div>
                <p>Already have an account?<a class="ms-2" href="<?=base_url('login')?>">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page-wrapper end-->