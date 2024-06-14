<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTTP;
class PaymentController extends Controller
{
    public function token(){
        $consumerKey='eNhbF5yrc4RvIWdAoGPho4QKtRqPat6fonzMFDM1AbfApPy1';
        $consumerSecret='hGfsasQ2hRIzMdF2BSXm7NMV2UDzWHrYADwGxFVtLpuE1mAhlTMAcFgjeNqBHMun';
        $url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $response=HTTP::withBasicAuth($consumerKey,$consumerSecret)->get($url);
        return $response['access_token'];
    }
    public function intiateStkPush() {
$accessToken=$this->token();
$url='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$PassKey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$BusinessShortCode=174379;
$Timestamp=Carbon::now()->format('YmdHis');
$password=base64_encode($BusinessShortCode.$PassKey.$Timestamp);
$TransactionType='CustomerPayBillOnline';
$Amount='1';
$PartyA=254742980321;
$PartyB=174379;
$PhoneNumber=254113268139;
$CallbackURL='https://www.e-skull.co.ke/primary';
$AccountReference='Coders Base';
$TransactionDescription='Payment for goods';

$response=HTTP::withToken($accessToken)->post($url,[
   'BusinessShortCode'=>$BusinessShortCode,
   'password'=>$password,
   'Timestamp'=>$Timestamp,
   'TransactionType'=>$TransactionType,
   'Amount'=> $Amount,
   'PartyA'=>$PartyA,
   'PartyB'=>$PartyB,
   'PhoneNumber'=>$PhoneNumber,
   'CallbackURL'=>$CallbackURL,
   'AccountReference'=>$AccountReference,
   'TransactionDescription'=>$TransactionDescription
]);
return $response;


    }
    public function StkCallback() {

    }
}
