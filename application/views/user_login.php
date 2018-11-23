<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">

  </head>
  <body>
    <div class="container">
      <div class="user">

        <?php echo validation_errors(); ?>

        <?php echo form_open("tax2/login") ?>
        <h3>
          ログイン画面
        </h3>
        <p>
          <label for="name">ID</label>
          <input type="text" name="name" value="<?php echo set_value('name'); ?>">
        </p>
        <p>
          <label for="password">パスワード</label>
          <input type="text" name="password" value="<?php echo set_value('password'); ?>">
        </p>
        <p>
          <input type="submit" name="" value="ログイン">
        </p>
        <?php echo form_close(); ?>
        <p>
          <?php echo anchor("tax2/add","新規追加"); ?>
        </p>

        <!-- 機能確認のための登録者表示 -->
        <!-- ここから -->
        <?php foreach ($users as $user): ?>
        <tr>
            <td>
            <?php echo $user["name"];?>
            </td>
            <td>
            <?php echo $user["password"];?>
            </td>
            <td>
              <!-- 機能１－－delete -->
              <?php echo form_open("tax2/delete"); ?>
              <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
                <input type="submit" name="" value="削除">
              </form>
            </td>
        </tr>
      <?php endforeach; ?>

      <!--ここまで消す  -->

      </div>

    </div>
  </body>
</html>
