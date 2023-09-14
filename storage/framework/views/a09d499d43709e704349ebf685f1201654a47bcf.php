<?php
    use Illuminate\Support\Facades\Route;
?>
        <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="<?php echo e(visual()); ?>">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Billing System'); ?>">
    <?php echo $__env->yieldContent('meta'); ?>
    <title><?php echo $__env->yieldContent('title', app_name()); ?></title>
    <link rel="shortcut icon" type="image/x-icon"
          href="<?php echo e(Storage::disk('public')->url('app/public/img/company/ico/' )); ?><?php echo $__env->yieldContent('icon', 'favicon.ico'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <script type="text/javascript">
        var baseurl = '<?php echo e(route('biller.index')); ?>/';
        var crsf_token = 'csrf-token';
        var crsf_hash = '<?php echo e(csrf_token()); ?>';
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token() ]); ?>;
    </script>
    <!-- BEGIN: Vendor CSS-->
<?php echo e(Html::style(mix('focus/app_end-'.visual().'.css'))); ?>

<!-- END: Vendor CSS-->
<?php echo $__env->yieldContent('after-styles'); ?>
<!-- BEGIN: Custom CSS-->
<?php echo Html::style('core/assets/css/style-'.visual().'.css'); ?>

<!-- END: Custom CSS-->
</head>
<!-- END: Head-->
<?php if(isset($page)): ?>
    <body <?php echo $page; ?> >
    <?php else: ?>
        <body class="horizontal-layout horizontal-menu 2-columns" data-open="click" data-menu="horizontal-menu"
              data-col="2-columns">
        <?php endif; ?>
        <div id="c_body"></div>
        <?php if(session('flash_success')): ?>
            <div class="alert bg-success alert-dismissible m-1" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Success!</strong> <?php echo e(session('flash_success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('flash_error')): ?>
            <div class="alert bg-danger alert-dismissible m-1" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>Error!</strong> <?php echo session('flash_error'); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo e(Html::script('core/app-assets/vendors/js/vendors.min.js')); ?>

        <?php echo $__env->yieldContent('after-scripts'); ?>
        <?php echo $__env->yieldContent('extra-scripts'); ?>
        </body>
</html>
<?php /**PATH C:\laragon\www\RoseSCMS\resources\views/core/layouts/public_app.blade.php ENDPATH**/ ?>