<?php $__env->startSection('content'); ?>

<div>
    <h1>Grafici Statistici</h1>
    <form action="<?php echo e(route('statistics.show')); ?>" method="post">
    	<?php echo csrf_field(); ?>
    	<select name="graphic" style="float: left;">
			<option value="1">Licenze assegnate</option>
			<option value="2">Numero di corsi</option>
			<option value="3">Numero di lezioni</option>
			<option value="4">Numero di allievi</option>
	    </select>

	    <select name="year" style="float: left;">
			<?php for($i=0; $i < count($years); $i++): ?>
				<option value="<?php echo e($years[$i]); ?>"><?php echo e($years[$i]); ?></option>
			<?php endfor; ?>
	    </select>

	    <input type="submit" value="show">	
    </form>
</div>

<div id="container"></div>

<?php if(isset($id)): ?>
	<?php if($id == 1): ?>
		<?php echo $__env->make('admin.statistics.statistics_graphic_assigned_licenses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($id == 2): ?>
		<?php echo $__env->make('admin.statistics.statistics_graphic_numbers_courses', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($id == 3): ?>
		<?php echo $__env->make('admin.statistics.statistics_graphic_numbers_lessons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php elseif($id == 4): ?>
		<?php echo $__env->make('admin.statistics.statistics_graphic_numbers_members', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jure/sg8000/resources/views/admin/statistics/statistics_show.blade.php ENDPATH**/ ?>