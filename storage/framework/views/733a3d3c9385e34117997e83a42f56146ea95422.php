<ul class="dropdown-menu lang-menu" role="menu" style="width: 400px;">
    <?php $__currentLoopData = config('locale.languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php if($key != App::getLocale()): ?>       <span
                class="mt-1 pb-1 display-inline-block width-30-per border-bottom-blue-grey border-bottom-lighten-3 ">&nbsp;<i
                    class="flag-icon flag-icon-<?php echo e($lang[3]); ?>"></i><?php echo e(link_to('lang/'.$key, trans('menus.language-picker.langs.'.$key))); ?></span> <?php endif; ?>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH C:\laragon\www\RoseSCMS\resources\views/includes/partials/lang_focus.blade.php ENDPATH**/ ?>