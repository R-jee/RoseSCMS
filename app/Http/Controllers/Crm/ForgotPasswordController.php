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
namespace App\Http\Controllers\Crm;

use App\Http\Controllers\Controller;
use App\Models\Company\EmailSetting;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        $form = array('route' => 'crm.password.email', 'class' => 'form-horizontal');
        $login = 'crm.login';
        return view('core.auth.passwords.email', compact('form', 'login'));
    }

    protected function guard()
    {
        return Auth::guard('crm');
    }


    public function sendResetLinkEmail(Request $request)
    {

        $this->validateEmail($request);
        try {

            $mail_server =  EmailSetting::withoutGlobalScopes()->first();

            if ($mail_server->active) {
                $config = array(
                    'driver' => $mail_server->driver,
                    'host' => $mail_server->host,
                    'port' => $mail_server->port,
                    'from' => array('address' => $mail_server->sender, 'name' => ''),
                    'encryption' => $mail_server->auth_type,
                    'username' => $mail_server->username,
                    'password' => $mail_server->password,
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                );
                Config::set('mail', $config);
            }


        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
        } catch (\Exception $e) {

            return redirect()->route('crm.password.email')->withFlashError('Connection Error');

        }
    }

    public function broker()
    {
        return Password::broker('crm');
    }

}
