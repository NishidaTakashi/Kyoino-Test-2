<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">

  </head>
  <body>
    <div class="container">
      <?php echo validation_errors(); ?>

      <?php echo form_open("tax2/insert"); ?>
      <h3>
        新規登録画面
      </h3>
      <div class="user">

        <p>
          <label for="name">ID</label>
          <input type="text" name="name" value="<?php echo set_value('name'); ?>">
        </p>
        <p>
          <label for="password">パスワード</label>
          <input type="text" name="password" value="<?php echo set_value('password'); ?>">
        </p>
        <p>
          <label for="re-password">再パスワード</label>
          <input type="text" name="re-password" value="<?php echo set_value('re-password'); ?>">
        </p>
      </div>

      <input type="submit" name="" value="追加">

      <?php echo form_close(); ?>

    </div>
  </body>
</html>
