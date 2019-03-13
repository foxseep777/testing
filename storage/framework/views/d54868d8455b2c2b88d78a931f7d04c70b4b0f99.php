<table class="table">
	<thead>
		<tr>
			<th>Company</th>
			<th>Quota</th>
			<th>Used</th>
			<th></th>
		</tr>	
	</thead>
	<tbody>
		<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($company->name); ?></td>
				<td><?php echo e($company->quota); ?></td>
				<td><?php echo e($company->limit); ?></td>
				<td><a href="#" onclick="companyAdd('<?php echo e($company->id); ?>','<?php echo e($company->month); ?>');">Abusers</a></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
	 


