<html>
    <head>
        <title>App Name - <?php echo $__env->yieldContent('title'); ?></title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src=<?php echo e(URL::asset('js/jquery.serializejson.js')); ?>></script>
		<script type="text/javascript" src=<?php echo e(URL::asset('js/jquery.validate.js')); ?>></script>
		<link  href="<?php echo e(URL::asset('css/style.css')); ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
		
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<!--<script src="<?php echo e(URL::asset('js/app.js')); ?>"></script>-->
		<script src="<?php echo e(URL::asset('js/myApp.js')); ?>"></script>

    </head>
    <body>
        <?php $__env->startSection('sidebar'); ?>
        <div class="side-menu">
     
	<div class="side-menu-wrapper"> 
		<div class="menu-items-wrapper">
			 <ul class="menu-items-list first-level">
			                 <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                    <a href="/" class="menu-item">
                        <div>  
                            <span class="menu-item-name">Users</span>
                        </div> 
                    </a>
                </li>
			                <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                    <a href="companies" class="menu-item">
                        <div>
							<span class="menu-item-name">Companies</span>
                        </div>
                    </a>
                </li>
			                <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                    <a href="abusers" class="menu-item">
                        <div>
						
                            <span class="menu-item-name">Abusers</span>
                        </div>
                    </a>
                </li>
                <li data-url-active="/ru/(catalog|video|patterns)" class="active">
				                    <a href="instandartModels" class="menu-item">
                        <div>
						
                            <span class="menu-item-name">Model Company</span>
                        </div>
                    </a>
                </li>
			               
				</ul>
		</div>
	</div> 
</div>
        <?php echo $__env->yieldSection(); ?>

        <div class="container">
		
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
</html>