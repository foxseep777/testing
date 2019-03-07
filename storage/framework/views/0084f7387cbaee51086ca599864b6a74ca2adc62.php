<a href="javascript:onopenmylink();"  class="btn btn-primary">+ Add</a>
				<table class="table">
						<thead>
						<tr>
							<th>Company</th>
							<th>Quota</th>

						</tr>	
						</thead>
						<tbody>
						<?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($company->name); ?></td>
								<td><?php echo e($company->quota); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
				</table>
