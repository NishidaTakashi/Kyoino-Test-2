<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>消費税設定</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
      <script src="<?php echo base_url();?>js/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <div class="container">

      <h3>消費税設定の一覧</h3>
      <table class="database">
        <?php echo form_open("tax2/update"); ?>

        <thead>
          <tr>
            <th>開始日付</th>
            <th>税率</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($taxes as $tax): ?>
          <tr>
              <td class="start">
                <!-- <input type="text" name="" value="<?php echo $tax['start'];?>"> -->
              <?php echo $tax["start"];?>
              </td>
              <td class="rate">
              <?php echo $tax["rate"];?>%
              </td>
          </tr>
        <?php endforeach; ?>

        </tbody>
        <?php echo form_close(); ?>

      </table>
    </div>
    <script src="<?php echo base_url();?>js/main.js" charset="utf-8"></script>
  </body>
</html>
