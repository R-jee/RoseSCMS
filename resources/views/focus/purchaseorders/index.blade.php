@extends ('core.layouts.app')

@section ('title', trans('labels.backend.purchaseorders.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.purchaseorders.management') }}</h1>
@endsection

@section('content')
    <div class="">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h4 class="content-header-title mb-0">{{ trans('labels.backend.purchaseorders.management') }}</h4>

                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="media width-250 float-right">

                        <div class="media-body media-right text-right">
                            @include('focus.purchaseorders.partials.purchaseorders-header-buttons')
                        </div>
                    </div>
                </div>
            </div>
            @if($segment)
                @php
                    $total=$segment->invoices->sum('total');
                    $paid=$segment->invoices->sum('pamnt');
                    $due=$total-$paid;
                @endphp
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{$words['name']}} </p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{$words['name_data']}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('customers.email')}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{$segment->email}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('general.total_amount')}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{amountFormat($total)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('payments.paid_amount')}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{amountFormat($paid)}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <p>{{trans('general.balance_due')}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p>{{amountFormat($due)}}</p>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-content">

                                <div class="card-body">
                                    <table id="purchaseorders-table"
                                           class="table table-striped table-bordered zero-configuration" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('purchaseorders.purchaseorder')}} #{{prefix(9)}}</th>
                                            <th>{{ trans('suppliers.supplier') }}</th>
                                            <th>{{ trans('purchaseorders.invoicedate') }}</th>
                                            <th>{{ trans('general.amount') }}</th>
                                            <th>{{ trans('general.status') }}</th>
                                            <th>{{ trans('labels.general.actions') }}</th>

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
    </div>
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var dataTable = $('#purchaseorders-table').dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                stateSave: true,
                language: {
                    @lang('datatable.strings')
                },
                ajax: {
                    url: '{{ route("biller.purchaseorders.get") }}',
                    type: 'post',
                    @if($segment) data: {i_rel_id: '{{$segment['id']}}', i_rel_type: '{{$input['rel_type']}}'},@endif
                },
                columns: [
                    {data: 'DT_Row_Index', name: 'id'},
                    {data: 'tid', name: 'tid'},
                    {data: 'supplier_id', name: 'supplier_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'total', name: 'total'},
                    {data: 'status', name: 'status'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[1, "asc"]],
                searchDelay: 500,
                dom: 'Blfrtip',
                buttons: {
                    buttons: [

                        {extend: 'csv', footer: true, exportOptions: {columns: [1, 2, 3, 4, 5]}},
                        {extend: 'excel', footer: true, exportOptions: {columns: [1, 2, 3, 4, 5]}},
                        {extend: 'print', footer: true, exportOptions: {columns: [1, 2, 3, 4, 5]}}
                    ]
                }
            });
            $('#purchaseorders-table_wrapper').removeClass('form-inline');

        });
    </script>
@endsection
