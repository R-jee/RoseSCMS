<?php $__env->startSection('title', trans('general.dashboard_title').' | '.config('core.cname')); ?>
<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="">
        <div class="content-wrapper"><?php if(config('app.debug')): ?><div class="alert alert-primary alert-danger" style="">
                <a href="#" class="close" data-dismiss="alert">×</a>

                <div class="message"><strong>Alert: </strong> Debug/Development Mode mode is turned on!</div>
            </div><?php endif; ?>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-primary bg-darken-2">
                                        <i class="fa fa-file-text-o font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-primary white media-body">
                                        <h5><?php echo e(trans('dashboard.today_invoices')); ?></h5>
                                        <h5 class="text-bold-400 mb-0"><i
                                                    class="ft-plus"></i> <span id="dash_1"><i
                                                        class="fa fa-spinner spinner"></i></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-warning bg-darken-2">
                                        <i class="icon-basket-loaded font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-warning white media-body">
                                        <h5><?php echo e(trans('dashboard.today_sales')); ?></h5>
                                        <h5 class="text-bold-400 mb-0"><i
                                                    class="ft-arrow-up"></i><span id="dash_2"><i
                                                        class="fa fa-spinner spinner"></i></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-danger bg-darken-2">
                                        <i class="icon-notebook font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-danger white media-body">
                                        <h5><?php echo e(trans('dashboard.month_invoices')); ?></h5>
                                        <h5 class="text-bold-400 mb-0"><i
                                                    class="ft-arrow-up"></i><span id="dash_3"><i
                                                        class="fa fa-spinner spinner"></i></span>
                                        </h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="media align-items-stretch">
                                    <div class="p-2 text-center bg-success bg-darken-2">
                                        <i class="icon-wallet font-large-2 white"></i>
                                    </div>
                                    <div class="p-2 bg-gradient-x-success white media-body">
                                        <h5><?php echo e(trans('dashboard.month_sales')); ?></h5>
                                        <h5 class="text-bold-400 mb-0"><i
                                                    class="ft-arrow-up"></i> <span id="dash_4"><i
                                                        class="fa fa-spinner spinner"></i></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Stats -->
                <!--Product sale & buyers -->
                <div class="row match-height">
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo e(trans('dashboard.sales_invoice_graph')); ?></h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload-a"><i class="ft-shopping-cart"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div id="products-sales" class="height-300"></div>

                                </div>
                            </div>
                        </div>  <div class="row">
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="info"><span id="dash_5"><i
                                                                class="fa fa-spinner spinner"></i></span>
                                                    </h3>
                                                    <span><?php echo e(trans('dashboard.today_sales')); ?></span>
                                                </div>

                                            </div>
                                            <div class="progress progress-sm mt-1 mb-0">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                     style="width: 80%"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="purple"><span id="dash_9"><i
                                                                class="fa fa-spinner spinner"></i></span>
                                                    </h3>
                                                    <span title="Sales Price - Purchase Price - Discount"><?php echo e(trans('dashboard.today_profit')); ?>*</span>
                                                </div>

                                            </div>
                                            <div class="progress progress-sm mt-1 mb-0">
                                                <div class="progress-bar bg-purple" role="progressbar"
                                                     style="width: 80%"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="blue"><span id="dash_8"><i
                                                                class="fa fa-spinner spinner"></i></span>
                                                    </h3>
                                                    <span><?php echo e(trans('dashboard.today_revenue')); ?></span>
                                                </div>

                                            </div>
                                            <div class="progress progress-sm mt-1 mb-0">
                                                <div class="progress-bar bg-blue" role="progressbar"
                                                     style="width: 80%"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="success"><span id="dash_10"><i
                                                                class="fa fa-spinner spinner"></i></span>
                                                    </h3>
                                                    <span><?php echo e(trans('en.today_items')); ?></span>
                                                </div>

                                            </div>
                                            <div class="progress progress-sm mt-1 mb-0">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 80%"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="info"><span id="dash_11"><i
                                                                class="fa fa-spinner spinner"></i></span>
                                                    </h3>
                                                    <span><?php echo e(trans('en.today_new_customer')); ?></span>
                                                </div>

                                            </div>
                                            <div class="progress progress-sm mt-1 mb-0">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                     style="width: 80%"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body text-left w-100">
                                                    <h3 class="primary"><span id="dash_12"><i
                                                                class="fa fa-spinner spinner"></i></span>
                                                    </h3>
                                                    <span><?php echo e(trans('en.today_new_products')); ?></span>
                                                </div>

                                            </div>
                                            <div class="progress progress-sm mt-1 mb-0">
                                                <div class="progress-bar bg-primary" role="progressbar"
                                                     style="width: 80%"
                                                     aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-header">
                                    <div class="chart-title text-center">
                                        <h3><?php echo e(trans('dashboard.income_vs_expenses')); ?></h3>
                                    </div>
                                    <hr class="m-0">
                                </div>
                                <div class="card-body sales-growth-chart pt-0">

                                    <div class="dashboard-sales-breakdown-chart height-300"
                                         id="income-compare-chart"></div>
                                </div>
                            </div>
                            <div class="card-footer text-md-center">
                               <?php echo e(trans('en.income_summary_info')); ?> <br><strong><?php echo e(dateFormat(date('Y-m').'-01')); ?> ~ <?php echo e(dateFormat(date('Y-m-d'))); ?></strong><hr><strong><?php echo e(trans('accounts.Income')); ?> :</strong>
                                <?php $__currentLoopData = $income_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a  class="badge badge-info" href="<?php echo e(route('biller.transactions.index')); ?>?rel_type=0&rel_id=<?php echo e($inc[0]); ?>"><?php echo e($inc[1]); ?></a>,
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <hr>
                                <strong><?php echo e(trans('accounts.Expenses')); ?></strong> :
                                <?php $__currentLoopData = $exp_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="badge badge-danger" href="<?php echo e(route('biller.transactions.index')); ?>?rel_type=0&rel_id=<?php echo e($inc[0]); ?>"><?php echo e($inc[1]); ?> </a>,
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="statistic-card-footer d-flex">
                                <div class="column-data py-1 text-center border-top-blue-grey border-top-lighten-5 flex-grow-1 text-center border-right-blue-grey border-right-lighten-5">
                                    <p class="font-large-1 mb-0" id="dash_6"><i
                                            class="fa fa-spinner spinner"></i></p>
                                    <span><?php echo e(trans('dashboard.today_income')); ?></span>
                                </div>
                                <div class="column-data py-1 flex-grow-1 text-center border-top-blue-grey border-top-lighten-5">
                                    <p class="font-large-1 mb-0" id="dash_7"><i
                                            class="fa fa-spinner spinner"></i></p>
                                    <span><?php echo e(trans('dashboard.today_expenses')); ?></span>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!--/ Product sale & buyers -->
                <!--Recent Orders & Monthly Salse -->
                <div class="row match-height">
                    <div class="col-xl-8 col-lg-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo e(trans('dashboard.recent_invoices')); ?></h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a href="<?php echo e(route('biller.invoices.create')); ?>"
                                               class="btn btn-primary btn-sm rounded"><?php echo e(trans('invoices.add_sale')); ?></a>
                                        </li>
                                        <li><a href="<?php echo e(route('biller.invoices.index')); ?>"
                                               class="btn btn-success btn-sm rounded"><?php echo e(trans('invoices.manage_invoices')); ?></a>
                                        </li>
                                        <li></li>


                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">

                                <div class="table-responsive">
                                    <table id="recent-orders"
                                           class="table table-hover mb-0 ps-container ps-theme-default">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(trans('invoices.invoice')); ?></th>
                                            <th><?php echo e(trans('customers.customer')); ?></th>
                                            <th><?php echo e(trans('invoices.invoice_due_date')); ?></th>
                                            <th><?php echo e(trans('general.amount')); ?></th>
                                            <th><?php echo e(trans('general.status')); ?></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $prefixes=prefixes();

                                        ?>
                                        <?php $__currentLoopData = $data['invoices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td class="text-truncate"><a
                                                            href="<?php echo e(route('biller.invoices.show',[$invoice['id']])); ?>"><?php switch($invoice['i_class']):
                                                            case (0): ?>
                                                            <?php echo e($prefixes->where('class','=',1)->first()->value); ?>

                                                            <?php break; ?>
                                                            <?php case (1): ?>
                                                            <?php echo e($prefixes->where('class','=',10)->first()->value); ?>

                                                            <?php break; ?>
                                                            <?php case ($invoice['i_class']>1): ?>
                                                            <?php echo e($prefixes->where('class','=',6)->first()->value); ?>

                                                            <?php break; ?>
                                                        <?php endswitch; ?> #<?php echo e($invoice['tid']); ?></a></td>
                                                <td class="text-truncate"><?php echo e($invoice->customer->name); ?></td>
                                                <td class="text-truncate"><?php echo e(dateFormat($invoice['invoiceduedate'])); ?></td>
                                                <td class="text-truncate"><?php echo e(amountFormat($invoice['total'])); ?></td>
                                                <td class="text-truncate"><span
                                                            class="st-<?php echo e($invoice['status']); ?>"><?php echo e(trans('payments.'.$invoice['status'])); ?></span>
                                                </td>

                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo e(trans('dashboard.recent_buyers')); ?></h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload1"><i class="ft-users"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content px-1">
                                <div id="recent-buyers_p" class="media-list height-450 position-relative">
                                    <?php $__currentLoopData = $data['customers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="#" class="media border-0">
                                            <div class="media-left pr-1">
                                            <span class="avatar avatar-md avatar-online"><img
                                                    class="media-object rounded-circle"
                                                    src="<?php echo e(Storage::disk('public')->url('app/public/img/customer/' . $customer->customer->picture)); ?>">
                                                <i></i>
                                            </span>
                                            </div>
                                            <div class="media-body w-100">
                                                <h6 class="list-group-item-heading"><?php echo e($customer->customer->name); ?><span
                                                        class="  float-right st-<?php echo e($customer['status']); ?> ml-1"><?php echo e(trans('payments.'.$customer['status'])); ?></span>
                                                </h6>
                                                <p class="list-group-item-text mb-0">
                                                </p>
                                            </div>
                                        </a>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body text-left w-100">
                                            <h3 class="primary" id="dash_13"><i
                                                    class="fa fa-spinner spinner"></i></h3>
                                            <span><?php echo e(trans('en.sales_goal')); ?> <span id="dash_14"></span>%</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="fa fa-money primary font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body text-left w-100">
                                            <h3 class="danger" id="dash_15"><i
                                                    class="fa fa-spinner spinner"></i></h3>
                                            <span><?php echo e(trans('en.stock_goal')); ?> <span id="dash_16"></span>%</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-social-dropbox danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body text-left w-100">
                                            <h3 class="success" id="dash_17"><i
                                                    class="fa fa-spinner spinner"></i></h3>
                                            <span><?php echo e(trans('en.income_goal')); ?> <span id="dash_18"></span>%</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-layers success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body text-left w-100">
                                            <h3 class="warning" id="dash_19"><i
                                                    class="fa fa-spinner spinner"></i></h3>
                                            <span><?php echo e(trans('en.expense_goal')); ?> <span id="dash_20"></span>%</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-bag warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                    <div class="progress progress-sm mt-1 mb-0">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Recent Orders & Monthly Salse -->
                <div class="row match-height">
                    <div class="col-xl-8 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo e(trans('dashboard.recent')); ?> <a
                                            href="<?php echo e(route('biller.transactions.index')); ?>"
                                            class="btn btn-primary btn-sm rounded"><?php echo e(trans('transactions.transactions')); ?></a>
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload1"><i class="ft-books
"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-hover mb-1">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(trans('transactions.payment_date')); ?></th>
                                            <th><?php echo e(trans('transactions.account_id')); ?></th>
                                            <th><?php echo e(trans('transactions.debit')); ?></th>
                                            <th><?php echo e(trans('transactions.credit')); ?></th>
                                            <th><?php echo e(trans('transactions.method')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-truncate"><a
                                                            href="<?php echo e(route('biller.transactions.show',[$item['id']])); ?>"><?php echo e(dateFormat($item['payment_date'])); ?>

                                                        #<?php echo e($item['id']); ?></a></td>
                                                <td class="text-truncate"><?php echo e(@$item->account->holder); ?></td>
                                                <td class="text-truncate"><?php echo e(amountFormat($item['debit'])); ?> </td>
                                                <td class="text-truncate"><?php echo e(amountFormat($item['credit'])); ?></td>
                                                <td class="text-truncate"><?php echo e($item['method']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-header ">
                                <h4 class="card-title"><?php echo e(trans('dashboard.stock_alert')); ?></h4>

                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">

                                    <?php $__currentLoopData = $data['stock_alert']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="list-group-item"><span
                                                    class="badge badge-danger float-xs-right"><?php echo e(+$product['qty']); ?> <?php echo e($product->product['unit']); ?></span>
                                            <a href="<?php echo e(route('biller.products.show',[$product->product_id])); ?>"><?php echo e($product->product['name']); ?> <?php echo e($product['name']); ?>   </a><small
                                                    class="purple"> <i
                                                        class="ft-map-pin"></i><?php echo e($product->warehouse['title']); ?></small>
                                        </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="card" id="transactions">

                        <div class="card-body">
                            <h4><?php echo e(trans('dashboard.cash_flow')); ?></h4>
                            <p><?php echo e(trans('dashboard.cash_flow_graph')); ?></p>
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1"
                                       href="#sales"
                                       aria-expanded="true"><?php echo e(trans('accounts.Income')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2"
                                       href="#transactions1"
                                       aria-expanded="false"><?php echo e(trans('accounts.Expenses')); ?></a>
                                </li>


                            </ul>
                            <div class="tab-content pt-1">
                                <div role="tabpanel" class="tab-pane active" id="sales" aria-expanded="true"
                                     data-toggle="tab">
                                    <div id="dashboard-income-chart"></div>

                                </div>
                                <div class="tab-pane" id="transactions1" data-toggle="tab" aria-expanded="false">
                                    <div id="dashboard-expense-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php echo e(trans('dashboard.task_manager')); ?> <a
                                        href="<?php echo e(route('biller.todo')); ?>"><i
                                            class="icon-arrow-right deep-orange"></i></a></h4>
                        </div>

                        <div class="card-content  p-1">
                            <div id="daily-activity">
                                <table id="tasks-table"
                                       class="table table-striped table-bordered zero-configuration font-size-base"
                                       cellspacing="0"
                                       width="100%">

                                    <thead>
                                    <tr class="font-size-small">
                                        <th><?php echo e(trans('tasks.task')); ?></th>
                                        <th><?php echo e(trans('tasks.start')); ?></th>
                                        <th><?php echo e(trans('tasks.duedate')); ?></th>
                                        <th><?php echo e(trans('tasks.status')); ?></th>

                                    </tr>
                                    </thead>

                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="loader_url" value="<?php echo e(route('biller.tasks.load')); ?>">
    <input type="hidden" id="mini_dash" value="<?php echo e(route('biller.mini_dash')); ?>">
    <!-- END: Content-->
    <?php echo $__env->make('focus.projects.modal.task_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after-styles'); ?>
    <?php echo Html::style('core/app-assets/vendors/css/charts/morris.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('extra-scripts'); ?>
    <?php echo e(Html::script('core/app-assets/vendors/js/charts/raphael-min.js')); ?>

    <?php echo e(Html::script('core/app-assets/vendors/js/charts/morris.min.js')); ?>

    <?php echo e(Html::script(mix('js/dataTable.js'))); ?>

    <script type="text/javascript">
        const ps = new PerfectScrollbar('#recent-buyers_p', {
            wheelSpeed: 2,
            wheelPropagation: true,
            minScrollbarLength: 20
        });
        $(window).on("load", function () {

            setTimeout(function () {
                loadDash();
            }, 1500);
        });

        function loadDash() {

            var action_url = $('#mini_dash').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: action_url,
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    var i = 1;
                    //  var obj = jQuery.parseJSON(data);
                    $.each(data.dash, function (key, value) {
                        $('#dash_' + i).text(value);
                        i++;
                    });
                    drawIncomeChart(data.income_chart);
                    drawExpenseChart(data.expense_chart);
                    drawCompareChart(data.inv_exp);
                    sales(data.sales);

                }
            });
            //ajax_end


            var dataTable = $('#tasks-table').dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                "searching": false,
                "paging": false,
                "info": false,
                "bLengthChange": false,
                "sDom": 't',
                language: {
                    <?php echo app('translator')->get('datatable.strings'); ?>
                },
                ajax: {
                    url: '<?php echo e(route("biller.tasks.get")); ?>',
                    type: 'post'
                },
                columns: [
                    {data: 'tags', name: 'tags'},
                    {data: 'start', name: 'start'},
                    {data: 'duedate', name: 'duedate'},
                    {data: 'status', name: 'status'},
                ],
                buttons: [],
                order: [[0, "desc"]],
                searchDelay: 500,
                dom: 'Blfrtip'
            });
            $('#tasks-table_wrapper').removeClass('form-inline');
            window.dispatchEvent(new Event('resize'));

        }

        function drawCompareChart(inv_exp) {
            $('#dashboard-sales-breakdown-chart').empty();
            Morris.Donut({
                element: 'income-compare-chart',
                data: [{
                    label: "<?php echo e(trans('accounts.Income')); ?>",
                    value: inv_exp.income
                },
                    {
                        label: "<?php echo e(trans('accounts.Expenses')); ?>",
                        value: inv_exp.expense
                    }
                ],
                resize: true,
                colors: ['#4db2ff', '#ff8080'],
                gridTextSize: 6,
                gridTextWeight: 400
            });
        }


        function drawIncomeChart(dataIncome) {
            $('#dashboard-income-chart').empty();
            Morris.Area({
                element: 'dashboard-income-chart',
                data: dataIncome,
                xkey: 'x',
                ykeys: ['y'],
                ymin: 'auto 40',
                labels: ['<?php echo e(trans('general.amount')); ?>'],
                xLabels: "day",
                hideHover: 'auto',
                yLabelFormat: function (y) {
                    // Only integers
                    if (y === parseInt(y, 10)) {
                        return y;
                    } else {
                        return '';
                    }
                },
                resize: true,
                lineColors: [
                    '#00A5A8',
                ],
                pointFillColors: [
                    '#00A5A8',
                ],
                fillOpacity: 0.4,
            });
        }

        function drawExpenseChart(dataExpenses) {

            $('#dashboard-expense-chart').empty();
            Morris.Area({
                element: 'dashboard-expense-chart',
                data: dataExpenses,
                xkey: 'x',
                ykeys: ['y'],
                ymin: 'auto 0',
                labels: ['<?php echo e(trans('general.amount')); ?>'],
                xLabels: "day",
                hideHover: 'auto',
                yLabelFormat: function (y) {
                    // Only integers
                    if (y === parseInt(y, 10)) {
                        return y;
                    } else {
                        return '';
                    }
                },
                resize: true,
                lineColors: [
                    '#ff6e40',
                ],
                pointFillColors: [
                    '#34cea7',
                ]
            });
        }

        function sales(sales_data) {
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            Morris.Area({
                element: 'products-sales',
                data: sales_data,
                xkey: 'y',
                ykeys: ['sales', 'invoices'],
                labels: ['sales', 'invoices'],
                behaveLikeLine: true,
                xLabelFormat: function (x) { // <--- x.getMonth() returns valid index
                    var day = x.getDate();
                    var month = months[x.getMonth()];
                    return day + ' ' + month;
                },
                resize: true,
                pointSize: 0,
                pointStrokeColors: ['#00B5B8', '#FA8E57', '#F25E75'],
                smooth: true,
                gridLineColor: '#E4E7ED',
                numLines: 6,
                gridtextSize: 14,
                lineWidth: 0,
                fillOpacity: 0.9,
                hideHover: 'auto',
                lineColors: ['#00B5B8', '#F25E75']
            });
        }

        $('a[data-toggle=tab').on('shown.bs.tab', function (e) {
            window.dispatchEvent(new Event('resize'));
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('core.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\RoseSCMS\resources\views/focus/dashboard/index.blade.php ENDPATH**/ ?>