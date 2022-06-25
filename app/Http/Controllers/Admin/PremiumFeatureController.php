<?php

namespace App\Http\Controllers\Admin;

use App\Model\PremiumFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree;

class PremiumFeatureController extends Controller
{
    
    public function index()
    {
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
            
           $token = $gateway->ClientToken()->generate();
           
           
           return view('admin.payments.index', [
            'token' => $token
           ]);
    }


    public function checkout(Request $request) {
        $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount'             => $amount,
            'paymentMethodNonce' => $nonce,
            'options'            => [
            'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            /* header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id); */
            return back()->with('seccess_txt', 'Acquisto andato a buon fine! ID della transazione:' . $transaction->id);
        } else {
            $errorString = "";

            foreach($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            /* $_SESSION["errors"] = $errorString;
            header("Location: " . $baseUrl . "index.php"); */
            return back()->withErrors('Qualcosa è andato storto' . $result->message);
        }

    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(PremiumFeature $premiumFeature)
    {
        //
    }


    public function edit(PremiumFeature $premiumFeature)
    {
        //
    }


    public function update(Request $request, PremiumFeature $premiumFeature)
    {
        //
    }


    public function destroy(PremiumFeature $premiumFeature)
    {
        //
    }
}
