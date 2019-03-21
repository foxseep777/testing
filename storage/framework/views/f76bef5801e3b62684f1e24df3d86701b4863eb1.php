<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<title><?php echo e(config('app.name', 'Laravel')); ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src=<?php echo e(URL::asset('js/jquery.serializejson.js')); ?>></script>
		<script type="text/javascript" src=<?php echo e(URL::asset('js/jquery.validate.js')); ?>></script>
		<script src="<?php echo e(URL::asset('js/myApp.js')); ?>"></script>
		<link  href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	</head>
	<body>
		<?php if(auth()->guard()->guest()): ?>
			<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>


    </body>
</html>

