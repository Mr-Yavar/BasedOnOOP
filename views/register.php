<div class="container-fluid">
        <div class="row no-gutter">
          <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
          <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
              <div class="container">
                <div class="row">
               
                  <div class="col-md-9 col-lg-8 mx-auto">
                    <h3 class="login-heading mb-4">Sign up</h3>
                    <form method="POST" avtion="">
                    <div class="form-label-group">
                        <input type="text" id="inputname" class="form-control" placeholder="Name" name="name" value="<?= getValue("name"); ?>" required autofocus>
                        <label for="inputname">Name</label>
                       </div>
                    <div class="form-label-group">
                        <input type="text" id="inputusername" class="form-control" placeholder="Username" name="username" value="<?= getValue("username"); ?>" required autofocus>
                        <label for="inputusername">Username</label>
                       </div>
                     
                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?= getValue("email"); ?>"  required autofocus>
                        <label for="inputEmail">Email address</label>
                      </div>
      
                      <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" value="<?= getValue("password"); ?>" required>
                        <label for="inputPassword">Password</label>
                      </div>
                      <div class="form-label-group">
                        <input type="password" id="inputConfirm" class="form-control" name="Cpassword" placeholder="Reapet your password" required>
                       
                        <label for="inputConfirm">Confirm Password</label>
                        <input type="hidden"  name="RCT" value="<?= \App\Helper\FormProtector::GetToken(); ?>" required>
                      </div>
                      <div class="form-label-group" >
                      <input type="text" id="inputcaptcha" class="form-control" style="float:left;width:70%;" name="Captcha"  placeholder="Captcha" required>
                      <?= \App\Helper\FormProtector::GetCaptcha(); ?>
                     
                      <label id="labelcap" for="inputcaptcha" >Captcha</label>
                      </div>
                      
                      <br/>
                      <div class="custom-control custom-checkbox mb-3">
                      <div id="little-container" style=" background-image: url('img.png');">
                   
                        </div>
                        <br/>
                      
                      </div>
                      <input name="btn" class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" value="Sign in" type="submit">
                      <div class="text-center">
                        <a class="small" href="Login.php">I think I have an account</a></div>
                    </form>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>