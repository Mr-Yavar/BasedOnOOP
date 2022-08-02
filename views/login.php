<div class="container-fluid">
            <div class="row no-gutter">
              <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
              <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-9 col-lg-8 mx-auto">
                        <h3 class="login-heading mb-4">Login</h3>
                        <form action="./login.php" method="POST">
                        <div class="form-label-group">
                        <input type="text" id="inputusername" class="form-control" placeholder="Username" name="username" value="<?= getValue("username"); ?>" required autofocus>
                        <label for="inputusername">Username</label>
                       </div>
                       <input type="hidden"  name="RCT" value="<?= \App\Helper\FormProtector::GetToken(); ?>" >
                          <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                          </div>
                          <div class="form-label-group" >
                      
                      <input type="text" id="inputcaptcha" class="form-control" style="float:left;width:70%;" name="Captcha"  placeholder="Captcha" required>
                      <?= \App\Helper\FormProtector::GetCaptcha(); ?>
                     
                      <label id="labelcap" for="inputcaptcha" >Captcha</label>
                      <br/>    <br/>
                      </div>
                    
                          <div class="custom-control custom-checkbox mb-3">
                         
                            <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                          </div>
                          <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                          <div class="text-center">
                            <a class="small" href="#">Forgot password?</a></div>
                            <div class="text-center">
                            <a class="small" href="SignUp.php">I don't have account!</a></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>