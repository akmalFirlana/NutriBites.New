<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;
use App\Models\Transaction;

class PaymentController extends Controller
{
    public function getSnapToken(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $transaction = [
            'transaction_details' => [
                'order_id' => uniqid(), 
                'gross_amount' => $request->total_price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ]
        ];

        // Menghasilkan Snap Token
        $snapToken = Snap::getSnapToken($transaction);
        return response()->json(['snap_token' => $snapToken]);
    }

    public function notificationHandler(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $transaction_status = $notification->transaction_status;
        $order_id = $notification->order_id;

        // Perbarui status transaksi di database
        $transaction = Transaction::where('order_id', $order_id)->first();
        if ($transaction) {
            switch ($transaction_status) {
                case 'capture':
                case 'settlement':
                    $transaction->status = 'success';
                    break;
                case 'pending':
                    $transaction->status = 'pending';
                    break;
                case 'deny':
                case 'expire':
                case 'cancel':
                    $transaction->status = 'failed';
                    break;
            }
            $transaction->save();
        }
    }

    public function getMidtransToken(Request $request)
{
    Config::$serverKey = config('midtrans.server_key');
    Config::$isProduction = config('midtrans.is_production');
    Config::$isSanitized = config('midtrans.is_sanitized');
    Config::$is3ds = config('midtrans.is_3ds');

    $transactionDetails = [
        'order_id' => uniqid(),
        'gross_amount' => $request->total_price,
    ];

    $customerDetails = [
        'first_name' => auth()->user()->name,
        'email' => auth()->user()->email,
    ];

    $params = [
        'transaction_details' => $transactionDetails,
        'customer_details' => $customerDetails,
    ];

    try {
        $snapToken = Snap::getSnapToken($params);
        return response()->json(['token' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}

