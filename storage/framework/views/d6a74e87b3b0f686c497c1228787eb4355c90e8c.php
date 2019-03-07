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
							<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($users->user_name); ?></td>
								<td><?php echo e($users->email); ?></td>
								<td><?php echo e($users->limit); ?></td>
								<td><a href="">edit</a></td>
								<td><a href="">delete</a></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
				</table>


