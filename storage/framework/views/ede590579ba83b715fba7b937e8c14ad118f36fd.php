<hr>
				<h3>Abusers of company <?php echo e($companyName->name); ?></h3>
			
				<table class="table">
						<thead>
						<tr>
							<th>User</th>
							<th>Date/Time</th>
							<th>Resource</th>
							<th>Tranfered</th>
							<th></th>
						</tr>	
						</thead>
						<tbody>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($user->user_name); ?></td>
								<td><?php echo e($user->date); ?></td>
								<td><?php echo e($user->resource); ?></td>
								<td><?php echo e($user->transfer); ?></td>
								
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
				</table>


