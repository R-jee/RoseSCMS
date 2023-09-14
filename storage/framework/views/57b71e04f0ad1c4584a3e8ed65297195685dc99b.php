<?php $__env->startSection('title', trans('business.company_settings')); ?>
<?php $__env->startSection('content'); ?>
    <div class="">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h4 class="content-header-title mb-0"><?php echo e(trans('business.company_settings')); ?></h4>

                </div>

            </div>
            <div class="content-body"> <?php echo e(Form::open(['route' => 'biller.business.update_settings', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post','files' => true, 'id' => 'manage-company'])); ?>

                <div class="row">
                    <div class="col-6">
                        <div class="card rounded">

                            <div class="card-content">

                                <div class="card-body">


                                    <div class="form-group">
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'cname', trans('hrms.company'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('cname', @$company['cname'], ['class' => 'form-control box-size', 'placeholder' => trans('hrms.company')])); ?>

                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'address', trans('hrms.address_1'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('address', @$company['address'], ['class' => 'form-control box-size', 'placeholder' => trans('hrms.address_1')])); ?>

                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'city', trans('hrms.city'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('city', @$company['city'], ['class' => 'form-control box-size', 'placeholder' => trans('hrms.city')])); ?>

                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'region', trans('hrms.state'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('region', @$company['region'], ['class' => 'form-control box-size', 'placeholder' => trans('hrms.state')])); ?>

                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'country', trans('hrms.country'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('country', @$company['country'], ['class' => 'form-control box-size', 'placeholder' => trans('hrms.country')])); ?>

                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'postbox', trans('hrms.postal'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('postbox', @$company['postbox'], ['class' => 'form-control box-size', 'placeholder' => trans('hrms.postal')])); ?>

                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'taxid', trans('hrms.tax_id'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('taxid', @$company['taxid'], ['class' => 'form-control box-size', 'placeholder' => trans('hrms.tax_id')])); ?>

                                            </div>
                                        </div>

                                         <div class='form-group'>
                                            <?php echo e(Form::label( 'email', trans('general.email'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('email', @$company['email'], ['class' => 'form-control box-size', 'placeholder' => trans('general.email')])); ?>

                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <?php echo e(Form::label( 'phone', trans('general.phone'),['class' => 'col control-label'])); ?>

                                            <div class='col'>
                                                <?php echo e(Form::text('phone', @$company['phone'], ['class' => 'form-control box-size', 'placeholder' => trans('general.phone')])); ?>

                                            </div>
                                        </div>

 <div class="row form-group">
                                        <div class="col-12"><?php echo $fields_data; ?></div>
                                    </div>
                                        <div class="edit-form-btn">
                                            <?php echo e(link_to_route('biller.dashboard', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md'])); ?>

                                            <?php echo e(Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md'])); ?>

                                            <div class="clearfix"></div>
                                        </div><!--edit-form-btn-->
                                    </div><!--form-group-->


                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card rounded">
                            <div class="card-content">

                                <div class="card-body">


                                    <?php echo e(Form::label( 'icon', trans('business.favicon'),['class' => 'control-label'])); ?>

                                    <p class="mb-2"><br><img class="img-fluid"
                                                             src="<?php echo e(Storage::disk('public')->url('app/public/img/company/ico/' . @$company['icon'])); ?>"
                                                             alt="Business favicon"></p>
                                    <?php echo Form::file('icon', array('class'=>'input mb-1' )); ?>

                                    <small><?php echo e(trans('hrms.blank_field')); ?><br>only .ico format accepted
                                    </small>


                                    <hr>
                                    <?php echo e(Form::label( 'theme_logo', trans('business.theme_logo'),['class' => 'control-label'])); ?>

                                    <p class="mb-2"><br><img class="img-fluid avatar-100"
                                                             src="<?php echo e(Storage::disk('public')->url('app/public/img/company/theme/' . @$company['theme_logo'])); ?>"
                                                             alt="Business header logo"></p>
                                    <?php echo Form::file('theme_logo', array('class'=>'input mb-1' )); ?>

                                    <small><?php echo e(trans('hrms.blank_field')); ?><br>only jpg|png format accepted.<br>Recommended
                                        dimensions are
                                        80x80. Use small size file - it will load quickly.
                                    </small>


                                    <hr>
                                    <?php echo e(Form::label( 'logo', trans('business.invoice_logo'),['class' => 'control-label'])); ?>

                                    <p class="mb-2"><br><img class="img-fluid avatar-lg"
                                                             src="<?php echo e(Storage::disk('public')->url('app/public/img/company/' . @$company['logo'])); ?>"
                                                             alt="Business Logo"></p>
                                    <?php echo Form::file('logo', array('class'=>'input mb-2' )); ?>

                                    <small><?php echo e(trans('hrms.blank_field')); ?><br>only jpg|png format accepted. <br>Recommended
                                        dimensions are
                                        500x280. Use small size file - it will load quickly.
                                    </small>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\RoseSCMS\resources\views/focus/general/company.blade.php ENDPATH**/ ?>