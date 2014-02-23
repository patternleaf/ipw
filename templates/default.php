<?php ob_start(); ?><!DOCTYPE html>
<html>
<head>

<?php if (DEVELOP) : ?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet/less" href="<?php echo STATIC_URL; ?>less/styles.less?<?php echo rand(); ?>" type="text/css">
	
	<script type="text/javascript" charset="utf-8">
		// less = {
		// 	dumpLineNumbers: 'all'
		// };
	</script>
	<script src="<?php echo STATIC_URL; ?>js/less-1.6.3.min.js" type="text/javascript"></script>
<?php else : ?>
	<link rel="stylesheet" href="/css/styles.css" type="text/css">
<?php endif; ?>
	
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="../assets/ico/favicon.png">
		
	<?php app()->renderHTMLHead(); ?>

</head>
<body <?php echo app()->getFragment('HTMLBodyAttributes'); ?>>
	
	<?php app()->renderHTMLBody(); ?>

	<!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo STATIC_URL; ?>js/bootstrap.js"></script>

	<?php app()->renderFragment('HTMLBodyTail'); ?>

</body>
</html>
<?php app()->setFragment('HTMLPage', ob_get_clean()); ?>