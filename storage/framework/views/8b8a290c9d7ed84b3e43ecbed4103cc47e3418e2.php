<?php
    use Illuminate\Support\Facades\Route;
$horizon=feature(12)['value2'];
?>
        <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="<?php echo e(visual()); ?>">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Rose Billing'); ?>">
    <?php echo $__env->yieldContent('meta'); ?>
    <title><?php echo $__env->yieldContent('title', app_name()); ?></title>
    <link rel="shortcut icon" type="image/x-icon"
          href="<?php echo e(Storage::disk('public')->url('app/public/img/company/ico/' . config('core.icon'))); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <script type="text/javascript">
        var baseurl = '<?php echo e(route('biller.index')); ?>/';
        var crsf_token = 'csrf-token';
        var crsf_hash = '<?php echo e(csrf_token()); ?>';
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token() ]); ?>;
        var unit_load_data =<?php echo units(); ?>;
        var cur_dy='<?php echo e(config('currency.symbol')); ?>';
    </script>
    <!-- BEGIN: Vendor CSS-->
<?php echo e(Html::style(mix('focus/app_end-'.visual().'.css'))); ?>

<?php if($horizon=='v'): ?>
    <?php echo Html::style('core/app-assets/css-'.visual().'/core/menu/menu-types/vertical-menu-modern.css'); ?>

<?php else: ?>
    <?php echo Html::style('core/app-assets/css-'.visual().'/core/menu/menu-types/horizontal-menu.css'); ?>

<?php endif; ?>
<?php echo Html::style('core/app-assets/vendors/css/forms/icheck/icheck.css'); ?>

<?php echo Html::style('core/app-assets/vendors/css/forms/icheck/custom.css'); ?>

<?php echo $__env->yieldContent('after-styles'); ?>
<!-- END: Vendor CSS-->
    <!-- BEGIN: Custom CSS-->
<?php echo Html::style('core/assets/css/style-'.visual().'.css'); ?>

    <?php if($horizon=='v'): ?>
<style type="text/css">

    @media screen and (min-width: 978px) {
        .ui-widget-content.ui-autocomplete.ui-front {
            left: 214pt !important;
            width: 90% !important;
        }
    }
</style>
<?php endif; ?>
<!-- END: Custom CSS-->
    <meta name="d_unit" content="<?php echo e(trans('productvariables.unit_default')); ?>">
</head>
<!-- END: Head-->

<?php if(isset($page)): ?>
    <body <?php echo $page; ?> >
    <?php if($logged_in_user): ?>
        <?php echo $__env->make('core.partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php else: ?>
<?php if($horizon=='v'): ?>
            <body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

            <?php if($logged_in_user): ?>
                <?php echo $__env->make('core.partials.menu_vertical', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>


            <?php else: ?>
                <body class="horizontal-layout horizontal-menu 2-columns " data-open="click" data-menu="horizontal-menu"
                      data-col="2-columns">

                <?php if($logged_in_user): ?>
                    <?php echo $__env->make('core.partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>




        <?php endif; ?>




                <?php endif; ?>



        <div class="app-content content">
            <div id="c_body"></div>
            <?php if(session('flash_success')): ?>
                <div class="alert bg-success alert-dismissible m-1" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> <?php echo session('flash_success'); ?>

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
            <?php if($errors->any()): ?>
                <div class="alert bg-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>

                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <?php echo e(Html::script(mix('js/app_end.js'))); ?>

        <?php echo e(Html::script('focus/js/control.js?b='.config('version.build'))); ?>

        <?php echo e(Html::script('focus/js/custom.js?b='.config('version.build'))); ?>

                <?php echo $__env->make("focus.modal.update_available", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script type='text/javascript'>
            accounting.settings = {
                number: {
                    precision: '<?php echo e(config('currency.precision_point')); ?>',
                    thousand: '<?php echo e(config('currency.thousand_sep')); ?>',
                    decimal: '<?php echo e(config('currency.decimal_sep')); ?>'
                }
            };
            var two_fixed =<?php echo e(config('currency.precision_point')); ?>;
            var currency = '<?php echo e(config('currency.symbol')); ?>';

            function editor() {
                $('.html_editor').summernote({
                    height: 60,
                    tooltip: false,
                    toolbar: [
                        <?php echo config('general.editor'); ?>

                    ],
                    popover: {}

                });
            }

        </script>
        <?php echo $__env->yieldContent('after-scripts'); ?>
        <?php echo $__env->yieldContent('extra-scripts'); ?>

        </body>
</html>
<?php /**PATH C:\laragon\www\RoseSCMS\resources\views/core/layouts/app.blade.php ENDPATH**/ ?>