<?php
require_once "back/vendor/autoload.php";

$U = new \classes\User();
$auth = $U->isAuth($_COOKIE['token']);


?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8"/>
  <title>welcome to Api</title>
  <!--    <link rel="shortcut icon" href=""/>-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/resources/foundation/css/foundation.min.css"/>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    .material-icons {
      vertical-align: middle;
    }
  </style>

</head>

<body>

<div class="grid-container">
  <div class="grid-x">
    <div class="cell">
      <h1 class="text-center" style="margin-top: 35px;">Welcome to API!</h1>


        <? if (!$auth): ?>
          <div class="h4 text-center">For using this api you need to login/register</div>

          <div class="login-cont text-center" style="max-width: 320px;margin: 50px auto;">
            <form action="/api.php" method="post" enctype="multipart/form-data" target="_self">
              <input type="hidden" name="method_name" value="login">
              <input type="text" name="email" value="" placeholder="email"/>
              <input type="password" name="pass" value="" placeholder="password"/>
                <? if ($_COOKIE["need_email_confirm"]) { ?>
                  <div class="callout warning text-center" style="margin-top: 15px;">For continue you need to confirm
                    your email..
                  </div>
                <? } ?>
              <input class="button" name="submit" type="submit" value="Login/Register"/>
            </form>
          </div>
        <? endif; ?>


    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/resources/foundation/js/app.js"></script>
<!--<script src="//ulogin.ru/js/ulogin.js"></script>
<script>
  function auth(token) {
    console.log(token);

    //
  }

</script>-->
</body>
</html>
