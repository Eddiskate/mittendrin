<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>zaloguj się - <?php echo $_SERVER['HTTP_HOST'] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Le styles -->
  <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
  <style type="text/css">
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      max-width: 300px;
      padding: 19px 29px 29px;
      margin: 0 auto 20px;
      background-color: #fff;
      border: 1px solid #e5e5e5;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
      -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
      box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
      font-size: 18px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
      font-size: 16px;
      height: auto;
      margin-bottom: 15px;
      padding: 7px 9px;
    }
    .checkbox span {
      font-size: 14px;
    }

    .text-right {
      text-align: right;
    }

    .bp-logo {
      margin: 0 auto;
      display: block;
      margin-bottom: 40px;
    }

    .btn-login {
      float: right;
    }

    .form-signin .remember-me {
      margin-top: 5px;
    }
  </style>
</head>
<body>
<div class="container">
  <img src="http://blackpage.pl/images/logo.png" width="150" class="bp-logo">
  <form class="form-signin" action="/admin.php/security/index" method="POST">
    <h2 class="form-signin-heading"><?php echo $_SERVER['HTTP_HOST'] ?></h2>
    <input type="text" class="input-block-level" placeholder="Adres e-mail" name="mail">
    <input type="password" class="input-block-level" placeholder="Hasło" name="passwd">
    <div class="row-fluid">
      <div class="span6">
        <label class="checkbox remember-me">
          <input type="checkbox" name="remember-me" value="1" <?php if($_COOKIE['bpshop-admin-remember-me']): ?>checked<?php endif; ?>> <span>Zapamiętaj mnie</span>
        </label>
      </div>
      <div class="span6"><button class="btn btn-primary btn-login" type="submit">Zaloguj się</button></div>
    </div>

  </form>
</div>
</body>
</html>
