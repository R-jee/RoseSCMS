<?php if (access()->allow('business_settings')): ?>
<li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#"
                                               data-toggle="dropdown" id="auto-checker"><?php echo e(trans('business.business_admin')); ?></a>
    <ul class="mega-dropdown-menu dropdown-menu row">
        <li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase mb-1"><i
                    class="fa fa-building-o"></i> <?php echo e(trans('business.general_preference')); ?></h6>
            <ul>
                <li class="menu-list">
                    <ul>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.business.settings')); ?>"><i
                                    class="ft-feather"></i><?php echo e(trans('business.company_settings')); ?>

                            </a></li>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.localization')); ?>"><i
                                    class="fa fa-globe"></i> <?php echo e(trans('business.business_localization')); ?>

                            </a></li>

                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.transactioncategories.index')); ?>"><i
                                    class="ft-align-center"></i> <?php echo e(trans('transactioncategories.transactioncategories')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.settings.status')); ?>"><i
                                    class="fa fa-flag-o"></i> <?php echo e(trans('meta.default_status')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.markets.index')); ?>"><i
                                    class="fa fa-vcard"></i> <?php echo e(trans('sales_channel.sales_channels')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.settings.business_goals')); ?>"><i
                                    class="fa fa-bullseye"></i> <?php echo e(trans('en.goal_settings')); ?>

                            </a></li>

                    </ul>
                </li>
            </ul>
        </li>
        <li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="fa fa-random"></i> <?php echo e(trans('business.billing_settings')); ?></h6>
            <ul>
                <li class="menu-list">
                    <ul>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.billing_preference')); ?>"><i
                                    class="fa fa-files-o"></i> <?php echo e(trans('business.billing_settings_preference')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.additionals.index')); ?>"><i
                                    class="fa fa-floppy-o"></i> <?php echo e(trans('business.tax_discount_management')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.prefixes.index')); ?>"><i
                                    class="fa fa-bookmark-o"></i> <?php echo e(trans('business.prefix_management')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.terms.index')); ?>"><i
                                    class="fa fa-gavel"></i> <?php echo e(trans('business.terms_management')); ?>

                            </a></li>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.pos_preference')); ?>"><i
                                    class="fa fa-shopping-cart"></i> <?php echo e(trans('pos.preference')); ?>

                            </a></li>

                    </ul>
                </li>
            </ul>
        </li>

        <li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="fa fa-money"></i> <?php echo e(trans('business.payment_account_settings')); ?>

            </h6>
            <ul>
                <li class="menu-list">
                    <ul>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.payment_preference')); ?>"><i
                                    class="fa fa-credit-card"></i> <?php echo e(trans('business.payment_preferences')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.currencies.index')); ?>"><i
                                    class="fa fa-money"></i> <?php echo e(trans('business.currency_management')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.banks.index')); ?>"><i
                                    class="ft-server"></i> <?php echo e(trans('business.bank_accounts')); ?>

                            </a>
                        </li>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.usergatewayentries.index')); ?>"><i
                                    class="fa fa-server"></i> <?php echo e(trans('usergatewayentries.usergatewayentries')); ?>

                            </a>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.settings.accounts')); ?>"><i
                                    class="ft-compass"></i> <?php echo e(trans('business.accounts_settings')); ?>

                            </a>
                        </li>

                        <li>&nbsp;</li>

                    </ul>
                </li>
            </ul>
        </li>
        <li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="ft-at-sign"></i> <?php echo e(trans('business.communication_settings')); ?></h6>
            <ul>
                <li class="menu-list">
                    <ul>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.business.email_sms_settings')); ?>"><i
                                    class="ft-minimize-2"></i> <?php echo e(trans('meta.email_sms_settings')); ?>

                            </a></li>

                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.notification_email')); ?>"><i
                                    class="ft-activity"></i> <?php echo e(trans('meta.notification_email')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.templates.index')); ?>"><i
                                    class="fa fa-comments"></i> <?php echo e(trans('templates.manage')); ?>

                            </a></li>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.currency_exchange')); ?>"><i
                                    class="fa fa-retweet"></i> <?php echo e(trans('currencies.currency_exchange')); ?>

                            </a></li>


                    </ul>
                </li>
            </ul>
        </li>
        <li class="col-md-3 col-sm-6  mb-1">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="fa fa-random"></i> <?php echo e(trans('business.miscellaneous_settings')); ?></h6>
            <ul>
                <li class="menu-list">
                    <ul>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.customfields.index')); ?>"><i
                                    class="ft-anchor"></i> <?php echo e(trans('customfields.customfields')); ?>

                            </a>
                        </li>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.productvariables.index')); ?>"><i
                                    class="ft-package"></i> <?php echo e(trans('business.product_units')); ?>

                            </a></li>

                        <li><a class="dropdown-item" href="<?php echo e(route('biller.settings.security_settings')); ?>"><i
                                    class="fa fa-user-secret"></i> <?php echo e(trans('en.security_and_setting')); ?>

                            </a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="fa fa-cogs"></i> <?php echo e(trans('business.advanced_settings')); ?></h6>
            <ul>
                <li class="menu-list">
                    <ul>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.settings.manage_api')); ?>"><i
                                    class="fa fa-bullseye"></i> API Integration
                            </a></li>

                        <li><a class="dropdown-item" href="<?php echo e(route('biller.cron')); ?>"><i
                                    class="fa fa-terminal"></i> <?php echo e(trans('meta.cron')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.settings.activities')); ?>"><i
                                    class="fa fa-list-ol"></i> <?php echo e(trans('en.application_log')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.web_update_wizard')); ?>"><i
                                    class="fa fa-magic"></i> <?php echo e(trans('update.web_updater')); ?> <span class="badge badge-sm badge-danger">Check</span>
                            </a></li>

                    </ul>
                </li>
            </ul>
        </li>
        <li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="fa fa-asterisk"></i> <?php echo e(trans('business.crm_hrm_settings')); ?></h6>
            <ul>
                <li class="menu-list">
                    <ul>

                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.crm_hrm_section')); ?>"><i
                                    class="fa fa-indent"></i> <?php echo e(trans('meta.self_attendance')); ?>

                            </a></li>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.settings.crm_hrm_section')); ?>"><i
                                    class="fa fa-key"></i> <?php echo e(trans('customers.customer_self_menu')); ?>

                            </a>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="fa fa-camera-retro"></i> <?php echo e(trans('business.visual_settings')); ?></h6>
            <ul>
                <li class="menu-list">
                    <ul>


                        <li><a class="dropdown-item" href="<?php echo e(route('biller.settings.theme')); ?>"><i
                                    class="fa fa-columns"></i> <?php echo e(trans('meta.employee_panel_theme')); ?>

                            </a></li>
                        <li><a class="dropdown-item" href="<?php echo e(route('biller.about')); ?>"><i
                                    class="fa fa-info-circle"></i> <?php echo e(trans('update.about_system')); ?>

                            </a></li>
                    </ul>
                </li>
            </ul>
        </li><li class="col-md-3 col-sm-6">
            <h6 class="dropdown-menu-header text-uppercase"><i
                    class="fa fa-plug"></i> Plugins</h6>
            <ul>
                <li class="menu-list">
                    <ul>

<?php echo e(rose_plugins_checker()); ?>


                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li>
<?php endif; ?>
<?php /**PATH C:\laragon\www\RoseSCMS\resources\views/core/partials/mega.blade.php ENDPATH**/ ?>