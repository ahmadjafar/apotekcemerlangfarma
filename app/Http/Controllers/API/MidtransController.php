<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;

use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        // set konfigurasi midtrans
        config::$serverKey = config('services.midtrans.serverKey');
        config::$isProduction = config('services.midtrans.isProduction');
        config::$isSanitized = config('services.midtrans.isSanitized');
        config::$is3ds = config('services.midtrans.is3ds');

        //  Buat instance Midtrans notification

        $notification = new Notification (); 

        
        // assign ke variabel uintuk memudahkan coding

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // cari transaksi berdasarkan ID
        $transaction = Transaction::findOrfail($order_id);

        // Handle notifikasi status midtrans
        if($status == 'capture') 
        {
            if($type == 'credit_card') 
            {
                if($fraud == 'challange') 
                {
                    $transaction->status = 'PENDING';
                }
                else {
                    $transaction->status = 'ON_DELIVERY';
                }
            }
        }      
        else if ($status == 'settlement') 
        {
            $transaction->status = 'SUCCESS';
        }
        else if ($status == 'pending') 
        {
            $transaction->status = 'PENDING';
        }
        else if ($status == 'deny') 
        {
            $transaction->status = 'CANCALLED';
        }
        else if ($status == 'expire') 
        {
            $transaction->status = 'CANCALLED';
        }
        else if ($status == 'cancel') 
        {
            $transaction->status = 'CANCALLED';
        }
       

        // simpan transaksi
        $transaction->save(); 

         if ($transaction)
        {
            if($status == 'capture' && $fraud == 'accept' )
            {
                //
            }
            else if ($status == 'settlement')
            {
                //
            }
            else if ($status == 'success')
            {
                //
            }
            else if($status == 'capture' && $fraud == 'challenge' )
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }

    }

    public function success()
    {
        return view('midtrans.success');
    }

    public function unfinish()
    {
        return view('midtrans.unfinish');
    }

    public function error()
    {
        return view('midtrans.error');
    }




    

}
