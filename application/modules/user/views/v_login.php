
  <!DOCTYPE html>
  <html lang="en" >

  <head>
    <meta charset="UTF-8">
  <title>Arundina apps Login</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/login_style.css">
  </head>

  <body>

    <form name="login-form" class="login-form" action="" method="post">

  		<div class="header">
  		<h1>Arundina Holiday</h1>
  		<span>Login</span>
  		</div>

  <form action="<?php echo site_url('user/login') ?>" method="post">
  		<div class="content">
  		<input name="username" type="text" class="input username" placeholder="Username" />
  		<div class="user-icon"></div>
  		<input name="password" type="password" class="input password" placeholder="Password" />
  		<div class="pass-icon"></div>
  		</div>
  		<div class="footer">
  		<button type="submit" class="button">Login</button>
  		</div>
        </form>

  	</form>



  </body>

  </html>
