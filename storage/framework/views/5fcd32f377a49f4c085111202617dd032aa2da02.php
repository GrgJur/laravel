<?php $__env->startSection('content'); ?>
    <div class="page-title">
        <div class="container-fluid">
            <h5><?php echo e(__('member.list')); ?></h5>
        </div>
        <div class="form-group">
        </div>
    </div>
    <div class="container-fluid">
        <div class="search p bg-light m-b-sm">
            <form method="GET" action="<?php echo e(route('members.search')); ?>">
                <?php echo csrf_field(); ?>
                <div class="input-group">
                    <input name="search" class="form-control input-search" type="text" placeholder="<?php echo e(__('member.search')); ?>" value="<?php echo e(app('request')->input('search')); ?>">
                    &nbsp;
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- Input Group -->
            </form><!-- Search Form -->
        </div>
        <?php if(count($members) > 0): ?>
            <div class="panel-body">

                <div class="form-group">
                </div>
                <div class="pull-left">
                    <a class="btn btn-success" href="<?php echo e(route('members.create')); ?>"><?php echo e(__('member.add')); ?></a>
                </div>
                <div class="table-responsive">

                    <div class="form-group">
                    </div>
                        <table class="table table-striped responsive-table" id="dt">

                            <!-- Table Headings -->
                            <thead>
                            <th><?php echo e(__('member.lastname')); ?></th>
                            <th><?php echo e(__('member.firstname')); ?></th>
                            <th><?php echo e(__('member.address')); ?></th>
                            <th><?php echo e(__('member.zip')); ?></th>
                            <th><?php echo e(__('member.city')); ?></th>
                            <th><?php echo e(__('member.phone')); ?></th>
                            <th>&nbsp;</th>
                            <th></th>
                            <th></th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="table-text"><div><?php echo e($member->lastname); ?></div></td>
                                    <td class="table-text"><div><?php echo e($member->firstname); ?></div></td>
                                    <td class="table-text"><div><?php echo e($member->address); ?></div></td>
                                    <td class="table-text"><div><?php echo e($member->zip); ?></div></td>
                                    <td class="table-text"><div><?php echo e($member->city); ?></div></td>
                                    <?php if(!empty($member->mobile)): ?>
                                        <td class="table-text"><div><a href="tel:<?php echo e($member->mobile); ?>"><?php echo e($member->mobile); ?></a></div></td>
                                    <?php else: ?>
                                     <td class="table-text"><div><a href="tel:<?php echo e($member->phone); ?>"><?php echo e($member->phone); ?></a></div></td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?php echo e(route('members.show',$member)); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye" title="<?php echo e(__('member.show')); ?>"></i></a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('members.edit',$member)); ?>" class="btn btn-info btn-xs edit"><i class="fa fa-pencil" title="<?php echo e(__('member.edit')); ?>"></i></a>
                                    </td>
                                    <td>
                                        <form class="delete" action="<?php echo e(route('members.destroy',$member)); ?>" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('DELETE')); ?>

                                            <button class="btn btn-danger btn-xs btn-delete" >
                                                <i class="fa fa-trash-o" title="<?php echo e(__('member.delete')); ?>"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    <div class="pull-right align-bottom">
                        <?php echo e($members->links()); ?>

                    </div>
                </div>
            </div>
    </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/members/members_show.blade.php ENDPATH**/ ?>