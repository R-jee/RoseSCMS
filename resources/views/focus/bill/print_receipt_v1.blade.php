<!doctype html>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Print Receipt {{$transaction['id']}}</title>

    <style>
        body {
            font-size: 10pt;
            font-family: '{{config('pdf.default_font')}}';
        }

        @page {
            sheet-size: 220mm 110mm;
        }

        table td {
            padding: 8pt;
        }


    </style>

</head>
<body dir="{{visual()}}">

<h4>{{trans('transactions.transaction_details')}}</h4>

<table width="100%">
    <tr>
        <td>{{trans('transactions.payment_date')}} : {{dateFormat($transaction['payment_date'])}}</td>
        <td>{{trans('transactions.transaction_id')}} : {{prefix(4)}}# {{$transaction['id']}}</td>
        <td>   @if($transaction['trans_category_id']){{trans('transactions.trans_category_id')}}
            :  {{$transaction->category->name}} @endif</td>
    </tr>
</table>

<hr>
<table width="100%">
    <tr>
        <td style="width: 200pt">
            <strong>{{(config('core.cname'))}}</strong><br>
            {{(config('core.address'))}},<br>
            {{(config('core.city'))}}, {{(config('core.region'))}}<br>
            {{(config('core.cname'))}} - {{(config('core.postbox'))}}<br>
            {{trans('general.phone')}}: {{(config('core.phone'))}}<br>
            {{trans('general.email')}}: {{(config('core.email'))}}<br>
            @if(config('core.taxid'))
                {{trans('general.tax_id')}}: {{config('core.taxid')}}
            @endif
        </td>

        @if($transaction['relation_id']==0)

            <td style="width: 200pt"><strong>{{trans('payments.received_from')}}</strong> <br>
                @if($transaction['payer_id']>0)
                    {{$transaction->customer->name}}<br>
                    {{$transaction->customer->address}}, {{$transaction->customer->city}}<br>
                    {{$transaction->customer->region}}, {{$transaction->customer->country}}
                    - {{$transaction->customer->postbox}}<br>
                    {{trans('general.phone')}} : {{$transaction->customer->phone}}<br>
                    {{trans('general.email')}} : {{$transaction->customer->email}}<br>
                    @if($transaction->customer->taxid) {{trans('general.tax_id')}}: {{$transaction->customer->taxid}}
                    <br>
                    @endif
                @else
                    {{$transaction['payer']}}
                @endif


            </td>

        @endif

        @if($transaction['relation_id']==9)

            <td style="width: 200pt"><strong>{{trans('payments.paid_to')}}</strong><br>
                @if($transaction['payer_id']>0)
                    {{$transaction->supplier->name}}<br>
                    {{$transaction->supplier->address}}, {{$transaction->customer->city}}<br>
                    {{$transaction->supplier->region}}, {{$transaction->customer->country}}
                    - {{$transaction->supplier->postbox}}<br>
                    {{trans('general.phone')}} : {{$transaction->supplier->phone}}<br>
                    {{trans('general.email')}} : {{$transaction->supplier->email}}<br>
                    @if($transaction->supplier->taxid) {{trans('general.tax_id')}}: {{$transaction->supplier->taxid}}
                    <br>
                    @endif
                @else
                    {{$transaction['payer']}}
                @endif
            </td>
        @endif

        @if($transaction['relation_id'] == 3)
            tt
            <td style="width: 200pt"><strong>{{trans('payments.paid_to')}}</strong><br>
                @if($transaction['payer_id']>0)
                    {{$transaction->employee->first_name}} {{$transaction->employee->last_name}}<br>
                    {{$transaction->profile->address_1}}, {{$transaction->profile->city}}<br>
                    {{$transaction->profile->region}}, {{$transaction->profile->country}}
                    - {{$transaction->profile->postbox}}<br>
                    {{trans('general.phone')}} : {{$transaction->profile->contact}}<br>
                    {{trans('general.email')}} : {{$transaction->employee->email}}<br>
                    @if($transaction->profile->taxid) {{trans('general.tax_id')}}: {{$transaction->profile->taxid}}
                    <br>
                    @endif
                @else
                    {{$transaction['payer']}}
                @endif
            </td>
        @endif

        <td style="width: 200pt;text-align: right">
            <p>{{trans('transactions.debit')}} : {{amountFormat($transaction['debit'])}}</p>
            <p>{{trans('transactions.credit')}} : {{amountFormat($transaction['credit'])}} </p></td>
    </tr>
</table>
<p>{{trans('general.note')}} : {{$transaction['note']}} @if($transaction['method']) ({{$transaction['method']}}) @endif</p>
</body>
