	<a href="javascript:onopenmylink();" class="btn btn-primary">+ Add</a>
	<table class="table">
		<thead> 
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Company</th>
			</tr>	
		</thead>
		<tbody>
		<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($user->user_name); ?></td>
				<td><?php echo e($user->email); ?></td>
				<td><?php echo e($user->name); ?></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
