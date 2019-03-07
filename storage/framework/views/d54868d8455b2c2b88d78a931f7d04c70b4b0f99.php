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
				<td><a href="#" onclick="$.ajax({type: `GET`, url: `/reportAbusers`,
					data:'month=<?php echo e($company->month); ?>&id=<?php echo e($company->id); ?>', 
					success:function(response){$('#resSearch').html(response)}});">Abusers</a></td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>
	


