<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>消費税一覧</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
  </head>
  <body>
    <div class="container">
      <div class="login">
          <p>
            ID
            <?php echo $user_name["name"]; ?>
          </p>
          <?php echo anchor("tax2/logout","ログアウト") ?>

      </div>
      <h1>消費税一覧</h1>

    </div>
  </body>
</html>
