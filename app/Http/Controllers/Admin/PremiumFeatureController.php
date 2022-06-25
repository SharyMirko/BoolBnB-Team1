<?php

namespace App\Http\Controllers\Admin;

use App\Model\PremiumFeature;
use App\Model\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Braintree;
use Carbon\Carbon;

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
        $apart = Apartment::where('id', $_GET['apart_id'])->first();

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

           
            if($amount == 2.99) {
                $feature = [
                    'premium_feature_id' => 1,
                ];
                
              $apart->premiumFeatures()->attach($feature, ['started_at' => Carbon::now(),
              'expiring_at' => Carbon::now()->add('hour', 24)]);
            };
            if($amount == 5.99) {
                $feature = [
                    'premium_feature_id' => 2,
                ];
                
              $apart->premiumFeatures()->attach($feature, ['started_at' => Carbon::now(),
              'expiring_at' => Carbon::now()->add('hour', 72)]);
            };
            if($amount == 9.99) {
                $feature = [
                    'premium_feature_id' => 3,
                ];
                
              $apart->premiumFeatures()->attach($feature, ['started_at' => Carbon::now(),
              'expiring_at' => Carbon::now()->add('hour', 144)]);
            };


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
