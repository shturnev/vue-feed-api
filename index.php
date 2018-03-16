<?php
require_once "back/vendor/autoload.php";

$U = new \classes\User();
$auth = $U->isAuth($_COOKIE['token']);

/*-----------------------------------
соберём клиентов
-----------------------------------*/
if ($auth) {
    try {
        $clients = (new \classes\getters\ClientGet($auth))->get(['m' => 2]);
    } catch (Exception $e) {

    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8"/>
  <title>welcome to Api</title>
  <!--    <link rel="shortcut icon" href=""/>-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/resources/foundation/css/foundation.min.css"/>
  <link rel="stylesheet" type="text/css" href="/resources/highlight/styles/darcula.css"/>

  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    .material-icons {
      vertical-align: middle;
    }

    button {
      outline: none;
    }
  </style>

</head>

<body>

<div class="grid-container">
  <div class="grid-x">
    <div class="cell">
      <h1 class="text-center" style="margin-top: 35px;">Welcome to API!</h1>
      <div class="text-center">
        <small>Please note that this is a training service, for practice. All data is stored temporarily, the storage
          period is 2 months.
        </small>
      </div>


        <? if ($e) { ?>
          <div style="margin: 35px 0;" class="callout alert"><? echo $e->getMessage() ?></div><? } ?>


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

          <? if ($clients):  require "resources/page_blocks/clients.php"; endif; ?>
          <? require "resources/page_blocks/methods.php" ?>

        <? endif; ?>


    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="/resources/foundation/js/vendor/foundation.min.js"></script>
<script type="text/javascript" src="/resources/highlight/highlight.pack.js"></script>
<script>
  $(document).foundation();
  $('[data-js="delete-item"]').on("click", function () {
    if (!confirm('Are you sure?')) {
      return false;
    }
  });

  hljs.initHighlightingOnLoad();

</script>

</body>
</html>
