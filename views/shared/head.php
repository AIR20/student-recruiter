<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php foreach ($css['external'] as $item): ?>
		<link rel="stylesheet" href="<?php echo $item ?>" />
	<?php endforeach; ?>
	<?php foreach ($css['internal'] as $item): ?>
		<link rel="stylesheet" href="<?php echo $assetUrl.'css/'.$item ?>" />
	<?php endforeach; ?>
	<?php foreach ($js['external'] as $item): ?>
		<script type="text/javascript" src="<?php echo $item ?>"></script>
	<?php endforeach; ?>
	<?php foreach ($js['internal'] as $item): ?>
		<script type="text/javascript" src="<?php echo $assetUrl.'js/'.$item ?>"></script>
	<?php endforeach; ?>
</head>