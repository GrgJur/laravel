<div class="modal fade" id="membersModal"
     tabindex="-1" role="dialog"
     aria-labelledby="membersModalLabel" style="margin: 20vh auto 0px auto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="favoritesModalLabel"><?php echo e(__('member.list')); ?></h4>
            </div>
            <div class="modal-body">

                    <div class="table-responsive">
                        <table id="datatable-member-direct" class="table table-hover table-bordered table-striped" name ="datatable" style="width:100%";cellspacing="0">
                            <thead>
                            <th><?php echo e(__('member.nip')); ?></th>
                            <th><?php echo e(__('member.firstname')); ?></th>
                            <th><?php echo e(__('member.lastname')); ?></th>
                            <th><?php echo e(__('member.birthdate')); ?></th>
                            <th><?php echo e(__('license.description')); ?></th>
                            <th><?php echo e(__('member.addToLesson')); ?></th>

                            </thead>
                        </table>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default"
                        data-dismiss="modal"><?php echo e(__('general.close')); ?></button>
            </div>
        </div>
    </div>
</div>







<?php /**PATH /home/jure/sg8000/resources/views/admin/lessons/lessons_members_direct.blade.php ENDPATH**/ ?>