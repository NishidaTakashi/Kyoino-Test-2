<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">

  </head>
  <body>
    <div class="container">
      <?php echo validation_errors(); ?>

      <?php echo form_open("tax2/login") ?>
      <h3>
        ログイン画面
      </h3>
      <div class="user">
        <p>
          <label for="name">ID</label>
          <input type="text" name="name" value="<?php echo set_value('name'); ?>">
        </p>
        <p>
          <label for="password">パスワード</label>
          <input type="password" name="password" maxlength="10" value="<?php echo set_value('password'); ?>">
        </p>
      </div>
      <p>
        <input type="submit" name="" value="ログイン">
      </p>

      <?php echo form_close(); ?>
      <p>
        <?php echo anchor("tax2/add","新規追加"); ?>
      </p>
    </div>
  </body>
</html>
