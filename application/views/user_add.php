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
        <?php form_open("tax2/add") ?>
        <h3>
          新規登録画面
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
          <label for="re-password">再パスワード</label>
          <input type="text" name="" value="">
        </p>
        <input type="submit" name="" value="追加">

        <?php form_close(); ?>
      </div>

    </div>
  </body>
</html>
