<?php $__env->startSection('title', 'Page Title'); ?>


<?php $__env->startSection('content'); ?>
       <div class="flex-center position-ref full-height">
    

            <div class="content">
				
               
               <div class="title m-b-md">
				<a href="/generate">Generate Data</a><a href="">Add</a>
				<table class="table">
						<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Company</th>
							<th></th><th></th>
						</tr>	
						</thead>
						<tbody>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($user->user_name); ?></td>
								<td><?php echo e($user->fake); ?></td>
								<td><?php echo e($user->email); ?></td>
								<td><?php echo e($user->name); ?></td>
								<td><a href="">edit</a></td>
								<td><a href="">delete</a></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
				</table>
				
				
			
              



            </div>
			</div>
        </div>
<?php $__env->stopSection(); ?>
    


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>