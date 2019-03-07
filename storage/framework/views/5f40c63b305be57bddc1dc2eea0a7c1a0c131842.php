<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
          
            }

           
			table td, th {
				border: 1px solid #878787;
				padding: 5px;
			}
			table {
				border: 1px solid black;
				border-collapse: collapse;
			}

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
    

            <div class="content">
				
               
               <div class="title m-b-md">
				
			
				
				<table class="table">
						<thead>
						<tr>
							<th>id</th>
							<th>ip</th>
							<th>date</th>
							<th></th><th></th>
						</tr>	
						</thead>
						<tbody>
						<?php $__currentLoopData = $all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($val->idUser); ?></td>
								<td><?php echo e($val->ip); ?></td>
								<td><?php echo e($val->date); ?></td>
								<td><?php echo e($val->company); ?></td>
								
								<td><a href=""><?php echo e($val->frtest); ?></a></td>
								<td><a href="">delete</a></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
				</table>
              



            </div>
			</div>
        </div>
    </body>
</html>
