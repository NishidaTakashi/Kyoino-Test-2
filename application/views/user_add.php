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
        <?php echo form_open("tax2/insert"); ?>
        <h3>
          新規登録画面
        </h3>
        <p>
          <label for="name">ID</label>
          <input type="text" name="name" value="">
        </p>
        <p>
          <label for="password">パスワード</label>
          <input type="text" name="password" value="">
        </p>
        <p>
          <label for="re-password">再パスワード</label>
          <input type="text" name="re-password" value="">
        </p>
        <input type="submit" name="" value="追加">

        <?php echo form_close(); ?>
      </div>

    </div>
  </body>
</html>
