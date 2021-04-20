<?php $__env->startSection('content'); ?>

<div style="width: 100%; float: left;">
	<h2>Sedi scolastiche</h2>
	<?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div 
				style="width: 31%; 
				float: left;
			 	border: 2px solid black; 
				margin-right: 1%; 
				margin-left: 1%;
				margin-bottom: 5px; 
				text-align: center;">
				
				<a href="<?php echo e(route('schools.school', $school['id'])); ?>"><?php echo e($school['name']); ?></a>

			</div>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	
</div>
<div style="width: 100%: float:left;"><b>Numero di sedi <?php echo e(count($schools)); ?></b></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/schools/schools_show.blade.php ENDPATH**/ ?>