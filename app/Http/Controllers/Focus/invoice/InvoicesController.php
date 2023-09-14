<?php
/*
 * Rose Business Suite - Accounting, CRM and POS Software
 * Copyright (c) UltimateKode.com. All Rights Reserved
 * ***********************************************************************
 *
 *  Email: support@ultimatekode.com
 *  Website: https://www.ultimatekode.com
 *
 *  ************************************************************************
 *  * This software is furnished under a license and may be used and copied
 *  * only  in  accordance  with  the  terms  of such  license and with the
 *  * inclusion of the above copyright notice.
 *  * If you Purchased from Codecanyon, Please read the full License from
 *  * here- http://codecanyon.net/licenses/standard/
 * ***********************************************************************
 */
namespace App\Http\Controllers\Focus\invoice;

use App\Http\Controllers\Focus\printer\PrinterController;
use App\Http\Controllers\Focus\printer\RegistersController;
use App\Http\Requests\Focus\invoice\ManagePosRequest;
use App\Http\Responses\RedirectResponse;
use App\Models\account\Account;
use App\Models\Company\ConfigMeta;
use App\Models\customer\Customer;
use App\Models\hrm\Hrm;
use App\Models\invoice\Draft;
use App\Models\invoice\Invoice;
use App\Models\items\InvoiceItem;
use App\Models\template\Template;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Focus\invoice\CreateResponse;
use App\Http\Responses\Focus\invoice\EditResponse;
use App\Repositories\Focus\invoice\InvoiceRepository;
use App\Http\Requests\Focus\invoice\ManageInvoiceRequest;
use App\Http\Requests\Focus\invoice\CreateInvoiceRequest;
use App\Http\Requests\Focus\invoice\EditInvoiceRequest;
use App\Http\Requests\Focus\invoice\DeleteInvoiceRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
use Bitly;

/**
 * InvoicesController
 */
