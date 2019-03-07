<?php $__env->startSection('title', 'Page Title'); ?>


<?php $__env->startSection('content'); ?>
<h1>Abusers</h1>
		<hr>
       <div class="flex-center position-ref full-height">
    

            <div class="content">
				
               
               <div class="title m-b-md">
				<form action="/" id="month" method="post">
				<?php echo e(csrf_field()); ?>

					<select class="form-control form-control-sm" name="month">
						<option>January</option>
						<option>February</option>
						<option value="05248966336">March</option>
						<option>April</option>
						<option>May</option>
						<option>June</option>
						<option>July</option>
						<option>August</option>
						<option>September</option>
						<option>October</option>
						<option>November</option>
						<option>December</option>
					</select>
<input type="submit" value="send">					
				</form><a href="" class="btn btn-primary">Show report</a>	<a href="/generate" class="btn btn-primary">Generate Data</a>
				
		<div id="resSearch"></div>	
              



            </div>
			</div>
        </div>
<?php $__env->stopSection(); ?>
    


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>