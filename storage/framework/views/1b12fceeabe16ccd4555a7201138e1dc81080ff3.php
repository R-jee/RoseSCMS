<div class="modalx fade" id="auto_update_alert" role="dialog">
    <div class="modal-dialog  modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-gradient-directional-grey-blue white">

                <h4 class="modal-title" id="myModalLabel">New Update Available</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only"><?php echo e(trans('pos.pos')); ?></span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    $v_file = base_path() . DIRECTORY_SEPARATOR . 'version.json';
           $version = Illuminate\Support\Facades\File::get($v_file);
           $version = json_decode($version, true);
                ?>

                <div class="text-center">
                    <p  class="mt-2"> <strong><?php echo e(trans('update.current_version')); ?> <?php echo e($version['version']); ?> Build <?php echo e($version['build']); ?></strong><br>
                    </p><p class="mt-3">
                    <strong>Latest Version is <span id="u_v_info"></span></strong><br>
                    </p>
                    <p class="mt-5">
                        <div class="alert alert-danger">Your are .. update(s) behind the latest update.</div><br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\RoseSCMS\resources\views/focus/modal/update_available.blade.php ENDPATH**/ ?>