class InvoicesController extends Controller
{
    /**
     * variable to store the repository object
     * @var InvoiceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param InvoiceRepository $repository ;
     */
    public function __construct(InvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param App\Http\Requests\Focus\invoice\ManageInvoiceRequest $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageInvoiceRequest $request)
    {

        $input = $request->only('rel_type', 'rel_id', 'md');
        $segment = false;
        $words = array();
        if (isset($input['rel_id']) and isset($input['rel_type'])) {
            switch ($input['rel_type']) {
                case 1 :
                    $segment = Customer::find($input['rel_id']);
                    $words['name'] = trans('customers.title');
                    $words['name_data'] = $segment->name;
                    break;
                case 2 :
                    $segment = Hrm::find($input['rel_id']);
                    $words['name'] = trans('hrms.employee');
                    $words['name_data'] = $segment->first_name . ' ' . $segment->last_name;
                    break;

            }
        }

        if (isset($input['md'])) {
            if ($input['md'] == 'sub') {
                $input['sub_json'] = "sub: 1";
                $input['sub_url'] = '?md=sub';
                $input['title'] = trans('invoices.subscriptions');
                $input['meta'] = 'sub';
                $input['pre'] = 6;
            } elseif ($input['md'] == 'pos') {
                $input['sub_json'] = "sub: 2";
                $input['sub_url'] = '?md=pos';
                $input['title'] = trans('invoices.pos');
                $input['meta'] = 'pos';
                $input['pre'] = 10;
            }
        } else {

            $input['sub_json'] = "sub: 0";
            $input['sub_url'] = '';
            $input['title'] = trans('labels.backend.invoices.management');
            $input['meta'] = 'sub';
            $input['pre'] = 1;
        }

        return new ViewResponse('focus.invoices.index', compact('input', 'segment', 'words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateInvoiceRequestNamespace $request
     * @return \App\Http\Responses\Focus\invoice\CreateResponse
     */
    public function create(CreateInvoiceRequest $request)
    {
        return new CreateResponse('focus.invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInvoiceRequestNamespace $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(CreateInvoiceRequest $request)
    {
        //Input received from the request
        $invoice = $request->only(['customer_id', 'tid', 'refer', 'invoicedate', 'invoiceduedate', 'recur_after', 'sub', 'notes', 'subtotal', 'shipping', 'tax', 'discount', 'discount_rate', 'after_disc', 'currency', 'total', 'tax_format', 'discount_format', 'ship_tax', 'ship_tax_type', 'ship_rate', 'term_id', 'tax_id', 'p','sales_channel','order_id','user_id']);

        $invoice_items = $request->only(['product_id', 'product_name', 'code', 'product_qty', 'product_price', 'product_tax', 'product_discount', 'product_subtotal', 'product_subtotal', 'total_tax', 'total_discount', 'product_description', 'unit', 'serial', 'unit_m']);
        $data2 = $request->only(['custom_field']);
        $data2['ins'] = auth()->user()->ins;
        //dd($invoice_items);
        $invoice['ins'] = auth()->user()->ins;
        if(feature(1)['value1']!='yes')  $invoice['user_id'] = auth()->user()->id;
        $invoice_items['ins'] = auth()->user()->ins;
        //Create the model using repository create method
        $invoice['i_class'] = 0;
        $result = $this->repository->create(compact('invoice', 'invoice_items', 'data2'));

           $feature = feature(9);

           if($feature['value2']=='yes') $this->repository->due_payment($result);


        //return with successfull message
        if($result) {



            $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
            $link = route('biller.print_bill', [$result['id'], 1, $valid_token, 1]);
            $link_download = route('biller.print_bill', [$result['id'], 1, $valid_token, 2]);
            $link_preview = route('biller.view_bill', [$result['id'], 1, $valid_token, 0]);
            $lk = '';
            record_log(trans('invoices.invoice'),$result->id,trans('alerts.backend.invoices.created') . ' #' . $result->tid);
            if (isset($result['p'])) $lk .= '<a href="' . route('biller.projects.show', [$result['p']]) . '" class="btn btn-info btn-md"><span class="fa fa-repeat" aria-hidden="true"></span> ' . trans('invoices.return_project') . '  </a> ';
            echo json_encode(array('status' => 'Success', 'message' => trans('alerts.backend.invoices.created') . ' <a href="' . route('biller.invoices.show', [$result->id]) . '" class="btn btn-info btn-md"><span class="fa fa-eye" aria-hidden="true"></span> ' . trans('general.view') . '  </a> <a href="' . $link . '" class="btn btn-purple btn-md"><span class="fa fa-print" aria-hidden="true"></span> ' . trans('general.print') . '  </a> <a href="' . $link_download . '" class="btn btn-warning btn-md"><span class="fa fa-file-pdf-o" aria-hidden="true"></span> ' . trans('general.pdf') . '  </a> <a href="' . $link_preview . '" class="btn btn-purple btn-md"><span class="fa fa-globe" aria-hidden="true"></span> ' . trans('general.preview') . '  </a> <a href="' . route('biller.invoices.create') . '" class="btn btn-blue-grey btn-md"><span class="fa fa-plus-circle" aria-hidden="true"></span> ' . trans('general.create') . '  </a> ' . $lk . ' &nbsp; &nbsp;'));

            $config = \App\Models\Company\ConfigMeta::where('feature_id', '=', 11)->first();

            $feature = feature(11);
            $alert = json_decode($feature->value2, true);
            if ($alert['new_invoice'] or $alert['cust_new_invoice']) {
                $template = Template::all()->where('category', '=', 1)->where('other', '=', 1)->first();
                $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
                $link = route('biller.view_bill', [$result->id, 1, $valid_token, 0]);
                $data = array(
                    'Company' => config('core.cname'),
                    'BillNumber' => $result->tid,
                    'BillType' => trans('invoices.invoice'),
                    'URL' => "<a href='$link'>$link</a>",
                    'Name' => $result->customer->name,
                    'CompanyDetails' => '<h6><strong>' . config('core.cname') . ',</strong></h6>
<address>' . config('core.address') . '<br>' . config('core.city') . '</address>
            ' . config('core.region') . ' : ' . config('core.country') . '<br>  ' . trans('general.email') . ' : ' . config('core.email'),
                    'DueDate' => dateFormat(date('Y-m-d')),
                    'Amount' => amountFormat($result->total)
                );
                $replaced_body = parse($template['body'], $data, true);
                $subject = parse($template['title'], $data, true);
                $mail = array();
                if ($alert['new_invoice'] and !$alert['cust_new_invoice']) {
                    $mail['mail_to'] = $feature->value1;
                } elseif ($alert['cust_new_invoice'] and !$alert['new_invoice']) {
                    $mail['mail_to'] = $result->customer->email;
                } else {
                    $mail['mail_to'][] = $result->customer->email;
                    $mail['mail_to'][] = $feature->value1;
                }
                $mail['customer_name'] = trans('transactions.transaction');
                $mail['subject'] = $subject;
                $mail['text'] = $replaced_body;
                business_alerts($mail);
            }
            if ($alert['sms_new_invoice']) {
                $template = Template::all()->where('category', '=', 2)->where('other', '=', 11)->first();
                $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
                $link = route('biller.view_bill', [$result->id, 1, $valid_token, 0]);
                $short_url = ConfigMeta::where('feature_id', '=', 7)->first(array('feature_value', 'value2'));
                $data['URL'] = $link;
                if ($short_url['feature_value']) {
                    config([
                        'bitly.accesstoken' => $short_url['value2']]);
                    $data['URL'] = Bitly::getUrl($link);
                }
                $replaced_body = parse($template['body'], $data, true);
                $mailer = new \App\Repositories\Focus\general\RosesmsRepository;
                return $mailer->send_bill_sms($result->customer->phone, $replaced_body, false);
            }
        } else {
              echo json_encode(array('status' => 'Error', 'message' => trans('exceptions.backend.invoices.create_error')));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\invoice\Invoice $invoice
     * @param EditInvoiceRequestNamespace $request
     * @return \App\Http\Responses\Focus\invoice\EditResponse
     */
    public function edit(Invoice $invoice, EditInvoiceRequest $request)
    {
        return new EditResponse($invoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateInvoiceRequestNamespace $request
     * @param App\Models\invoice\Invoice $invoice
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(EditInvoiceRequest $request, Invoice $invoice_r)
    {

        //Input received from the request
        $invoice = $request->only(['customer_id', 'id', 'refer', 'invoicedate', 'invoiceduedate', 'notes', 'subtotal', 'shipping', 'tax', 'discount', 'discount_rate', 'after_disc', 'currency', 'total', 'tax_format', 'discount_format', 'ship_tax', 'ship_tax_type', 'ship_rate', 'ship_tax', 'term_id', 'tax_id', 'restock','recur_after','sales_channel','order_id']);
        $invoice_items = $request->only(['product_id', 'product_name', 'code', 'product_qty', 'product_price', 'product_tax', 'product_discount', 'product_subtotal', 'product_subtotal', 'total_tax', 'total_discount', 'product_description', 'unit', 'old_product_qty', 'unit_m']);
        //dd($request->id);
        $invoice['ins'] = auth()->user()->ins;
        //$invoice['user_id']=auth()->user()->id;
        $invoice_items['ins'] = auth()->user()->ins;
        //Create the model using repository create method
        $data2 = $request->only(['custom_field']);
        $data2['ins'] = auth()->user()->ins;
        $result = $this->repository->update($invoice_r, compact('invoice', 'invoice_items', 'data2'));
if($result)   record_log(trans('invoices.invoice'),$result->id,trans('alerts.backend.invoices.updated') . ' #' . $result->tid);

        $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
        $link = route('biller.print_bill', [$result['id'], 1, $valid_token, 1]);
        $link_download = route('biller.print_bill', [$result['id'], 1, $valid_token, 2]);
        $link_preview = route('biller.view_bill', [$result['id'], 1, $valid_token, 0]);
        echo json_encode(array('status' => 'Success', 'message' => trans('alerts.backend.invoices.updated') . ' <a href="' . route('biller.invoices.show', [$result->id]) . '" class="btn btn-info btn-md"><span class="fa fa-eye" aria-hidden="true"></span> ' . trans('general.view') . '  </a> <a href="' . $link . '" class="btn btn-purple btn-md"><span class="fa fa-print" aria-hidden="true"></span> ' . trans('general.print') . '  </a> <a href="' . $link_download . '" class="btn btn-warning btn-md"><span class="fa fa-file-pdf-o" aria-hidden="true"></span> ' . trans('general.pdf') . '  </a> <a href="' . $link_preview . '" class="btn btn-purple btn-md"><span class="fa fa-globe" aria-hidden="true"></span> ' . trans('general.preview') . '  </a> <a href="' . route('biller.invoices.create') . '" class="btn btn-blue-grey btn-md"><span class="fa fa-plus-circle" aria-hidden="true"></span> ' . trans('general.create') . '  </a> &nbsp; &nbsp;'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteInvoiceRequestNamespace $request
     * @param App\Models\invoice\Invoice $invoice
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Invoice $invoice, DeleteInvoiceRequest $request)
    {
        $feature = feature(11);
        $alert = json_decode($feature->value2, true);
        if ($alert['del_invoice']) {

            $mail = array();
            $mail['mail_to'][] = $feature->value1;
            $mail['customer_name'] = $invoice->customer->name;
            $mail['subject'] = trans('meta.delete_invoice_alert') . ' #' . $invoice->tid;
            $mail['text'] = trans('invoices.invoice') . ' #' . $invoice->tid . '<br>' . trans('invoices.invoice_date') . ' : ' . dateFormat($invoice->invoicedate) . '<br>' . trans('general.amount') . ' : ' . amountFormat($invoice->total) . '<br>' . trans('general.employee') . ' : ' . $invoice->user->first_name . ' ' . $invoice->user->last_name;
            business_alerts($mail);
        }
        //Calling the delete method on repository
        if($this->repository->delete($invoice)){
            record_log(trans('invoices.invoice'),$invoice->id,trans('meta.delete_invoice_alert') . ' #' . $invoice->tid);
        }

        //returning with successfull message
        return json_encode(array('status' => 'Success', 'message' => trans('alerts.backend.invoices.deleted')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteInvoiceRequestNamespace $request
     * @param App\Models\invoice\Invoice $invoice
     * @return \App\Http\Responses\RedirectResponse
     */
    public function show(Invoice $invoice, ManageInvoiceRequest $request)
    {
        $accounts = Account::all();
        $features = ConfigMeta::where('feature_id', 9)->first();
        if ($invoice->i_class < 2) {
            $words['prefix'] = prefix(1);
        } else {
            $words['prefix'] = prefix(6);
        }
        //returning with successfull message
        $invoice['bill_type'] = 1;
        $words['pay_note'] = trans('invoices.payment_for_invoice') . ' ' . $words['prefix'] . '#' . $invoice->tid;
        return new ViewResponse('focus.invoices.view', compact('invoice', 'accounts', 'features', 'words'));
    }

    public function print_document(Invoice $invoice, ManageInvoiceRequest $request)
    {
        $invoice = $this->repository->find($request->id);
        switch ($request->type) {
            case 1:
                //delivery note
                $general = array('bill_type' => trans('invoices.delivery_note'),
                    'lang_bill_number' => trans('invoices.delivery_note'),
                    'lang_bill_date' => trans('invoices.invoice_date'),
                    'lang_bill_due_date' => trans('invoices.invoice_due_date'
                    ), 'direction' => 'rtl',
                    'person' => trans('customers.customer'),
                    'prefix' => 1);
                $html = view('focus.bill.delivery', compact('invoice', 'general'))->render();
                $name = 'delivery_note_' . $invoice->tid . '.pdf';
                break;
            case 2:
                //delivery note
                $general = array('bill_type' => trans('invoices.delivery_note'),
                    'lang_bill_number' => trans('invoices.delivery_note'),
                    'lang_bill_date' => trans('invoices.invoice_date'),
                    'lang_bill_due_date' => trans('invoices.invoice_due_date'
                    ), 'direction' => 'rtl',
                    'person' => trans('customers.customer'),
                    'prefix' => 2);

                $html = view('focus.bill.proforma', compact('invoice', 'general'))->render();
                $name = 'delivery_note_' . $invoice->tid . '.pdf';
                break;
        }
        $pdf = new \Mpdf\Mpdf(config('pdf'));
        $pdf->autoLangToFont  = true;
        $pdf->autoScriptToLang = true;
        $pdf->WriteHTML($html);
           $headers = array(
                        "Content-type" => "application/pdf",
                        "Pragma" => "no-cache",
                        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
                        "Expires" => "0"
                );
           return Response::stream($pdf->Output($name, 'I'), 200, $headers);

    }

    public function update_status(Request $request)
    {
        switch ($request->bill_type) {
            case 1:
                $result = Invoice::where('id', $request->bill_id)->update(array('status' => $request->status));
                if ($result) echo json_encode(array('status' => 'Success', 'message' => trans('alerts.bills.updated'), 'bill_status' => trans('payments.' . $request->status)));
                break;
            case 2:
                $result = Invoice::where('id', $request->bill_id)->update(array('i_class' => $request->status));
                if ($result) echo json_encode(array('status' => 'Success', 'message' => trans('alerts.bills.updated'), 'bill_status' => trans('payments.' . $request->status)));
                break;
        }
    }

    public function pos(ManagePosRequest $request, RegistersController $register)
    {
        if ($register->status()) {
            $input = $request->only(['sub', 'p']);
            $customer = Customer::first();
            $accounts = Account::all();

            $input['sub'] = false;
            $last_invoice = Invoice::where('i_class', '=', 1)->latest('id')->first();
            $employee='';
             if(feature(1)['value1']=='yes') $employee=Hrm::all();

            return view('focus.invoices.pos.create')->with(array('last_invoice' => $last_invoice, 'sub' => $input['sub'], 'p' => $request->p, 'accounts' => $accounts, 'customer' => $customer,'employees'=>$employee))->with(bill_helper(1, 2))->with(product_helper());
        } else {
            return view('focus.invoices.pos.open_register');
        }

    }


    public function pos_store(ManagePosRequest $request, PrinterController $printer)
    {

        //Input received from the request
        $invoice = $request->only(['customer_id', 'tid', 'refer', 'invoicedate', 'invoiceduedate', 'recur_after', 'sub', 'notes', 'subtotal', 'shipping', 'tax', 'discount', 'discount_rate', 'after_disc', 'currency', 'total', 'tax_format', 'discount_format', 'ship_tax', 'ship_tax_type', 'ship_rate', 'term_id', 'tax_id', 'p','user_id']);

        $invoice_items = $request->only(['product_id', 'product_name', 'code', 'product_qty', 'product_price', 'product_tax', 'product_discount', 'product_subtotal', 'product_subtotal', 'total_tax', 'total_discount', 'product_description', 'unit', 'serial', 'unit_m']);


         if(feature(1)['value1']!='yes')  $invoice['user_id'] = auth()->user()->id;

        $invoice_payment = $request->only(['p_amount', 'p_method', 'p_account', 'b_change']);
        $data2 = $request->only(['custom_field']);
        $data2['ins'] = auth()->user()->ins;
        //dd($invoice_items);
        $invoice['ins'] = auth()->user()->ins;

        $invoice_items['ins'] = auth()->user()->ins;
        //Create the model using repository create method
        $invoice['i_class'] = 1;
        $result = $this->repository->create(compact('invoice', 'invoice_items', 'data2'));
        if($result) {





            if (isset($result['id'])) $pay = $this->repository->payment($result, $invoice_payment);
            //return with successfull message
            $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
            $link = route('biller.print_bill', [$result['id'], 1, $valid_token, 1]);
            $link_download = route('biller.print_bill', [$result['id'], 1, $valid_token, 2]);
            $link_preview = route('biller.view_bill', [$result['id'], 1, $valid_token, 0]);
            $link_pos = route('biller.print_compact',[$result['id'],1,$valid_token,1]);
            $lk = '';
            $out = '';
            $printAllow=feature(19);
            $postData = '';
            if ($printAllow->feature_value == 1) $out = $printer->thermal_print($result);
            if ($printAllow->feature_value == 2)  {
                //print background
                $sets=json_decode($printAllow->value1,true);
                $data=$result;
                $postData= array ('invoice' => array ('tid' => $data->tid, 'invoicedate' => dateFormat($data->invoicedate), 'invoiceduedate' =>  dateFormat($data->invoiceduedate), 'subtotal' => numberFormat($data->subtotal), 'shipping' =>numberFormat($data->shipping), 'ship_tax' => numberFormat($data->ship_tax), 'ship_tax_type' => 'incl', 'discount' => numberFormat($data->discount), 'discount_rate' =>numberFormat($data->discount_rate), 'tax' =>numberFormat($data->tax), 'total' => numberFormat($data->total), 'pmethod' => $data->pmethod, 'notes' => $data->notes, 'status' => trans('payments.'.$data->status),'paid' => amountFormat($data->pamnt), 'items' => $data->items, 'taxstatus' => $data->taxstatus, 'discstatus' => $data->discstatus, 'format_discount' => $data->format_discount, 'refer' => $data->refer,  'name' => $data->customer->name, 'phone' => $data->customer->phone, 'address' => $data->customer->address, 'city' => $data->customer->city, 'region' => $data->customer->city, 'country' => $data->customer->country, 'postbox' => $data->customer->postbox, 'email' => $data->customer->email, 'company' => $data->customer->company, 'taxid' => $data->customer->taxid,'termtit' => $data->term->title, 'terms' => $data->term->terms), 'company' => array ( 'cname' => config('core.cname'), 'address' => config('core.address'), 'city' => config('core.city'), 'region' => config('core.region'), 'country' => config('core.country'), 'postbox' => config('core.postbox'), 'phone' => config('core.phone'), 'email' => config('core.email'), 'taxid' => config('core.taxid')), 'items' => $data->products->toArray(), 'currency' => config('core.currency'), );
                // 'product' => ']Suite - Accounting, CRM and POS Software-', 'code' => '', 'qty' => '1.00', 'price' => '50.00', 'tax' => '0.00', 'discount' => '0.00'
                //->pluck('product_name','product_qty','product_price','product_subtotal')
            }
            if (session('d_id')) {
                Draft::find(session('d_id'))->delete();
                session()->forget('d_id');

            }
            if (isset($result['p'])) $lk .= '<a href="' . route('biller.projects.show', [$result['p']]) . '" class="btn btn-info btn-md"><span class="fa fa-repeat" aria-hidden="true"></span> ' . trans('invoices.return_project') . '  </a> ';
            if ($pay) echo json_encode(array('status' => 'Success', 'message' => trans('alerts.backend.invoices.created') . ' <a href="' . route('biller.invoices.show', [$result->id]) . '" class="btn btn-info btn-md"><span class="fa fa-eye" aria-hidden="true"></span> ' . trans('general.view') . '  </a> <a href="' . $link_pos . '" class="btn btn-danger btn-md"><span class="fa fa-print" aria-hidden="true"></span> ' . trans('general.pos_print') . '  </a>  <a href="' . $link . '" class="btn btn-purple btn-md"><span class="fa fa-print" aria-hidden="true"></span> ' . trans('general.print') . '  </a> <a href="' . $link_download . '" class="btn btn-warning btn-md"><span class="fa fa-file-pdf-o" aria-hidden="true"></span> ' . trans('general.pdf') . '  </a> <a href="' . $link_preview . '" class="btn btn-purple btn-md"><span class="fa fa-globe" aria-hidden="true"></span> ' . trans('general.preview') . '  </a> <a href="' . route('biller.invoices.pos') . '" class="btn btn-blue-grey btn-md"><span class="fa fa-plus-circle" aria-hidden="true"></span> ' . trans('general.create') . '  </a> ' . $lk . ' &nbsp; &nbsp;<br>' . $out, 'd_id' => $result['id'],'postData'=>$postData,'postUrl'=>$sets['address'] ?? 0));
            $feature = feature(11);
            $alert = json_decode($feature->value2, true);
            if ($alert['new_invoice'] or $alert['cust_new_invoice']) {
                $template = Template::all()->where('category', '=', 1)->where('other', '=', 1)->first();
                $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
                $link = route('biller.view_bill', [$result->id, 1, $valid_token, 0]);
                $data = array(
                    'Company' => config('core.cname'),
                    'BillNumber' => $result->tid,
                    'BillType' => trans('invoices.invoice'),
                    'URL' => "<a href='$link'>$link</a>",
                    'Name' => $result->customer->name,
                    'CompanyDetails' => '<h6><strong>' . config('core.cname') . ',</strong></h6>
<address>' . config('core.address') . '<br>' . config('core.city') . '</address>
            ' . config('core.region') . ' : ' . config('core.country') . '<br>  ' . trans('general.email') . ' : ' . config('core.email'),
                    'DueDate' => dateFormat(date('Y-m-d')),
                    'Amount' => amountFormat($result->total)
                );
                $replaced_body = parse($template['body'], $data, true);
                $subject = parse($template['title'], $data, true);
                $mail = array();
                if ($alert['new_invoice'] and !$alert['cust_new_invoice']) {
                    $mail['mail_to'] = $feature->value1;
                } elseif ($alert['cust_new_invoice'] and !$alert['new_invoice']) {
                    $mail['mail_to'] = $result->customer->email;
                } else {
                    $mail['mail_to'][] = $result->customer->email;
                    $mail['mail_to'][] = $feature->value1;
                }
                $mail['customer_name'] = trans('transactions.transaction');
                $mail['subject'] = $subject;
                $mail['text'] = $replaced_body;
                business_alerts($mail);
            }
            if ($alert['sms_new_invoice']) {
                $template = Template::all()->where('category', '=', 2)->where('other', '=', 11)->first();
                $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
                $link = route('biller.view_bill', [$result->id, 1, $valid_token, 0]);
                $short_url = ConfigMeta::where('feature_id', '=', 7)->first(array('feature_value', 'value2'));
                $data['URL'] = $link;
                if ($short_url['feature_value']) {
                    config([
                        'bitly.accesstoken' => $short_url['value2']]);
                    $data['URL'] = Bitly::getUrl($link);
                }
                $replaced_body = parse($template['body'], $data, true);
                $mailer = new \App\Repositories\Focus\general\RosesmsRepository();
                return $mailer->send_bill_sms($result->customer->phone, $replaced_body, false);
            }
        } else {
               echo json_encode(array('status' => 'Error', 'message' => trans('exceptions.backend.invoices.create_error')));
        }

    }

    public function pos_update(ManagePosRequest $request, PrinterController $printer)
    {

        //Input received from the request
        $invoice = $request->only(['customer_id', 'tid', 'refer', 'invoicedate', 'invoiceduedate', 'recur_after', 'sub', 'notes', 'subtotal', 'shipping', 'tax', 'discount', 'discount_rate', 'after_disc', 'currency', 'total', 'tax_format', 'discount_format', 'ship_tax', 'ship_tax_type', 'ship_rate', 'term_id', 'tax_id', 'p', 'id']);

        $invoice_items = $request->only(['product_id', 'product_name', 'code', 'product_qty', 'product_price', 'product_tax', 'product_discount', 'product_subtotal', 'product_subtotal', 'total_tax', 'total_discount', 'product_description', 'unit', 'serial', 'unit_m']);

        $invoice_payment = $request->only(['p_amount', 'p_method', 'p_account', 'b_change']);
        $data2 = $request->only(['custom_field']);
        $data2['ins'] = auth()->user()->ins;
        //dd($invoice_items);
        $invoice['ins'] = auth()->user()->ins;
        $invoice['user_id'] = auth()->user()->id;
        $invoice_items['ins'] = auth()->user()->ins;
        //Create the model using repository create method
        $invoice_ins = Invoice::find($invoice['id']);
        $result = $this->repository->update($invoice_ins, compact('invoice', 'invoice_items', 'data2'));
        if (isset($result['id'])) $pay = $this->repository->payment($result, $invoice_payment);
        //return with successfull message
        $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
        $link = route('biller.print_bill', [$result['id'], 1, $valid_token, 1]);
        $link_download = route('biller.print_bill', [$result['id'], 1, $valid_token, 2]);
        $link_preview = route('biller.view_bill', [$result['id'], 1, $valid_token, 0]);
        $lk = '';
        $out = '';
        if (feature(19)->feature_value == 1) $out = $printer->thermal_print($result);
        if (isset($result['p'])) $lk .= '<a href="' . route('biller.projects.show', [$result['p']]) . '" class="btn btn-info btn-md"><span class="fa fa-repeat" aria-hidden="true"></span> ' . trans('invoices.return_project') . '  </a> ';
        if ($pay) echo json_encode(array('status' => 'Success', 'message' => trans('alerts.backend.invoices.created') . ' <a href="' . route('biller.invoices.show', [$result->id]) . '" class="btn btn-info btn-md"><span class="fa fa-eye" aria-hidden="true"></span> ' . trans('general.view') . '  </a> <a href="' . $link . '" class="btn btn-purple btn-md"><span class="fa fa-print" aria-hidden="true"></span> ' . trans('general.print') . '  </a> <a href="' . $link_download . '" class="btn btn-warning btn-md"><span class="fa fa-file-pdf-o" aria-hidden="true"></span> ' . trans('general.pdf') . '  </a> <a href="' . $link_preview . '" class="btn btn-purple btn-md"><span class="fa fa-globe" aria-hidden="true"></span> ' . trans('general.preview') . '  </a> <a href="' . route('biller.invoices.pos') . '" class="btn btn-blue-grey btn-md"><span class="fa fa-plus-circle" aria-hidden="true"></span> ' . trans('general.create') . '  </a> ' . $lk . ' &nbsp; &nbsp;<br>' . $out, 'd_id' => $result['id']));

    }

    public function draft_store(ManagePosRequest $request)
    {

        //Input received from the request
        $invoice = $request->only(['customer_id', 'tid', 'refer', 'invoicedate', 'invoiceduedate', 'recur_after', 'sub', 'notes', 'subtotal', 'shipping', 'tax', 'discount', 'discount_rate', 'after_disc', 'currency', 'total', 'tax_format', 'discount_format', 'ship_tax', 'ship_tax_type', 'ship_rate', 'term_id', 'tax_id', 'p']);

        $invoice_items = $request->only(['product_id', 'product_name', 'code', 'product_qty', 'product_price', 'product_tax', 'product_discount', 'product_subtotal', 'product_subtotal', 'total_tax', 'total_discount', 'product_description', 'unit', 'serial', 'unit_m']);


        $data2 = $request->only(['custom_field']);
        $data2['ins'] = auth()->user()->ins;
        //dd($invoice_items);
        $invoice['ins'] = auth()->user()->ins;
        $invoice['user_id'] = auth()->user()->id;
        $invoice_items['ins'] = auth()->user()->ins;
        //Create the model using repository create method
        $result = $this->repository->create_draft(compact('invoice', 'invoice_items', 'data2'));

        //return with successfull message
        $valid_token = token_validator('', 'i' . $result['id'] . $result['tid'], true);
        $link = route('biller.print_bill', [$result['id'], 1, $valid_token, 1]);
        $link_download = route('biller.print_bill', [$result['id'], 1, $valid_token, 2]);
        $link_preview = route('biller.view_bill', [$result['id'], 1, $valid_token, 0]);
        $lk = '';
        $out = '';

        echo json_encode(array('status' => 'Done', 'message' => trans('alerts.backend.invoices.draft_created')));

    }

    public function drafts_load(ManagePosRequest $request)
    {
        $drafts = Draft::where('user_id', '=', auth()->user()->id)->orderBy('id', 'desc')->take(20)->get();
        foreach ($drafts as $draft) {
            echo '<tr><td>' . $draft->tid . '#' . $draft->id . '<a href="' . route('biller.invoices.draft_view', [$draft->id]) . '"><i class="fa fa-eye" </a></td><td>' . dateTimeFormat($draft->created_at) . '</td><td>' . $draft->user->first_name . '</td></tr>';
        }
    }

    public function draft_view(ManagePosRequest $request)
    {

        $invoice = Draft::find($request->id);
        $customer = Customer::first();
        $accounts = Account::all();

        $input['sub'] = false;
        $last_invoice = Invoice::orderBy('id', 'desc')->where('i_class', '=', 1)->first();
        $invoice['tid'] = $last_invoice['tid'] + 1;
        $action = route('biller.invoices.pos_store');
        session(['d_id' => $invoice['id']]);
     //   return view('focus.invoices.pos.edit')->with(array('last_invoice' => $last_invoice, 'sub' => $input['sub'], 'p' => $request->p, 'accounts' => $accounts, 'customer' => $customer, 'invoices' => $invoice, 'action' => $action))->with(bill_helper(1, 2));

        return view('focus.invoices.pos.edit')->with(array('last_invoice' => $last_invoice, 'sub' => $input['sub'], 'p' => $request->p, 'accounts' => $accounts, 'customer' => $customer,'invoices' => $invoice,'action'=>$action))->with(bill_helper(1, 2))->with(product_helper());

    }

    public function duplicate_invoice(CreateInvoiceRequest $request)
    {
        $status=feature(10)['value2'];
        $invoice = Invoice::find($request->id);
        if($status)$invoice->status=$status;
        $invoice->pamnt=0;
        $invoice->pmethod='';
        $invoice->ins = auth()->user()->ins;
        $invoice->notes=trans('en.duplicate_invoice').' '.dateTimeFormat(date('Y-m-d H:i:s'));
        $newinvoice = $invoice->replicate();
        $newinvoice->created_at = Carbon::now();
        $newinvoice->save();

        $products=array();

        foreach($invoice->products->toArray() as $product){
            $product['invoice_id']=$newinvoice->id;
            unset($product['id']);
            $products[]=$product;
        }
//dd($products);

InvoiceItem::insert($products);

      //  dd($products);
        return new RedirectResponse(route('biller.invoices.show', [$newinvoice->id]), '');
    }

    public function backgroundPrint($id=null,$url=null){
        //PrintCommand
        //ManageInvoiceRequest $request
        $data=Invoice::find($id);
        $postData= array ('invoice' => array ( 'id' => '1', 'tid' => '1001', 'invoicedate' => dateFormat($data->invoicedate), 'invoiceduedate' =>  dateFormat($data->invoiceduedate), 'subtotal' => numberFormat($data->subtotal), 'shipping' =>numberFormat($data->shipping), 'ship_tax' => numberFormat($data->ship_tax), 'ship_tax_type' => 'incl', 'discount' => numberFormat($data->discount), 'discount_rate' =>numberFormat($data->discount_rate), 'tax' =>numberFormat($data->tax), 'total' => numberFormat($data->total), 'pmethod' => $data->pmethod, 'notes' => $data->notes, 'status' => trans('payments.'.$data->status),'paid' => amountFormat($data->pamnt), 'items' => $data->items, 'taxstatus' => $data->taxstatus, 'discstatus' => $data->discstatus, 'format_discount' => $data->format_discount, 'refer' => $data->refer,  'name' => $data->customer->name, 'phone' => $data->customer->phone, 'address' => $data->customer->address, 'city' => $data->customer->city, 'region' => $data->customer->city, 'country' => $data->customer->country, 'postbox' => $data->customer->postbox, 'email' => $data->customer->email, 'company' => $data->customer->company, 'taxid' => $data->customer->taxid,'termtit' => $data->term->title, 'terms' => $data->term->terms), 'company' => array ( 'cname' => config('core.cname'), 'address' => config('core.address'), 'city' => config('core.city'), 'region' => config('core.region'), 'country' => config('core.country'), 'postbox' => config('core.postbox'), 'phone' => config('core.phone'), 'email' => config('core.email'), 'taxid' => config('core.taxid')), 'items' => $data->products->toArray(), 'currency' => config('core.currency'), );

        // $response = Http::post('http://localhost/rose_print_server/print.php', [$postData]);
        //

        $post = array();
        $this->http_build_query_for_multiDim($postData, $post);
        $post['check'] =true;

        //open connection
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, count($post));
        curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($post));

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);


        dd($result);

    }

    private function http_build_query_for_multiDim( $arrays, &$new = array(), $prefix = null ) {

        if ( is_object( $arrays ) ) {
            $arrays = get_object_vars( $arrays );
        }

        foreach ( $arrays AS $key => $value ) {
            $k = isset( $prefix ) ? $prefix . '[' . $key . ']' : $key;
            if ( is_array( $value ) OR is_object( $value )  ) {
                $this->http_build_query_for_multiDim( $value, $new, $k );
            } else {
                $new[$k] = $value;
            }
        }
    }

}
