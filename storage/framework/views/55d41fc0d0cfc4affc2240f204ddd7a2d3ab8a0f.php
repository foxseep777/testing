<?php $__env->startSection('title', 'Page Title'); ?>


<?php $__env->startSection('content'); ?>
<h1>Companies</h1>
<hr>
       <div class="flex-center position-ref full-height">
    

            <div class="content">
				
               
               <div class="title m-b-md">
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
				
				
			
              



            </div>
			</div>
        </div>
		
		
<div id="myModal" class="modal">
<div class="modal-content1">
<div class="close">X</div>
<h3>Add User</h3>

	<form action="/"  id="addCompForm" name="formAddCom" method="post">
	 <?php echo e(csrf_field()); ?>

		<div class="form-group">
			<input type="text" name="name" class="form-control" placeholder="Company name">
		</div>
		<div class="form-group">
				<input type="text" name="quota" class="form-control" placeholder="Quota(GB)">
		</div>
		<div class="form-group">
			<input type="submit" name="addCompany"  class="btn btn-dark btn-primary" value="Send">
		</div>
	</form>

</div>

<script>
	function onopenmylink(id,comment){
			var modal = document.getElementById('myModal');
			modal.style.display = "block";
			var span = document.getElementsByClassName("close")[0];
			span.onclick = function() {
			modal.style.display = "none";

		}
		window.onclick = function(event) {
			if (event.target == modal) {
			modal.style.display = "none";
			}
		};
	}
</script>		
<?php $__env->stopSection(); ?>
    


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>