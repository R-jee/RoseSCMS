<?php $__env->startSection('content'); ?>
    <div class="content-wrapper ">

        <div class="content-body">
            <section class="flexbox-container mt-5">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10">
                        <div class="card-header bg-transparent border-0 mt-5">
                            <h1 class="error-code text-center mt-5 "><?php echo e(trans('http.404.title')); ?></h1>
                            <h2></h2>
                            <p></p>
                            <p class="text-center"><?php echo e(trans('http.404.description')); ?></p>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('core.layouts.public_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\RoseSCMS\resources\views/errors/404.blade.php ENDPATH**/ ?>