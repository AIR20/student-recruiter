<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php foreach ($css as $item): ?>
		<link rel="stylesheet" href="<?php echo $assetUrl.'css/'.$item ?>" />
	<?php endforeach; ?>
	<?php foreach ($js as $item): ?>
		<script type="text/javascript" src="<?php echo $assetUrl.'js/'.$item ?>"></script>
	<?php endforeach; ?>
</head>