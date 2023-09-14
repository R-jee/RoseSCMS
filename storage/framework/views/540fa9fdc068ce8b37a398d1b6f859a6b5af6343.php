<!-- BEGIN: Header-->
<?php
    echo storage_path('app/public/img/company/theme/' . config('core.theme_logo'));
    dd(Storage::disk('public')->url('app/public/img/company/theme/' . config('core.theme_logo')) ); ?>
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="<?php echo e(route('biller.dashboard')); ?>"><img
                                class="brand-logo"
                                alt="Brand Logo"
                                src="<?php echo e(Storage::disk('public')->url('app/public/img/company/theme/' . config('core.theme_logo'))); ?>">

                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                                                  data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">

                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>
                    <?php echo $__env->make('core.partials.mega', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php if (access()->allow('pos')): ?>
                    <li class="nav-item ">
                        <a href="<?php echo e(route('biller.invoices.pos')); ?>" class="btn  btn-info round mt_6">
                            <i class="ficon ft-shopping-cart"></i><?php echo e(trans('pos.pos')); ?> </a></li>
                    <?php endif; ?>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#" title="Press F11 or Fn+F11 to Get Full Screen" alt="Press F11 or Fn+F11 to Get Full Screen"><i
                                    class="ficon ft-maximize"></i></a></li>

                    <li class="dropdown">
                        <a href="#" class="nav-link " data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <i class="ficon ft-toggle-left"></i> </a>
                        <ul class="dropdown-menu lang-menu" role="menu">
                            <li class="dropdown-item"><a href="<?php echo e(route('direction',['ltr'])); ?>"><i
                                            class="ficon ft-layout"></i> <?php echo e(trans('meta.ltr')); ?></a></li>
                            <li class="dropdown-item"><a href="<?php echo e(route('direction',['rtl'])); ?>"><i
                                            class="ficon ft-layout"></i> <?php echo e(trans('meta.rtl')); ?></a></li>
                        </ul>


                    </li>


                </ul>

                <ul class="nav navbar-nav float-right">
                    <?php if(config('locale.status') && count(config('locale.languages')) > 1): ?>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <?php echo e(trans('menus.language-picker.language')); ?>

                                <span class="caret"></span>
                            </a>


                            <?php echo $__env->make('includes.partials.lang_focus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </li>
                    <?php endif; ?>

                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"
                                                                           onclick="loadNotifications()"><i
                                    class="ficon ft-bell"></i><span
                                    class="badge badge-pill badge-danger badge-up"
                                    id="n_count"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right" id="user_notifications">

                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                                                           data-toggle="dropdown"><?php if(session('clock', false)): ?>
                                <i
                                        class="ficon ft-clock spinner"></i>
                                <span
                                        class="badge badge-pill badge-info badge-up"><?php echo e(trans('general.on')); ?></span>
                            <?php else: ?>
                                <i
                                        class="ficon ft-clock"></i>
                                <span
                                        class="badge badge-pill badge-danger badge-up"> <?php echo e(trans('general.off')); ?></span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                            <li class="scrollable-container media-list">
                                <div class="media">

                                    <div class="media-body text-center">
                                        <?php if(!session('clock', false)): ?> <a href="<?php echo e(route('biller.clock')); ?>"
                                                                         class="btn btn-success"><i
                                                    class="ficon ft-clock spinner"></i> <?php echo e(trans('hrms.clock_in')); ?></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('biller.clock')); ?>" class="btn btn-secondary"><i
                                                        class="ficon ft-clock"></i> <?php echo e(trans('hrms.clock_out')); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                                                           href="<?php echo e(route('biller.messages')); ?>"><i
                                    class="ficon ft-mail"></i><span
                                    class="badge badge-pill badge-warning badge-up"><?php echo e(Auth::user()->newThreadsCount()); ?></span></a>

                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown"><span
                                    class="avatar avatar-online"><img
                                        src="<?php echo e(Storage::disk('public')->url('app/public/img/users/' . @$logged_in_user->picture)); ?>"
                                        alt=""><i></i></span><span class="user-name"><?php echo e($logged_in_user->name); ?></span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                          href="<?php echo e(route('biller.profile')); ?>"><i
                                        class="ft-user"></i> <?php echo e(trans('navs.frontend.user.account')); ?></a><a
                                    class="dropdown-item" href="<?php echo e(route('biller.messages')); ?>"><i class="ft-mail"></i> My
                                Inbox</a><a
                                    class="dropdown-item" href="<?php echo e(route('biller.todo')); ?>"><i
                                        class="ft-check-square"></i>
                                <?php echo e(trans('general.tasks')); ?></a><a
                                    class="dropdown-item" href="<?php echo e(route('biller.attendance')); ?>"><i
                                        class="ft-activity"></i>
                                <?php echo e(trans('hrms.attendance')); ?></a>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(route('biller.logout')); ?>"><i
                                        class="ft-power"></i> <?php echo e(trans('navs.general.logout')); ?></a>


                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border"
     role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="dropdown nav-item"><a
                        class="nav-link <?php echo e((strpos(Route::currentRouteName(), 'biller.dashboard') == 0) ? 'active' : ''); ?>"
                        href="<?php echo e(route('biller.dashboard')); ?>"><i
                            class="ft-home"></i><span><?php echo e(trans('navs.frontend.dashboard')); ?></span></a>
            </li>
            <?php if(access()->allow('invoice-manage') || access()->allow('quote-quote')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                      data-toggle="dropdown"><i
                                class="icon-basket"></i><span><?php echo e(trans('features.sales')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (access()->allow('invoice-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="ft-layout"></i> <?php echo e(trans('invoices.management')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.invoices.index' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="ft-file-text"></i> <?php echo e(trans('labels.backend.invoices.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('invoice-create')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.invoices.create' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.invoices.create')); ?>

                                    </a>
                                </li> <?php endif; ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.invoices.index' )); ?>?md=pos"
                                       data-toggle="dropdown"><i
                                                class="ft-zap"></i> <?php echo e(trans('labels.backend.invoices.pos_management')); ?>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('quote-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="ft-phone-outgoing"></i> <?php echo e(trans('quotes.management')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.quotes.index' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="ft-file-text"></i> <?php echo e(trans('quotes.management')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.quotes.create' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.quotes.create')); ?>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('invoice-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="icon-umbrella"></i> <?php echo e(trans('invoices.subscriptions')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.invoices.index')); ?>?md=sub"
                                       data-toggle="dropdown"><i
                                                class="ft-file-text"></i> <?php echo e(trans('invoices.subscriptions')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.invoices.create' )); ?>?sub=true"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('invoices.create_subscription')); ?>

                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('creditnote-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="ft-phone-outgoing"></i> <?php echo e(trans('orders.credit_notes')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item"
                                       href="<?php echo e(route( 'biller.orders.index' )); ?>?section=creditnote"
                                       data-toggle="dropdown"><i
                                                class="ft-file-text"></i> <?php echo e(trans('orders.credit_notes_manage')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('data-creditnote')): ?>
                                <li><a class="dropdown-item"
                                       href="<?php echo e(route( 'biller.orders.create' )); ?>?section=creditnote"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('orders.credit_notes_create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>
            <?php if(access()->allow('manage-customer') || access()->allow('manage-customergroup')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                      data-toggle="dropdown"><i
                                class="icon-diamond"></i><span><?php echo e(trans('features.crm')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (access()->allow('manage-customer')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="ft-users"></i></i> <?php echo e(trans('labels.backend.customers.management')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.customers.index' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="ft-list"></i> <?php echo e(trans('labels.backend.customers.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('customer-create')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.customers.create' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.customers.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('manage-customergroup')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="ft-grid"></i></i> <?php echo e(trans('labels.backend.customergroups.management')); ?>

                            </a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.customergroups.index' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="ft-list"></i> <?php echo e(trans('labels.backend.customergroups.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('create-customergroup')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.customergroups.create' )); ?>"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.customergroups.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>
            <?php if(access()->allow('product-manage') || access()->allow('purchaseorder-manage') || access()->allow('manage-warehouse') || access()->allow('supplier-manage')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                      data-toggle="dropdown"><i
                                class="ft-layers"></i><span><?php echo e(trans('features.stock')); ?></span></a>
                    <ul class="dropdown-menu">

                        <?php if (access()->allow('product-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-cube"></i> <?php echo e(trans('labels.backend.products.management')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.products.index' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('labels.backend.products.management')); ?>

                                    </a>
                                </li>

                                <?php if (access()->allow('product-create')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.products.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.products.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <?php if (access()->allow('purchaseorder-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-clipboard"></i> <?php echo e(trans('purchaseorders.management')); ?>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.purchaseorders.index' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('purchaseorders.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('purchaseorder-data')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.purchaseorders.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.purchaseorders.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>


                        <?php if (access()->allow('productcategory-manage')): ?>

                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-object-ungroup"></i> <?php echo e(trans('labels.backend.productcategories.management')); ?>

                            </a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.productcategories.index' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('labels.backend.productcategories.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('productcategory-data')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.productcategories.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.productcategories.create')); ?>

                                    </a>
                                </li> <?php endif; ?>

                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('manage-warehouse')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-building-o"></i> <?php echo e(trans('labels.backend.warehouses.management')); ?>

                            </a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.warehouses.index' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('labels.backend.warehouses.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('warehouse-data')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.warehouses.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.warehouses.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('supplier-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="ft-target"></i> <?php echo e(trans('suppliers.management')); ?>

                            </a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.suppliers.index' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('suppliers.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('supplier-data')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.suppliers.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.suppliers.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('stockreturn-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-puzzle-piece"></i> <?php echo e(trans('orders.stock_returns')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item"
                                       href="<?php echo e(route( 'biller.orders.index' )); ?>?section=stockreturn"
                                       data-toggle="dropdown"><i
                                                class="ft-file-text"></i> <?php echo e(trans('orders.stock_return_manage')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('stockreturn-data')): ?>
                                <li><a class="dropdown-item"
                                       href="<?php echo e(route( 'biller.orders.create' )); ?>?section=stockreturn"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('orders.stock_return_create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('creditnote-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="ft-phone-outgoing"></i> <?php echo e(trans('orders.stock_return_customer')); ?></a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item"
                                       href="<?php echo e(route( 'biller.orders.index' )); ?>?section=creditnote"
                                       data-toggle="dropdown"><i
                                                class="ft-file-text"></i> <?php echo e(trans('orders.credit_notes_manage')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('data-creditnote')): ?>
                                <li><a class="dropdown-item"
                                       href="<?php echo e(route( 'biller.orders.create' )); ?>?section=creditnote"
                                       data-toggle="dropdown"><i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('orders.credit_notes_create')); ?>

                                    </a>
                                </li> <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('product-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-barcode"></i> <?php echo e(trans('products.product_label_print')); ?>

                            </a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.products.product_label' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('products.product_label_print')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.products.standard' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('products.standard_sheet')); ?>

                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php endif; ?>
                        <?php if (access()->allow('stocktransfer')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item " href="<?php echo e(route( 'biller.products.stock_transfer' )); ?>"><i
                                        class="ft-wind"></i> <?php echo e(trans('products.stock_transfer')); ?></a>

                        </li> <?php endif; ?>

                    </ul>
                </li>

            <?php endif; ?>

            <?php if(access()->allow('transaction-manage') || access()->allow('account-manage')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                      data-toggle="dropdown"><i
                                class="icon-calculator"></i><span><?php echo e(trans('general.finance')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (access()->allow('account-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-book"></i> <?php echo e(trans('labels.backend.accounts.management')); ?>

                            </a>
                            <ul class="dropdown-menu">

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.accounts.index' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('labels.backend.accounts.management')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item"
                                       href="<?php echo e(route( 'biller.accounts.balance_sheet',['v'])); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-columns"></i> <?php echo e(trans('accounts.balance_sheet')); ?></a>
                                </li>
                                <?php if (access()->allow('account-data')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.accounts.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.accounts.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('transaction-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-hdd-o"></i> <?php echo e(trans('labels.backend.transactions.management')); ?>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.transactions.index' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="ft-list"></i> <?php echo e(trans('labels.backend.transactions.management')); ?>

                                    </a>
                                </li>
                                <?php if (access()->allow('transaction-data')): ?>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.transactions.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('labels.backend.transactions.create')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>  <?php endif; ?>
            <?php if(access()->allow('project-manage') || access()->allow('task-manage')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                      data-toggle="dropdown"><i
                                class="icon-briefcase"></i><span><?php echo e(trans('features.project_tasks')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (access()->allow('project-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item" href="<?php echo e(route( 'biller.projects.index' )); ?>"><i
                                        class="ft-calendar"></i> <?php echo e(trans('labels.backend.projects.management')); ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.projects.index' )); ?>"
                                       data-toggle="dropdown"> <i class="ft-list"></i> <?php echo e(trans('projects.projects')); ?>


                                    </a>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('task-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item" href="<?php echo e(route( 'biller.tasks.index' )); ?>"><i
                                        class="icon-directions"></i> <?php echo e(trans('labels.backend.tasks.management')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('misc-manage')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="icon-tag"></i> <?php echo e(trans('tags.tag_status')); ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.miscs.index')); ?>?module=task"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-compass"></i> <?php echo e(trans('tasks.status_management')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.miscs.create' )); ?>?module=task"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('tags.new_status')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.miscs.index' )); ?>"
                                       data-toggle="dropdown"> <i class="fa fa-tags"></i> <?php echo e(trans('tags.tags')); ?></a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.miscs.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('tags.new')); ?>

                                    </a>
                                </li>


                            </ul>
                        </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>
            <?php if(access()->allow('manage-hrm') || access()->allow('department-manage')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                      data-toggle="dropdown"><i
                                class="icon-badge"></i><span><?php echo e(trans('features.hrm')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (access()->allow('manage-hrm')): ?>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-users"></i> <?php echo e(trans('hrms.management')); ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.hrms.index' )); ?>"
                                       data-toggle="dropdown"> <i class="ft-list"></i> <?php echo e(trans('hrms.employees')); ?></a>
                                </li>

                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.hrms.create' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('hrms.create')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.role.index' )); ?>"
                                       data-toggle="dropdown"> <i class="ft-pocket"></i> <?php echo e(trans('hrms.roles')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('department-manage')): ?>
                        <li><a class="dropdown-item" href="<?php echo e(route( 'biller.departments.index' )); ?>"
                               data-toggle="dropdown"> <i
                                        class="ft-list"></i> <?php echo e(trans('departments.departments')); ?></a>
                        </li>

                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa fa-money"></i> <?php echo e(trans('hrms.payroll')); ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.hrms.index' )); ?>?rel_type=3"
                                       data-toggle="dropdown"> <i class="ft-list"></i> <?php echo e(trans('hrms.payroll')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.hrms.payroll' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('hrms.payroll_entry')); ?>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"><i
                                        class="fa ft-activity"></i> <?php echo e(trans('hrms.attendance')); ?></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.hrms.attendance_list' )); ?>"
                                       data-toggle="dropdown"> <i class="ft-list"></i> <?php echo e(trans('hrms.attendance')); ?>

                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="<?php echo e(route( 'biller.hrms.attendance' )); ?>"
                                       data-toggle="dropdown"> <i
                                                class="fa fa-plus-circle"></i> <?php echo e(trans('hrms.attendance_add')); ?>

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(access()->allow('note-manage') || access()->allow('manage-event')): ?>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                                                                      data-toggle="dropdown"><i
                                class="icon-star"></i><span><?php echo e(trans('features.misc')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (access()->allow('note-manage')): ?>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.notes.index')); ?>"
                               data-toggle="dropdown"><i
                                        class="icon-note"></i> <?php echo e(trans('general.notes')); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if (access()->allow('manage-event')): ?>
                        <li><a class="dropdown-item"
                               href="<?php echo e(route('biller.events.index')); ?>"
                               data-toggle="dropdown"><i
                                        class="icon-calendar"></i> <?php echo e(trans('features.calendar')); ?></a>
                        </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>
            <?php if (access()->allow('reports-statements')): ?>

            <li class="dropdown mega-dropdown nav-item" data-menu="megamenu"><a class="dropdown-toggle nav-link"
                                                                                href="#" data-toggle="dropdown"><i
                            class="icon-pie-chart"></i><span><?php echo e(trans('features.reports')); ?></span></a>
                <ul class="mega-dropdown-menu dropdown-menu row">
                    <li class="col-md-3" data-mega-col="col-md-3">
                        <ul class="drilldown-menu">
                            <li class="menu-list">
                                <ul class="mega-menu-sub">
                                    <li class="nav-item text-bold-600 ml-1 text-info p-1"><?php echo e(trans('meta.statements')); ?>

                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                    class="fa fa-book"></i><?php echo e(trans('meta.finance_account_statement')); ?>

                                        </a>
                                        <ul class="mega-menu-sub">
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['account'])); ?>"
                                                ><i class="icon-doc"></i> <?php echo e(trans('meta.finance_account_statement')); ?>

                                                </a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['income'])); ?>"
                                                ><i class="icon-doc"></i> <?php echo e(trans('meta.income_statement')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['expense'])); ?>"
                                                ><i class="icon-doc"></i> <?php echo e(trans('meta.expense_statement')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['profit'])); ?>"
                                                ><i class="icon-doc"></i> <?php echo e(trans('en.profit_statement')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['transaction'])); ?>"
                                                ><i class="icon-doc"></i> <?php echo e(trans('en.transaction_category_statement')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['pos_statement'])); ?>"
                                                ><i class="icon-doc"></i> <?php echo e(trans('meta.pos_statement')); ?></a>
                                            </li>
                                               <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['market_statement'])); ?>"
                                                ><i class="icon-doc"></i> <?php echo e(trans('sales_channel.sales_channel_statement')); ?></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a  class="dropdown-item" href="#"><i
                                                    class="fa fa-smile-o"></i><?php echo e(trans('customers.customer')); ?></a>
                                        <ul class="mega-menu-sub">

                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['customer'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.customer_statements')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['product_customer_statement'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.product_customer_statement')); ?></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a
                                                class="dropdown-item" href="#"><i
                                                    class="fa fa-truck"></i><?php echo e(trans('suppliers.supplier')); ?></a>
                                        <ul class="mega-menu-sub">


                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['supplier'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.supplier_statements')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['product_supplier_statement'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.product_supplier_statement')); ?></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a
                                                class="dropdown-item" href="#"><i
                                                    class="icon-doc"></i><?php echo e(trans('meta.tax_statements')); ?></a>
                                        <ul class="mega-menu-sub">

                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['tax'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.tax_statements')); ?> <?php echo e(trans('meta.sales')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['tax'])); ?>?s=purchase"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.tax_statements')); ?>  <?php echo e(trans('meta.purchase')); ?></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a
                                                class="dropdown-item" href="#"><i
                                                    class="fa fa-th"></i><?php echo e(trans('meta.product_statement')); ?></a>
                                        <ul class="mega-menu-sub">
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['product_statement'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.product_statement')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['product_category_statement'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.product_category_statement')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['product_warehouse_statement'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.product_warehouse_statement')); ?></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a
                                                class="dropdown-item" href="#"><i
                                                    class="fa fa-road"></i><?php echo e(trans('products.stock_transfer')); ?></a>
                                        <ul class="mega-menu-sub">


                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['stock_transfer'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.stock_transfer_statement_warehouse')); ?></a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="<?php echo e(route('biller.reports.statements',['stock_transfer_product'])); ?>"
                                                   data-toggle="dropdown"><?php echo e(trans('meta.stock_transfer_statement_product')); ?></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item"
                                           href="<?php echo e(route('biller.reports.statements',['pos_statement'])); ?>"
                                        ><i class="icon-doc"></i> <?php echo e(trans('meta.pos_statement')); ?></a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="col-md-3" data-mega-col="col-md-3">
                        <ul class="drilldown-menu">
                            <li class="menu-list">
                                <ul class="mega-menu-sub">
                                    <li class="nav-item text-bold-600 ml-1 text-info p-1"><?php echo e(trans('meta.graphical_reports')); ?>

                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.charts',['customer'])); ?>"><i
                                                    class="fa fa-bar-chart"></i> <?php echo e(trans('meta.customer_graphical_overview')); ?>

                                        </a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.charts',['supplier'])); ?>"><i
                                                    class="fa fa-sun-o"></i> <?php echo e(trans('meta.supplier_graphical_overview')); ?>

                                        </a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.charts',['product'])); ?>"><i
                                                    class="ft-trending-up"></i> <?php echo e(trans('meta.product_graphical_overview')); ?>

                                        </a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.charts',['income_vs_expenses'])); ?>"
                                        ><i
                                                    class="icon-pie-chart"></i> <?php echo e(trans('meta.income_vs_expenses_overview')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="col-md-3" data-mega-col="col-md-3">
                        <ul class="drilldown-menu">
                            <li class="menu-list">
                                <ul class="mega-menu-sub">
                                    <li class="nav-item text-bold-600 ml-1 text-info p-1"><?php echo e(trans('meta.summary_reports')); ?>

                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.summary',['income'])); ?>"
                                        ><i
                                                    class="ft-check-circle"></i> <?php echo e(trans('meta.income_summary')); ?></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.summary',['expense'])); ?>"
                                        ><i
                                                    class="fa fa fa-bullhorn"></i> <?php echo e(trans('meta.expense_summary')); ?></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.summary',['sale'])); ?>"
                                        ><i
                                                    class="ft-aperture"></i> <?php echo e(trans('meta.sale_summary')); ?></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.summary',['purchase'])); ?>"
                                        ><i
                                                    class="ft-disc"></i> <?php echo e(trans('meta.purchase_summary')); ?></a>
                                    </li>
                                    <li data-menu=""><a class="dropdown-item"
                                                        href="<?php echo e(route('biller.reports.summary',['products'])); ?>"
                                        ><i
                                                    class="ft-layers"></i> <?php echo e(trans('meta.products_summary')); ?></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="col-md-3" data-mega-col="col-md-3">
                        <ul class="drilldown-menu">
                            <li class="menu-list">
                                <ul class="mega-menu-sub">
                                    <li class="nav-item text-bold-600 ml-1 text-info p-1"><?php echo e(trans('import.import')); ?>

                                    </li>
                                    <li><a class="dropdown-item"
                                           href="<?php echo e(route('biller.import.general',['customer'])); ?>"
                                        ><i
                                                    class="fa fa-file-excel-o"></i> <?php echo e(trans('import.import_customers')); ?>

                                        </a>
                                    </li>
                                    <li><a class="dropdown-item"
                                           href="<?php echo e(route('biller.import.general',['products'])); ?>"
                                        ><i
                                                    class="fa fa-file-excel-o"></i> <?php echo e(trans('import.import_products')); ?>

                                        </a>
                                    </li>
                                    <li><a class="dropdown-item"
                                           href="<?php echo e(route('biller.import.general',['accounts'])); ?>"
                                        ><i
                                                    class="fa fa-file-excel-o"></i> <?php echo e(trans('import.import_accounts')); ?>

                                        </a>
                                    </li>
                                    <li><a class="dropdown-item"
                                           href="<?php echo e(route('biller.import.general',['transactions'])); ?>"
                                        ><i
                                                    class="fa fa-file-excel-o"></i> <?php echo e(trans('import.import_transactions')); ?>

                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- /horizontal menu content-->
</div>
<!-- END: Main Menu-->
<?php /**PATH C:\laragon\www\RoseSCMS\resources\views/core/partials/menu.blade.php ENDPATH**/ ?>