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
          <?php echo anchor("tax2","ログアウト") ?>

      </div>
      <h1>消費税一覧</h1>



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
  </body>
</html>
