<?php $__env->startSection('title', 'Page Title'); ?>


<?php $__env->startSection('content'); ?>
<h1>Abusers</h1>

		<hr>
       <div class="flex-center position-ref full-height">
    

            <div class="content">
			<div id="preloader_malc" style="display:none">

	<div>

		Please wait, data is generated ...

	</div>

</div>	
               
               <div class="title m-b-md">
			   <form  id="month">
			   <div>
						<label>Select the reporting month</label>
					</div>
					<div>
						<select class="form-control form-control-sm" name="month">
							<option value="">Select month</option>
						<?php $__currentLoopData = $min; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($k.-$m); ?>"><?php echo e($k); ?></option>
							
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
						</select>
					</div>
					
					<div>	
					<input type="submit" value="Show report" class="btn btn-primary">
					</div>
				</form>		
				<a href="/generate" class="btn btn-primary" id="generate">Generate Data</a>
				
		<div id="resSearch"> 
		<?php if(isset($resGen)): ?> 
			<h2><span><?php echo e($resGen); ?></span></h2>
		<?php endif; ?>
		</div>	
              



            </div>
			</div>
        </div>
<?php $__env->stopSection(); ?>
    


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>