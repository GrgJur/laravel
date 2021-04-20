<div class="container-fluid">
    <div class="panel panel-default p-3 mb-2 bg-light text-dark">
        <?php echo $__env->make('common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-responsive" id="edit_licenses">
            <?php if(count($member->licenses) > 0): ?>
                <table class="table">
                    <tr>
                        <th scope="row"><?php echo e(__('license.description')); ?></th>
                        <th scope="row"><?php echo e(__('license.long_description')); ?></th>
                        <th scope="row"><?php echo e(__('license.month_duration')); ?></th>
                        <th scope="row"><?php echo e(__('license.valid_from')); ?></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                    </tr>
                    <?php $__currentLoopData = $member->licenseMember; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $licenseMember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($licenseMember->license->description); ?></td>
                            <td><?php echo e($licenseMember->license->long_description); ?></td>
                            <td><?php echo e($licenseMember->license->month_duration); ?></td>
                            <td><?php echo e($licenseMember->valid_from); ?></td>
                            <td>
                                <a href="<?php echo e(route('members.editLessonInscription', $licenseMember)); ?>"
                                   class="btn btn-primary">
                                    <i class="fa"></i> <?php echo e(__('member.edit__lesson_inscription')); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('members.editLicense', $licenseMember)); ?>"
                                   class="btn btn-info btn-xs edit"><i class="fa fa-pencil"
                                                                       title="<?php echo e(__('license.edit')); ?>"></i></a>
                            <td>
                                <form class="delete" action="<?php echo e(route('members.removeLicense', $licenseMember)); ?>"
                                      method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>

                                    <button class="btn btn-danger btn-xs btn-delete">
                                        <i class="fa fa-trash-o" title="<?php echo e(__('license.delete')); ?>"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php else: ?>
                <div class="form-group"></div>
                <div class="alert alert-warning"><?php echo e(__('member.no_license')); ?></div>
            <?php endif; ?>
            <div class="form-group">
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary"><i
                            class="fa fa-angle-double-left"></i><?php echo e(__('general.back')); ?></a>
                <a href="<?php echo e(route('members.addLicense', ['memberId' => $member->id])); ?>" class="btn btn-primary">
                    <i class="fa"></i> <?php echo e(__('member.addLicense')); ?>

                </a>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/damir/Projects/larajure/resources/views/admin/members/members_edit_licenses.blade.php ENDPATH**/ ?>