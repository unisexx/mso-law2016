<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $template['title']; ?></title> 
        <? include '_meta.php'?>
		<? include '_script.php'?>
		<?php echo $template['metadata']; ?>
	</head>
	<body>
		<? include '_header.php'?>
		<div id="page" style="position: relative;">
		<?php echo $template['body']; ?>
		</div><!--page-->
	</body>
</html>