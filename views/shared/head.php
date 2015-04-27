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
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>