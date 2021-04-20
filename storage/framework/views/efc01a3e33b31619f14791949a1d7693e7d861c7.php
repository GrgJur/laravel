<!-- importa cartella.file -->


<?php $__env->startSection('content'); ?>

    <div class="">
    	<h2>Dashboard</h2>
        <div class="panel panel-default">
       
        	<ul>
        		<li>Amministratore: <?php echo e(auth()->user()->firstname); ?> <?php echo e(auth()->user()->lastname); ?></li>
        		<li>Sede scolastica: <?php echo e(session()->get('school_name')); ?></li>
        	</ul>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/home.blade.php ENDPATH**/ ?>