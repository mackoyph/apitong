<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.html">
    <title>Login | Apitong Village</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/stroke-7/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/jquery.nanoscroller/css/nanoscroller.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/lib/theme-switcher/theme-switcher.min.css"/><link type="text/css" href="assets/css/style.css" rel="stylesheet">  </head>
  <body class="am-splash-screen">
    <div class="am-wrapper am-login">
      <div class="am-content">
        <div class="main-content">
          <div class="login-container">
            <div class="panel panel-default">
              <div class="panel-heading"><img src="assets/img/logo-full-retina.png" alt="logo" width="150px" height="39px" class="logo-img"><span>Please enter your user information.</span></div>
              <div class="panel-body">
                <form action="./function/login.php" method="post" name="loginform" class="form-horizontal">
                  <div class="login-form">
                    <div class="form-group">
                      <div class="input-group"><span class="input-group-addon"><i class="icon s7-user"></i></span>
                        <input id="user_name" name="uname" type="text" placeholder="Username" autocomplete="off" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                        <input id="user_password" name="upass" type="password" placeholder="Password" class="form-control">
                      </div>
                    </div>
                    <div class="form-group login-submit">
                      <button data-dismiss="modal" type="submit" name="login" class="btn btn-primary btn-lg">Log me in</button>
                    </div>
                    <div class="form-group footer row">
                      <div class="col-xs-6"><a href="#">Forgot Password?</a></div>
                      <div class="col-xs-6 remember">
                        <label for="user_rememberme">Remember Me</label>
                        <div class="am-checkbox">
                          <input type="checkbox" name="user_rememberme" id="user_rememberme">
                          <label for="user_rememberme"></label>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
   
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      });
      
    </script>
  

  </body>
</html>