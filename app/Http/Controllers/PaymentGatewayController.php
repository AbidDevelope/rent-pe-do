<?php

namespace App\Http\Controllers;

use App\Http\Requests\BkashConfigRequest;
use App\Models\Bkash;
use App\Models\Rent;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentGatewayController extends Controller
{

    public function index()
    {
        $bkash = Bkash::first();
        return view('bkash.index', compact('bkash'));
    }

    public function update(BkashConfigRequest $request)
    {

        $bkash = Bkash::first();

        Bkash::updateOrCreate(
            [
                'id' => $bkash?->id ?? 0
            ],
            $request->all()
        );

        return redirect()->route('bkash.index')->with('success', 'Bkash config updated successfully');
    }

    public function chargePayment(Rent $rent)
    {
        $request = request();

        $status = $request->status;
        $paymentID = $request->paymentID;

        if ($status == 'success') {
            $rent->update([
                'payment_status' => 'paid'
            ]);

            return $this->json('Payment received successfully', [
                'rentID' => $rent->id,
                'payment_status' => $rent->payment_status,
                'paymentID' => $paymentID
            ], 200);
        }
        return $this->json('Payment failed', [
            'rentID' => $rent->id,
            'payment_status' => $rent->payment_status,
        ], Response::HTTP_BAD_REQUEST);
    }

    public function createPayment(Request $request)
    {
        $request->validate([
            'rentId' => 'required|exists:rents,id',
        ]);

        $bkash = Bkash::first();
        $rent = Rent::find($request->rentId);

        if (!$bkash) {
            return $this->json('Sorry! Bkash configuration not found', [], Response::HTTP_BAD_REQUEST);
        }

        if (!$rent->is_paid || ($rent->is_paid && $rent->payment_status == 'paid')) {
            return $this->json('Payment already received', [], Response::HTTP_BAD_REQUEST);
        }

        $response = json_decode($this->tokenGrant());
        if ($response->statusCode != "0000") {
            return $this->json($response->statusMessage, [], Response::HTTP_BAD_REQUEST);
        }

        $callbackURL = route('bkash.callback', $rent->id);

        $requestbody = [
            'mode' => '0011',
            'amount' => $rent->ads_price,
            'currency' => 'BDT',
            'intent' => 'sale',
            'payerReference' => '01',
            'merchantInvoiceNumber' => uniqid(),
            'callbackURL' => route('bkash.execute', $response->id_token)
        ];
        $url = 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/create';
        $header = [
            'Content-Type:application/json',
            'Authorization:' . $response->id_token,
            'X-APP-Key:' . $bkash->app_key
        ];

        $resultdata = $this->executeCurl($url, $requestbody, $header);

        return redirect(json_decode($resultdata)->bkashURL);
    }

    public function executePayment($token){
        $bkash = Bkash::first();
        $client = new Client();
        $response = $client->request('POST', 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/execute', [
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
                'Authorization' => $token,
                'x-app-key' => $bkash->app_key,
            ],
            'body' => '{
                "paymentID" : ' . request('paymentID') . ',
            }',
        ]);
        dd($response);
    }

    private function tokenGrant()
    {
        $bkash = Bkash::first();
        $authorizableData = [
            'app_key' => $bkash->app_key,
            'app_secret' => $bkash->app_secret
        ];
        $url = 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant';
        $header = [
            'Content-Type:application/json',
            'username:' . $bkash->username,
            'password:' . $bkash->password
        ];

        return $this->executeCurl($url, $authorizableData, $header);
    }

    private function executeCurl($url, $data, $header)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}
