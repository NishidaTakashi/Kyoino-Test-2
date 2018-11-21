<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">

  </head>
  <body>
    <div class="container">
      <div class="user">
        <?php form_open("tax2/login") ?>
        <h3>
          ログイン画面
        </h3>
        <p>
          <label for="ID">ID</label>
          <input type="text" name="" value="">
        </p>
        <p>
          <label for="password">パスワード</label>
          <input type="text" name="" value="">
        </p>
        <p>
          <input type="submit" name="" value="ログイン">
        </p>
        <?php form_close(); ?>
        <p>
          <?php echo anchor("tax2/add","新規追加"); ?>
        </p>
      </div>

    </div>
  </body>
</html>
