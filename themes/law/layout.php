<html>
  <head>
    <base href="<?php echo base_url(); ?>" />
    <link rel="icon" href="D:\MyJob\m-so-58\template-Lawwwww\html-law\images\favicon.ico">
    <title><?php echo $template['title'] ?></title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <? include "_inc.php";?>
      <?php echo $template['metadata'] ?>
  </head>
  <body>
    <div class="navbar navbar-default navbar-static-top" id="top">
      <div class="container">
        <? include "_header.php";?>
        <? include "_breadcrumb.php";?>
        <?php echo $template['body']; ?>
      </div>
      <? include "_footer.php";?>

    </div>
  </body>
  </html>
