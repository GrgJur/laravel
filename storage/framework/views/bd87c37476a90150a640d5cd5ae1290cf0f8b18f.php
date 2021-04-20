<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

    <div class="container-fluid ">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo e(route('client.home')); ?>"><?php echo e(__('navigation.title')); ?></a>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle <?php echo e(Request::is('client/lessons')? 'nav-link active' : 'nav-link'); ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(__('navigation.courses')); ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <?php echo csrf_field(); ?>
                                <?php $__currentLoopData = \App\Models\CourseType::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="<?php echo e(route('client.lessons',['type'=>$type->description])); ?>"><?php echo e($type->description); ?></a>
                                    <div class="dropdown-divider"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(route('client.index')); ?>"><?php echo e(__('navigation.mess')); ?></a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(route('client.logout')); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGOUT</a>
                    </li>
                </ul>
        </div>
    </div>
</nav>
<div class="form-group">
</div><?php /**PATH /Users/damir/Projects/larajure/resources/views/client/nav_client.blade.php ENDPATH**/ ?>