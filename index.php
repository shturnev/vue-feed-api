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
    button{
      outline: none;
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

        <? if ($auth): ?>

        <!--Create client-->
        <div class="text-center" style="margin-top: 35px;">
          <button class="hollow button success " type="button" data-toggle="create-client-cont">
            <i class="material-icons">add</i> Create client
          </button>

          <div id="create-client-cont" data-toggler data-animate="hinge-in-from-top hinge-out-from-top" hidden>
            <form action="/api.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="method_name" value="client_create"/>

              <div class="input-group">
                <input class="input-group-field" name="title" type="text" placeholder="Title">
                <div class="input-group-button">
                  <input type="submit" class="button" value="Submit">
                </div>
              </div>
            </form>
          </div>

        </div>

        <div style="margin-top: 35px;">
          <h4>Your clients</h4>
          <ul class="accordion"
              data-accordion
              data-multi-expand="true"
              data-allow-all-closed="true"
          >
            <li class="accordion-item is-active" data-accordion-item>
              <div class="accordion-menu"></div>
              <a href="#" class="accordion-title">Lorem ipsum.</a>


              <div class="accordion-content" data-tab-content>
                <div class="grid-x grid-padding-x">
                  <div class="cell medium-5 small-12">
                    <div class="input-group">
                      <label class="input-group-label">public key</label>
                      <input class="input-group-field" value="ss5ds5848d5gl3kj6" type="text" >
                    </div>
                  </div>
                  <div class="cell medium-5 small-12">
                    <div class="input-group">
                      <label class="input-group-label">secret key</label>
                      <input class="input-group-field" value="ss5ds54344 434 34 34848d5gl3kj6" type="text" >
                    </div>
                  </div>
                  <div class="cell  medium-2 small-12">
                    <a href="#" class="button tiny expanded secondary hollow"><i class="material-icons">delete</i></a>
                  </div>
                </div>

              </div>
            </li>
            <li class="accordion-item " data-accordion-item>
              <div class="accordion-menu"></div>
              <a href="#" class="accordion-title">Lorem ipsum.</a>


              <div class="accordion-content" data-tab-content>
                <div class="grid-x grid-padding-x">
                  <div class="cell medium-5 small-12">
                    <div class="input-group">
                      <label class="input-group-label">public key</label>
                      <input class="input-group-field" value="ss5ds5848d5gl3kj6" type="text" >
                    </div>
                  </div>
                  <div class="cell medium-5 small-12">
                    <div class="input-group">
                      <label class="input-group-label">secret key</label>
                      <input class="input-group-field" value="ss5ds54344 434 34 34848d5gl3kj6" type="text" >
                    </div>
                  </div>
                  <div class="cell  medium-2 small-12">
                    <a href="#" class="button tiny expanded secondary hollow"><i class="material-icons">delete</i></a>
                  </div>
                </div>

              </div>
            </li>
          </ul>
        </div>


        <? endif; ?>


    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/resources/foundation/js/vendor/foundation.min.js"></script>
<script>
  $(document).foundation();
</script>
<!--<script src="//ulogin.ru/js/ulogin.js"></script>
<script>
  function auth(token) {
    console.log(token);

    //
  }

</script>-->
</body>
</html>
